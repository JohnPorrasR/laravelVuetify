<?php

namespace App\JPR\Repositorios\Maestros;

use App\JPR\Modelos\Maestros\Oficina;
use App\JPR\Repositorios\BaseRepo;

class OficinaRepo extends BaseRepo
{
    public function getModel()
    {
        return new Oficina;
    }
}