<?php

namespace App\Http\Controllers\Maestros;

use App\Http\Controllers\ApiController;
use App\Http\Requests\Maestros\Crear\StoreActividadRequest;
use App\JPR\Repositorios\Maestros\ActividadRepo;
use Illuminate\Support\Facades\Request;

class ActividadController extends ApiController
{
    protected $actividadRepo;

    public function __construct(ActividadRepo $actividadRepo)
    {
        //$this->middleware('transform.input');
        $this->actividadRepo = $actividadRepo;
    }

    public function index()
    {
        $data = $this->actividadRepo->where('m_estado', 1);
        return $this->showAll($data);
    }

    public function create()
    {
        //
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

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
