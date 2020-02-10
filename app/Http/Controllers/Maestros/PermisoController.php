<?php

namespace App\Http\Controllers\Maestros;

use App\Http\Controllers\ApiController;
use App\JPR\Repositorios\Maestros\PermisoRepo;

class PermisoController extends ApiController
{
    protected $permisoRepo;

    public function __construct(PermisoRepo $permisoRepo)
    {
        $this->permisoRepo = $permisoRepo;
    }
}