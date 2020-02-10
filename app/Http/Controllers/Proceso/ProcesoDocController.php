<?php

namespace App\Http\Controllers\Proceso;

use App\Http\Controllers\ApiController;
use App\JPR\Repositorios\Proceso\ProcesoDocRepo;

class ProcesoDocController extends ApiController
{
    protected $procesoDocRepo;

    public function __construct(ProcesoDocRepo $procesoDocRepo)
    {
        $this->procesoDocRepo = $procesoDocRepo;
    }
}