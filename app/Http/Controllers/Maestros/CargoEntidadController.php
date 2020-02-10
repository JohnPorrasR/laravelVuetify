<?php

namespace App\Http\Controllers\Maestros;


use App\Http\Controllers\ApiController;
use App\JPR\Repositorios\Maestros\CargoEntidadRepo;

class CargoEntidadController extends ApiController
{
    protected $cargoEntidadRepo;

    public function __construct(CargoEntidadRepo $cargoEntidadRepo)
    {
        $this->cargoEntidadRepo = $cargoEntidadRepo;
    }
}

