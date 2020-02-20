<?php

namespace App\Http\Controllers\Maestros;

use App\Http\Controllers\ApiController;
use App\Http\Requests\Maestros\Actualizar\UpdatePermisoBaseRequest;
use App\Http\Requests\Maestros\Crear\StorePermisoBaseRequest;
use App\JPR\Repositorios\Maestros\PermisoBaseRepo;
use Illuminate\Http\Request;

class PermisoBaseController extends ApiController
{
    protected $permisoBaseRepo;

    public function __construct(PermisoBaseRepo $permisoBaseRepo)
    {
        $this->permisoBaseRepo = $permisoBaseRepo;
    }

    public function index()
    {
        $data = $this->permisoBaseRepo->obtenerTodos();
        return $this->showQuery($data);
    }

    public function store(StorePermisoBaseRequest $request)
    {
        $perfil = $request->input('m_perfil_entidad_id');
        $modulos = $request->input('m_modulo_id');
        $estado = $request->input('m_estado');
        $array = explode(",", $modulos);
        for ($i = 0; $i < sizeof($array); $i++)
        {
            $inputPB = ['m_perfil_entidad_id' => $perfil, 'm_modulo_id' => $array[$i], 'm_estado' => $estado];
            $this->permisoBaseRepo->store($inputPB);
        }
        $data = $this->permisoBaseRepo->obtenerUno($perfil);
        return $this->showQuery($data);
    }

    public function show($id)
    {
        $data = $this->permisoBaseRepo->obtenerUno($id);
        return $this->showQuery($data);
    }

    public function update(UpdatePermisoBaseRequest $request, $id)
    {
        if(is_numeric($id))
        {
            $perfil = $request->input('m_perfil_entidad_id');
            $modulos = $request->input('m_modulo_id');
            $estado = $request->input('m_estado');
            $array = explode(",", $modulos);
            for ($i = 0; $i < sizeof($array); $i++)
            {
                $input = ['m_perfil_entidad_id' => $perfil, 'm_modulo_id' => $array[$i], 'm_estado' => $estado];
                $this->permisoBaseRepo->edit($input, $id);
            }
            $data = $this->permisoBaseRepo->obtenerUno($perfil);
            return $this->showQuery($data);
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
            $data = $this->permisoBaseRepo->edit($input, $id);
            return $this->showOne($data);
        }
        else
        {
            return $this->errorResponce('Debe de ingresar un ID valido.',400);
        }
    }
}