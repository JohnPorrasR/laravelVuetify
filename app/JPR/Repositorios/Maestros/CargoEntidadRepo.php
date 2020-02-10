<?php

namespace App\JPR\Repositorios\Maestros;


use App\JPR\Modelos\Maestros\CargoEntidad;
use App\JPR\Repositorios\BaseRepo;

class CargoEntidadRepo extends BaseRepo
{
    public function getModel()
    {
        return new CargoEntidad;
    }
}