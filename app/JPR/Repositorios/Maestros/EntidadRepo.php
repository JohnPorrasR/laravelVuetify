<?php

namespace App\JPR\Repositorios\Maestros;

use App\JPR\Modelos\Maestros\Entidad;
use App\JPR\Repositorios\BaseRepo;

class EntidadRepo extends BaseRepo
{
    public function getModel()
    {
        return new Entidad;
    }
}