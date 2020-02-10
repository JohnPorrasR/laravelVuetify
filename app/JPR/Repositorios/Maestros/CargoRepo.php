<?php

namespace App\JPR\Repositorios\Maestros;

use App\JPR\Modelos\Maestros\Cargo;
use App\JPR\Repositorios\BaseRepo;

class CargoRepo extends BaseRepo
{
    public function getModel()
    {
        return new Cargo;
    }
}