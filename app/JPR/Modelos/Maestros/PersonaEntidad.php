<?php

namespace App\JPR\Modelos\Maestros;

use Illuminate\Database\Eloquent\Model;

class PersonaEntidad extends Model
{
    protected $table = 'tmae_personas_entidades';
    protected $primaryKey = 'n_id_persona_entidad';

    protected $fillable = ['m_persona_id', 'm_entidad_id', 'm_perfil_entidad_id', 'm_cargo_entidad_id', 'm_oficina_entidad_id', 'm_estado', ];

    public $timestamps = false;
}
