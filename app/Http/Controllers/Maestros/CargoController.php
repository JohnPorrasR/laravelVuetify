<?php

namespace App\Http\Controllers\Maestros;

use App\Http\Controllers\ApiController;
use App\JPR\Repositorios\Maestros\CargoRepo;

class CargoController extends ApiController
{
    protected $cargoRepo;

    public function __construct(CargoRepo $cargoRepo)
    {
        $this->cargoRepo = $cargoRepo;
    }
}
