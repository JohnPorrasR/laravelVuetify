<?php

namespace App\Http\Controllers\Maestros;

use App\Http\Controllers\ApiController;
use App\JPR\Repositorios\Maestros\EntidadRepo;

class EntidadController extends ApiController
{
    protected $entidadRepo;

    public function __construct(EntidadRepo $entidadRepo)
    {
        $this->entidadRepo = $entidadRepo;
    }
}

