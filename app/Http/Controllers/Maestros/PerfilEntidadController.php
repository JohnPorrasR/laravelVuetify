<?php

namespace App\Http\Controllers\Maestros;

use App\Http\Controllers\ApiController;
use App\JPR\Repositorios\Maestros\PerfilEntidadRepo;

class PerfilEntidadController extends ApiController
{
    protected $perfilEntidadRepo;

    public function __construct(PerfilEntidadRepo $perfilEntidadRepo)
    {
        $this->perfilEntidadRepo = $perfilEntidadRepo;
    }
}