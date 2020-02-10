<?php

namespace App\JPR\Repositorios\Maestros;

use App\JPR\Modelos\Maestros\Perfil;
use App\JPR\Repositorios\BaseRepo;

class PerfilRepo extends BaseRepo
{
    public function getModel()
    {
        return new Perfil;
    }
}