<?php

namespace App\JPR\Repositorios\Maestros;

use App\JPR\Modelos\Maestros\PersonaEntidad;
use App\JPR\Repositorios\BaseRepo;

class PersonaEntidadRepo extends BaseRepo
{
    public function getModel()
    {
        return new PersonaEntidad;
    }
}