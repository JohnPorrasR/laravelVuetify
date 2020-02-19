<?php

namespace App\JPR\Repositorios\Maestros;

use App\JPR\Modelos\Maestros\PersonaDetalle;
use App\JPR\Repositorios\BaseRepo;

class PersonaDetalleRepo extends BaseRepo
{
    public function getModel()
    {
        return new PersonaDetalle;
    }
}