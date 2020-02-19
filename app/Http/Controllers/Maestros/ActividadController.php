<?php

namespace App\Http\Controllers\Maestros;

use App\Http\Controllers\ApiController;
use App\Http\Requests\Maestros\Actualizar\UpdateActividadRequest;
use App\Http\Requests\Maestros\Crear\StoreActividadRequest;
use App\JPR\Repositorios\Maestros\ActividadEntidadRepo;
use App\JPR\Repositorios\Maestros\ActividadRepo;
use App\JPR\Repositorios\Maestros\EntidadRepo;
use App\Transformers\Maestros\ActividadTransformer;
use App\Transformers\Maestros\EntidadTransformer;

class ActividadController extends ApiController
{
    protected $actividadRepo;
    protected $actividadEntidadRepo;

    public function __construct(ActividadRepo $actividadRepo, ActividadEntidadRepo $actividadEntidadRepo)
    {
        parent::__construct();
        // $this->middleware('transform.input:'.ActividadTransformer::class)->only(['store', 'update']);
        $this->actividadRepo        = $actividadRepo;
        $this->actividadEntidadRepo = $actividadEntidadRepo;
    }

    public function index()
    {
        $data = $this->actividadRepo->withOneTables('entidades','n_id_actividad');
        return $this->showAll($data);
    }

    public function store(StoreActividadRequest $request)
    {
        $nomb       = $request->input('x_nomb_actividad');
        $desc       = $request->input('x_desc_actividad');
        $estado     = $request->input('m_estado');
        $entidad    = $request->input('n_id_entidad');
        $input      = ['x_nomb_actividad' => $nomb, 'x_desc_actividad' => $desc, 'm_estado' => $estado];
        $res        = $this->actividadRepo->store($input);
        $cod        = $res['n_id_actividad'];
        $data       = [];
        if($cod > 0)
        {
            $pivot    = ["m_actividad_id" => $cod, "m_entidad_id" => $entidad];
            $this->actividadEntidadRepo->store($pivot);
            $data = $this->actividadRepo->withOneTablesWhere('entidades','n_id_actividad', $cod,'n_id_actividad');
        }
        return $this->showOneWith($data);
    }

    public function show($id)
    {
        if(is_numeric($id))
        {
            $data = $this->actividadRepo->withOneTablesWhere('entidades','n_id_actividad',$id,'n_id_actividad');
            return $this->showOneWith($data);
        }
        else
        {
            return $this->errorResponce('Debe de ingresar un ID valido.',400);
        }
    }

    public function update(UpdateActividadRequest $request, $id)
    {
        if(is_numeric($id))
        {
            $input  = $request->all();
            $this->actividadRepo->edit($input, $id);
            $data = $this->actividadRepo->withOneTablesWhere('entidades','n_id_actividad', $id,'n_id_actividad');
            return $this->showOneWith($data);
        }
        else
        {
            return $this->errorResponce('Debe de ingresar un ID valido.',400);
        }
    }

    public function destroy($id)
    {
        if(is_numeric($id))
        {
            $input = ['m_estado' => 0];
            $data = $this->actividadRepo->edit($input, $id);
            return $this->showOne($data);
        }
        else
        {
            return $this->errorResponce('Debe de ingresar un ID valido.',400);
        }
    }
}
