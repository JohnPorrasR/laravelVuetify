<?php

namespace App\Traits;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Pagination\LengthAwarePaginator;
    use Illuminate\Support\Collection;
    use Illuminate\Support\Facades\Cache;
    use Illuminate\Support\Facades\Validator;

trait ApiResponser
{
    private function successResponce($data, $code)
    {
        return response()->json($data, $code);
    }

    protected function errorResponce($message, $code)
    {
        return response()->json(['error' => $message, 'code' => $code], $code);
    }

    protected function showAll(Collection $collection, $code = 200)
    {
        if($collection->isEmpty())
        {
            return $this->successResponce(['data' => $collection], 200);
        }
        /*$transformer = $collection->first()->transformer;

        $collection = $this->filterData($collection, $transformer);
        $collection = $this->sortData($collection, $transformer);*/
        $collection = $this->paginate($collection);
        //$collection = $this->transformData($collection, $transformer);
        $collection = $this->cacheResponse($collection);

        return $this->successResponce($collection, $code);
    }

    protected function showQuery($data, $code = 200)
    {
        return $this->successResponce(['data' => $data], $code);
    }

    protected function showOne(Model $instance, $code = 200)
    {
        /*$transformer    = $instance->transformer;
        $instance       = $this->transformData($instance, $transformer);*/
        return $this->successResponce(['data' => $instance], $code);
    }

    protected function showOneWith(Collection $collection, $code = 200)
    {
        /*$transformer    = $instance->transformer;
        $instance       = $this->transformData($instance, $transformer);*/
        return $this->successResponce(['data' => $collection], $code);
    }

    protected function paginate(Collection $collection)
    {
        $rules = [
            'per_page' => 'integer|min:2|max:50'
        ];
        Validator::validate(request()->all(), $rules);
        $page = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 5;
        if (request()->has('per_page')) {
            $perPage = (int) request()->per_page;
        }
        $results = $collection->slice(($page - 1) * $perPage, $perPage)->values();
        $paginated = new LengthAwarePaginator($results, $collection->count(), $perPage, $page, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
        ]);
        $paginated->appends(request()->all());
        return $paginated;
    }

    protected function paginateQuery($collection)
    {
        $rules = [
            'per_page' => 'integer|min:2|max:50'
        ];
        Validator::validate(request()->all(), $rules);
        $page = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 15;
        if (request()->has('per_page')) {
            $perPage = (int) request()->per_page;
        }
        $results = $collection->slice(($page - 1) * $perPage, $perPage)->values();
        $paginated = new LengthAwarePaginator($results, $collection->count(), $perPage, $page, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
        ]);
        $paginated->appends(request()->all());
        return $paginated;
    }

    protected function filterData(Collection $collection, $transformer)
    {
        foreach(request()->query() as $query => $value)
        {
            $attribute = $transformer::originalAttribute($query);
            if(isset($attribute, $value))
            {
                $collection = $collection->where($attribute, $value);
            }
        }
        return $collection;
    }

    protected function sortData(Collection $collection, $transformer)
    {
        if(request()->has('sort_by'))
        {
            $attribute =  $transformer::originalAttribute(request()->sort_by);
            $collection = $collection->sortBy->{$attribute};
        }
        return $collection;
    }

    protected function transformData($data, $transformer)
    {
        $transfomation = fractal($data, new $transformer);
        return $transfomation->toArray();
    }

    protected function cacheResponse($data)
    {
        $url = request()->url();
        $queryParams = request()->query();
        ksort($queryParams);
        $queryString = http_build_query($queryParams);
        $fullUrl = "{$url}?{$queryString}";
        return Cache::remember($fullUrl, 30/60, function() use($data) {
            return $data;
        });
    }
}





