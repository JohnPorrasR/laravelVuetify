<?php

namespace App\Http\Controllers\Maestros;

use App\Http\Controllers\ApiController;
use App\JPR\Repositorios\Maestros\PersonaEntidadRepo;

class PersonaEntidadController extends ApiController
{
    protected $personaEntidadRepo;

    public function __construct(PersonaEntidadRepo $personaEntidadRepo)
    {
        $this->personaEntidadRepo = $personaEntidadRepo;
    }
}
