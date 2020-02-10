<?php

namespace App\Http\Controllers\Maestros;

use App\Http\Controllers\ApiController;
use App\JPR\Repositorios\Maestros\ActividadEntidadRepo;

class ActividadEntidadController extends ApiController
{
    protected $actividadEntidadRepo;

    public function __construct(ActividadEntidadRepo $actividadEntidadRepo)
    {
        $this->actividadEntidadRepo = $actividadEntidadRepo;
    }
}
