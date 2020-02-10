<?php

namespace App\Http\Controllers\Maestros;

use App\Http\Controllers\ApiController;
use App\JPR\Repositorios\Maestros\OficinaRepo;

class OficinaController extends ApiController
{
    protected $oficinaRepo;

    public function __construct(OficinaRepo $oficinaRepo)
    {
        $this->oficinaRepo = $oficinaRepo;
    }
}