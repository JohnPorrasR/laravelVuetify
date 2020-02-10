<?php

namespace App\Http\Controllers;

use App\JPR\Repositorios\Maestros\CargoRepo;
use Illuminate\Http\Request;

class HomeController extends ApiController
{
    protected $cargoRepo;

    public function __construct(CargoRepo $cargoRepo)
    {
       $this->cargoRepo = $cargoRepo;
    }

    public function index()
    {
        $data = $this->cargoRepo->all();
        return $this->showAll($data);
    }
}
