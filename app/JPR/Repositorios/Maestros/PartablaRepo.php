<?php

namespace App\JPR\Repositorios\Maestros;

use App\JPR\Modelos\Maestros\Partabla;
use App\JPR\Repositorios\BaseRepo;

class PartablaRepo extends BaseRepo
{
    public function getModel()
    {
        return new Partabla;
    }
}