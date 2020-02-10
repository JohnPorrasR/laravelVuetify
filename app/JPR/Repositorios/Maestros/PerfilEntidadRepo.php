<?php

namespace App\JPR\Repositorios\Maestros;

use App\JPR\Modelos\Maestros\PerfilEntidad;
use App\JPR\Repositorios\BaseRepo;

class PerfilEntidadRepo extends BaseRepo
{
    public function getModel()
    {
        return new PerfilEntidad;
    }
}