<?php

namespace App\Http\Controllers\Maestros;

use App\Http\Controllers\ApiController;
use App\Http\Requests\Maestros\Crear\StoreActividadRequest;
use App\JPR\Repositorios\Maestros\ActividadRepo;
use App\Transformers\ActividadTransformer;
use Illuminate\Http\Request;

class ActividadController extends ApiController
{
    protected $actividadRepo;

    public function __construct(ActividadRepo $actividadRepo)
    {
        parent::__construct();
        $this->middleware('transform.input:'.ActividadTransformer::class)->only(['store', 'update']);
        $this->actividadRepo = $actividadRepo;
    }

    public function index()
    {
        $data = $this->actividadRepo->withOneTables('entidades','x_nomb_actividad');
        return $this->showAll($data);
    }

    public function store(StoreActividadRequest $request)
    {
        $input = $request->all();
        $data = $this->actividadRepo->store($input);
        return $this->showOne($data);
    }

    public function show($id)
    {
        $data = $this->actividadRepo->show($id);
        return $this->showOne($data);
    }

    public function update(Request $request, $id)
    {
        $input  = $request->all();
        $data   = $this->actividadRepo->edit($input, $id);
        return $this->showOne($data);
    }

    public function destroy($id)
    {
        $input = ['m_estado' => 0];
        $data = $this->actividadRepo->edit($input, $id);
        return $this->showOne($data);
    }
}
