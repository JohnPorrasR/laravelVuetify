<?php

namespace App\JPR\Repositorios\Maestros;

use App\JPR\Modelos\Maestros\Modulo;
use App\JPR\Repositorios\BaseRepo;

class ModuloRepo extends BaseRepo
{
    public function getModel()
    {
        return new Modulo;
    }
}