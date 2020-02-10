<?php

namespace App\Http\Controllers\Maestros;

use App\Http\Controllers\ApiController;
use App\JPR\Repositorios\Maestros\PerfilRepo;

class PerfilController extends ApiController
{
    protected $perfilRepo;

    public function __construct(PerfilRepo $perfilRepo)
    {
        $this->perfilRepo = $perfilRepo;
    }
}
