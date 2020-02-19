<?php

namespace App\Http\Controllers\Maestros;

use App\Http\Controllers\ApiController;
use App\Http\Requests\Maestros\Actualizar\UpdateOficinaRequest;
use App\Http\Requests\Maestros\Crear\StoreOficinaRequest;
use App\JPR\Repositorios\Maestros\OficinaEntidadRepo;
use App\JPR\Repositorios\Maestros\OficinaRepo;
use Illuminate\Http\Request;

class OficinaController extends ApiController
{
    protected $oficinaRepo;
    protected $oficinaEntidadRepo;

    public function __construct(OficinaRepo $oficinaRepo, OficinaEntidadRepo $oficinaEntidadRepo)
    {
        $this->oficinaRepo = $oficinaRepo;
        $this->oficinaEntidadRepo = $oficinaEntidadRepo;
    }

    public function index()
    {
        $data = $this->oficinaRepo->withOneTables('entidades','n_id_oficina');
        return $this->showAll($data);
    }

    public function store(StoreOficinaRequest $request)
    {
        $nomb       = $request->input('x_nomb_oficina');
        $abre       = $request->input('x_abre');
        $desc       = $request->input('x_desc_oficina');
        $estado     = $request->input('m_estado');
        $entidad    = $request->input('entidad');
        $input      = ['x_nomb_oficina' => $nomb, 'x_abre' => $abre, 'x_desc_oficina' => $desc, 'm_estado' => $estado];
        $res        = $this->oficinaRepo->store($input);
        $cod        = $res['n_id_oficina'];
        $data       = [];
        if($cod > 0)
        {
            $pivot    = ["m_oficina_id" => $cod, "m_entidad_id" => $entidad];
            $this->oficinaEntidadRepo->store($pivot);
            $data = $this->oficinaRepo->withOneTablesWhere('entidades','n_id_oficina', $cod,'n_id_oficina');
        }
        return $this->showOneWith($data);
    }

    public function show($id)
    {
        if(is_numeric($id))
        {
            $data = $this->oficinaRepo->withOneTablesWhere('entidades','n_id_oficina', $id,'n_id_oficina');
            return $this->showOneWith($data);
        }
        else
        {
            return $this->errorResponce('Debe de ingresar un ID valido.',400);
        }
    }

    public function update(UpdateOficinaRequest $request, $id)
    {
        if(is_numeric($id))
        {
            $input  = $request->all();
            $this->oficinaRepo->edit($input, $id);
            $data = $this->oficinaRepo->withOneTablesWhere('entidades','n_id_oficina', $id,'n_id_oficina');
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
            $data = $this->oficinaRepo->edit($input, $id);
            return $this->showOne($data);
        }
        else
        {
            return $this->errorResponce('Debe de ingresar un ID valido.',400);
        }
    }
}