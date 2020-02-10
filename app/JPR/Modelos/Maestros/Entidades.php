<?php

namespace App\JPR\Modelos\Maestros;

use Illuminate\Database\Eloquent\Model;

class Entidades extends Model
{
    protected $table = 'tmae_entidades';
    protected $primaryKey = 'n_id_entidad';

    protected $fillable = ['x_entidad_nomb', 'x_entidad_abr', 'x_direccion', 'm_dreugel_id', 'm_nodo_id', 'm_estado', ];

    public $timestamps = false;
}
