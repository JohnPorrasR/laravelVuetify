<?php

namespace App\JPR\Modelos\Maestros;

use Illuminate\Database\Eloquent\Model;

class Permisos extends Model
{
    protected $table = 'tmae_permisos';
    protected $primaryKey = 'n_id_permiso';

    protected $fillable = ['m_persona_id', 'm_perfil_entidad_id', 'm_modulo_id', 'm_estado', ];

    public $timestamps = false;
}
