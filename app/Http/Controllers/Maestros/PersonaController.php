<?php

namespace App\Http\Controllers\Maestros;

use App\Http\Controllers\ApiController;
use App\JPR\Repositorios\Maestros\PersonaRepo;

class PersonaController extends ApiController
{
    protected $personaRepo;

    public function __construct(PersonaRepo $personaRepo)
    {
        $this->personaRepo = $personaRepo;
    }
}