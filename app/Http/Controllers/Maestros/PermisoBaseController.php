<?php

namespace App\Http\Controllers\Maestros;

use App\Http\Controllers\ApiController;
use App\JPR\Repositorios\Maestros\PermisoBaseRepo;

class PermisoBaseController extends ApiController
{
    protected $permisoBaseRepo;

    public function __construct(PermisoBaseRepo $permisoBaseRepo)
    {
        $this->permisoBaseRepo = $permisoBaseRepo;
    }
}