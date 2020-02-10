<?php

namespace App\Http\Controllers\Maestros;

use App\Http\Controllers\ApiController;
use App\JPR\Repositorios\Maestros\LogRepo;

class LogController extends ApiController
{
    protected $logRepo;

    public function __construct(LogRepo $logRepo)
    {
        $this->logRepo = $logRepo;
    }
}
