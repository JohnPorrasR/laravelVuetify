<?php

namespace App\Http\Controllers\Maestros;

use App\Http\Controllers\ApiController;
use App\JPR\Repositorios\Maestros\PerfilEntidadRepo;
use App\JPR\Repositorios\Maestros\PerfilRepo;
use Illuminate\Http\Request;

class PerfilController extends ApiController
{
    protected $perfilRepo;
    protected $perfilEntidadRepo;

    public function __construct(PerfilRepo $perfilRepo, PerfilEntidadRepo $perfilEntidadRepo)
    {
        $this->perfilRepo = $perfilRepo;
        $this->perfilEntidadRepo = $perfilEntidadRepo;
    }

    public function index()
    {
        $data = $this->perfilRepo->withOneTables('entidades','n_id_actividad');
        return $this->showAll($data);
    }

    public function store(Request $request)
    {
        $desc       = $request->input('x_desc_perfil');
        $estado     = $request->input('m_estado');
        $entidad    = $request->input('n_id_entidad');
        $input      = ['x_desc_perfil' => $desc, 'm_estado' => $estado];
        $res        = $this->perfilRepo->store($input);
        $id         = $res['n_id_perfil'];
        $data       = [];
        if($id > 0)
        {
            $pivot    = ["m_actividad_id" => $id, "m_entidad_id" => $entidad];
            $this->perfilRepo->store($pivot);
            $data = $this->perfilRepo->withOneTablesWhere('entidades','n_id_perfil', $id,'n_id_perfil');
        }
        return $this->showOneWith($data);
    }

    public function show($id)
    {
        if(is_numeric($id))
        {
            $data = $this->perfilRepo->withOneTablesWhere('entidades','n_id_perfil', $id,'n_id_perfil');
            return $this->showOneWith($data);
        }
        else
        {
            return $this->errorResponce('Debe de ingresar un ID valido.',400);
        }
    }

    public function update(Request $request, $id)
    {
        if(is_numeric($id))
        {
            $input  = $request->all();
            $this->perfilRepo->edit($input, $id);
            $data = $this->perfilRepo->withOneTablesWhere('entidades','n_id_perfil', $id,'n_id_perfil');
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
            $data = $this->perfilRepo->edit($input, $id);
            return $this->showOne($data);
        }
        else
        {
            return $this->errorResponce('Debe de ingresar un ID valido.',400);
        }
    }
}
