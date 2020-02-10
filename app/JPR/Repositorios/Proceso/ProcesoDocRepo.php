<?php

namespace App\JPR\Repositorios\Proceso;

use App\JPR\Modelos\Proceso\ProcesoDoc;
use App\JPR\Repositorios\BaseRepo;

class ProcesoDocRepo extends BaseRepo
{
    public function getModel()
    {
        return new ProcesoDoc;
    }
}