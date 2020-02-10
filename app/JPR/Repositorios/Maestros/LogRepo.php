<?php

namespace App\JPR\Repositorios\Maestros;

use App\JPR\Modelos\Maestros\Log;
use App\JPR\Repositorios\BaseRepo;

class LogRepo extends BaseRepo
{
    public function getModel()
    {
        return new Log;
    }
}