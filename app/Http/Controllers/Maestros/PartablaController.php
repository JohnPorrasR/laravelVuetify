<?php

namespace App\Http\Controllers\Maestros;

use App\Http\Controllers\ApiController;
use App\JPR\Repositorios\Maestros\PartablaRepo;
use Illuminate\Http\Request;

class PartablaController extends ApiController
{
    protected $partablaRepo;

    public function __construct(PartablaRepo $partablaRepo)
    {
        $this->partablaRepo = $partablaRepo;
    }

    public function index()
    {
        $data = $this->partablaRepo->where('m_estado', 1);
        return $this->showAll($data);
    }

    public function store(Request $request)
    {
        $input  = $request->all();
        $data   = $this->partablaRepo->store($input);
        return $this->showOne($data);
    }

    public function show($id)
    {
        $data = $this->partablaRepo->show($id);
        return $this->showOne($data);
    }

    public function update(Request $request, $id)
    {
        if(is_numeric($id))
        {
            $input  = $request->all();
            $data   = $this->partablaRepo->edit($input, $id);
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
            $data = $this->partablaRepo->edit($input, $id);
            return $this->showOne($data);
        }
        else
        {
            return $this->errorResponce('Debe de ingresar un ID valido.',400);
        }
    }
}

