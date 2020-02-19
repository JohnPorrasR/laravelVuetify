<?php

namespace App\Http\Controllers\Maestros;

use App\Http\Controllers\ApiController;
use App\JPR\Repositorios\Maestros\ModuloRepo;
use Illuminate\Http\Request;

class ModuloController extends ApiController
{
    protected $moduloRepo;

    public function __construct(ModuloRepo $moduloRepo)
    {
        $this->moduloRepo = $moduloRepo;
    }

    public function index()
    {
        $data = $this->moduloRepo->where('m_estado', 1);
        return $this->showAll($data);
    }

    public function store(Request $request)
    {
        $input  = $request->all();
        $data   = $this->moduloRepo->store($input);
        return $this->showOne($data);
    }

    public function show($id)
    {
        $data = $this->moduloRepo->show($id);
        return $this->showOne($data);
    }

    public function update(Request $request, $id)
    {
        if(is_numeric($id))
        {
            $input  = $request->all();
            $data   = $this->moduloRepo->edit($input, $id);
            return $this->showOne($data);
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
            $input = ['m_estado' => 0];
            $data = $this->moduloRepo->edit($input, $id);
            return $this->showOne($data);
        }
        else
        {
            return $this->errorResponce('Debe de ingresar un ID valido.',400);
        }
    }
}

