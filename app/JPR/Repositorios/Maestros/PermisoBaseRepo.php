<?php

namespace App\JPR\Repositorios\Maestros;

use App\JPR\Modelos\Maestros\PermisoBase;
use App\JPR\Repositorios\BaseRepo;

class PermisoBaseRepo extends BaseRepo
{
    public function getModel()
    {
        return new PermisoBase;
    }
}