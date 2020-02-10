<?php

namespace App\Http\Controllers\Maestros;

use App\Http\Controllers\ApiController;
use App\JPR\Repositorios\Maestros\OficinaEntidadRepo;

class OficinEntidadController extends ApiController
{
    protected $oficinaEntidadRepo;

    public function __construct(OficinaEntidadRepo $oficinaEntidadRepo)
    {
        $this->oficinaEntidadRepo = $oficinaEntidadRepo;
    }
}
