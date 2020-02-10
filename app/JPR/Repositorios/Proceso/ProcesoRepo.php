<?php

namespace App\JPR\Repositorios\Proceso;

use App\JPR\Modelos\Proceso\Proceso;
use App\JPR\Repositorios\BaseRepo;

class ProcesoRepo extends BaseRepo
{
    public function getModel()
    {
        return new Proceso;
    }
}