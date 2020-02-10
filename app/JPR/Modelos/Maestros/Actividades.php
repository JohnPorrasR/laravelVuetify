<?php

namespace App\JPR\Modelos\Maestros;

use Illuminate\Database\Eloquent\Model;

class Actividades extends Model
{
    protected $table = 'tmae_actividades';
    protected $primaryKey = 'n_id_actividad';

    protected $fillable = ['x_nomb_actividad', 'x_desc_actividad', 'm_estado', ];

    public $timestamps = false;
}
