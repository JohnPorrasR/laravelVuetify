<?php

namespace App\Http\Controllers\Maestros;

use App\Http\Controllers\ApiController;
use App\JPR\Repositorios\Maestros\EntidadRepo;
use Illuminate\Http\Request;

class EntidadController extends ApiController
{
    protected $entidadRepo;

    public function __construct(EntidadRepo $entidadRepo)
    {
        $this->entidadRepo = $entidadRepo;
    }

    public function index()
    {

    }

    public function store(Request $request)
    {
        $cod    = 0;
        $data   = [];
        if($cod > 0)
        {

        }
        return $this->showOneWith($data);
    }

    public function show($id)
    {

    }

    public function update(Request $request, $id)
    {
        if(is_numeric($id))
        {

        }
        else
        {
            return $this->errorResponce('Debe de ingresar un ID valido.',400);
        }
    }

    public function destroy($id)
    {
        if(is_numeric($id))
        {

        }
        else
        {
            return $this->errorResponce('Debe de ingresar un ID valido.',400);
        }
    }
}

