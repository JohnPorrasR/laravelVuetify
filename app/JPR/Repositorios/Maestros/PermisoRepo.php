<?php

namespace App\JPR\Repositorios\Maestros;

use App\JPR\Modelos\Maestros\Permiso;
use App\JPR\Repositorios\BaseRepo;

class PermisoRepo extends BaseRepo
{
    public function getModel()
    {
        return new Permiso;
    }
}