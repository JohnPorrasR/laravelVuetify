<?php

namespace App\Http\Controllers\Maestros;

use App\Http\Controllers\ApiController;
use App\JPR\Repositorios\Maestros\ActividadRepo;

class ActividadController extends ApiController
{
    protected $actividadRepo;

    public function __construct(ActividadRepo $actividadRepo)
    {
        $this->actividadRepo = $actividadRepo;
    }
}
