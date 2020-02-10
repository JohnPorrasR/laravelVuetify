<?php

namespace App\JPR\Modelos\Maestros;

use Illuminate\Database\Eloquent\Model;

class OficinaEntidad extends Model
{
    protected $table = 'tmae_oficinas_entidades';
    protected $primaryKey = 'n_id_oficina_entidad';

    protected $fillable = ['m_oficina_id', 'm_entidad_id', 'm_estado', ];

    public $timestamps = false;
}
