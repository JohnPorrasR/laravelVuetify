<?php

namespace App\JPR\Modelos\Maestros;

use Illuminate\Database\Eloquent\Model;

class CargoEntidad extends Model
{
    protected $table = 'tmae_cargos_entidades';
    protected $primaryKey = 'n_id_cargo_entidad';

    protected $fillable = ['m_cargo_id', 'm_entidad_id', 'm_estado', ];

    public $timestamps = false;
}
