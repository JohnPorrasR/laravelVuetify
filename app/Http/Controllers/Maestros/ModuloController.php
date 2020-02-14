<?php

namespace App\Http\Controllers\Maestros;

use App\Http\Controllers\ApiController;
use App\JPR\Repositorios\Maestros\ModuloRepo;

class ModuloController extends ApiController
{
    protected $moduloRepo;

    public function __construct(ModuloRepo $moduloRepo)
    {
        $this->moduloRepo = $moduloRepo;
    }

    public function index()
    {
        return $this->moduloRepo->withOneTables('','','');
    }

}

