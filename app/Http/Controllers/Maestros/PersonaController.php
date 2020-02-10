<?php

namespace App\Http\Controllers\Maestros;

use App\Http\Controllers\ApiController;
use App\JPR\Repositorios\Maestros\PersonaRepo;
use Illuminate\Support\Facades\Request;

class PersonaController extends ApiController
{
    protected $personaRepo;

    public function __construct(PersonaRepo $personaRepo)
    {
        $this->personaRepo = $personaRepo;
    }

    public function index()
    {
        $data = $this->personaRepo->all();
        return $this->showAll($data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}