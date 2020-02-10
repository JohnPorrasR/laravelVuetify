<?php

namespace App\JPR\Repositorios\Maestros;

use App\JPR\Modelos\Maestros\ActividadEntidad;
use App\JPR\Repositorios\BaseRepo;

class ActividadEntidadRepo extends BaseRepo
{
    public function getModel()
    {
        return new ActividadEntidad;
    }
}