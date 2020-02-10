<?php

namespace App\JPR\Modelos\Proceso;

use Illuminate\Database\Eloquent\Model;

class Proceso extends Model
{
    protected $table = 'tpro_procesos';
    protected $primaryKey = 'n_id_proceso';

    protected $fillable = ['x_sinad', 'f_creacion', 'f_actualizacion', 'm_actividad_entidad_id', 'm_terminado', 'm_accion', 'm_estado', ];

    public $timestamps = false;
}
