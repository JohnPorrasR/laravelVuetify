<?php

namespace App\JPR\Modelos\Maestros;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    protected $table = 'tmae_permisos';
    protected $primaryKey = 'n_id_permiso';

    protected $fillable = ['m_persona_id', 'm_perfil_entidad_id', 'm_modulo_id', 'm_estado', ];

    public $timestamps = false;

    public function modulos()
    {
        return $this->belongsTo(Modulo::class, 'm_modulo_id', 'n_id_,odulo');
    }

    public function perfiles_entidades()
    {
        return $this->belongsTo(PerfilEntidad::class, 'm_perfil_entidad_id', 'n_id_perfil_entidad');
    }

}





























