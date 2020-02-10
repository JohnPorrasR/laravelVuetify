<?php

namespace App\JPR\Repositorios\Maestros;

use App\JPR\Modelos\Maestros\Actividad;
use App\JPR\Repositorios\BaseRepo;

class ActividadRepo extends BaseRepo
{
    public function getModel()
    {
        return new Actividad;
    }
}