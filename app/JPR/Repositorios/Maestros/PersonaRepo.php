<?php

namespace App\JPR\Repositorios\Maestros;

use App\JPR\Modelos\Maestros\Persona;
use App\JPR\Repositorios\BaseRepo;

class PersonaRepo extends BaseRepo
{
    public function getModel()
    {
        return new Persona;
    }
}