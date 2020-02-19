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
        $data = $this->entidadRepo->where('m_estado', 1);
        return $this->showAll($data);
    }

    public function store(Request $request)
    {
        $input  = $request->all();
        $data   = $this->entidadRepo->store($input);
        return $this->showOne($data);
    }

    public function show($id)
    {
        $data = $this->entidadRepo->show($id);
        return $this->showOne($data);
    }

    public function update(Request $request, $id)
    {
        if(is_numeric($id))
        {
            $input  = $request->all();
            $data   = $this->entidadRepo->edit($input, $id);
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
            $data = $this->entidadRepo->edit($input, $id);
            return $this->showOne($data);
        }
        else
        {
            return $this->errorResponce('Debe de ingresar un ID valido.',400);
        }
    }
}

