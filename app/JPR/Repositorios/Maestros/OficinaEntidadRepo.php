<?php

namespace App\JPR\Repositorios\Maestros;

use App\JPR\Modelos\Maestros\OficinaEntidad;
use App\JPR\Repositorios\BaseRepo;

class OficinaEntidadRepo extends BaseRepo
{
    public function getModel()
    {
        return new OficinaEntidad;
    }
}