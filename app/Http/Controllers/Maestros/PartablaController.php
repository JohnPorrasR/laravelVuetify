<?php

namespace App\Http\Controllers\Maestros;

use App\Http\Controllers\ApiController;
use App\JPR\Repositorios\Maestros\PartablaRepo;

class PartablaController extends ApiController
{
    protected $partablaRepo;

    public function __construct(PartablaRepo $partablaRepo)
    {
        $this->partablaRepo = $partablaRepo;
    }
}
