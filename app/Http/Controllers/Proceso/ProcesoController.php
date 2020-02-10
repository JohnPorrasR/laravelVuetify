<?php

namespace App\Http\Controllers\Proceso;


use App\Http\Controllers\ApiController;
use App\JPR\Repositorios\Proceso\ProcesoRepo;

class ProcesoController extends ApiController
{
    protected $procesoRepo;

    public function __construct(ProcesoRepo $procesoRepo)
    {
        $this->procesoRepo = $procesoRepo;
    }
}