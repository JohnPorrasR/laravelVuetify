<?php

namespace App\Http\Controllers\Maestros;

use App\Http\Controllers\ApiController;
use App\Http\Requests\Maestros\Actualizar\UpdateCargoRequest;
use App\Http\Requests\Maestros\Crear\StoreCargoRequest;
use App\JPR\Repositorios\Maestros\CargoEntidadRepo;
use App\JPR\Repositorios\Maestros\CargoRepo;

class CargoController extends ApiController
{
    protected $cargoRepo;
    protected $cargoEntidadRepo;

    public function __construct(CargoRepo $cargoRepo, CargoEntidadRepo $cargoEntidadRepo)
    {
        $this->cargoRepo = $cargoRepo;
        $this->cargoEntidadRepo = $cargoEntidadRepo;
    }

    public function index()
    {
        $data = $this->cargoRepo->withOneTables('entidades','n_id_cargo');
        return $this->showAll($data);
    }

    public function store(StoreCargoRequest $request)
    {
        $desc           = $request->input('x_cargo_desc');
        $estado         = $request->input('m_estado');
        $entidad        = $request->input('n_id_entidad');
        $inputC         = ['x_cargo_desc' => $desc, 'm_estado' => $estado];
        $res            = $this->cargoRepo->store($inputC);
        $data           = [];
        $cod            = $res['n_id_cargo'];
        if($cod > 0)
        {
            $inputCE    = ["m_cargo_id" => $cod, "m_entidad_id" => $entidad];
            $this->cargoEntidadRepo->store($inputCE);
            $data = $this->cargoRepo->withOneTablesWhere('entidades','n_id_cargo', $cod,'n_id_cargo');
        }
        return $this->showOneWith($data);
    }

    public function show($id)
    {
        if(is_numeric($id))
        {
            $data = $this->cargoRepo->withOneTablesWhere('entidades','n_id_cargo', $id,'n_id_cargo');
            return $this->showOneWith($data);
        }
        else
        {
            return $this->errorResponce('Debe de ingresar un ID valido.',400);
        }
    }

    public function update(UpdateCargoRequest $request, $id)
    {
        if(is_numeric($id))
        {
            $input  = $request->all();
            $this->cargoRepo->edit($input, $id);
            $data = $this->cargoRepo->withOneTablesWhere('entidades','n_id_cargo', $id,'n_id_cargo');
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

        }
        else
        {
            return $this->errorResponce('Debe de ingresar un ID valido.',400);
        }
    }
}
