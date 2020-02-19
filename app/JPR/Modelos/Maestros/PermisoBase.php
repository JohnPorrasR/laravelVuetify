<?php

namespace App\JPR\Modelos\Maestros;

use Illuminate\Database\Eloquent\Model;

class PermisoBase extends Model
{
    protected $table = 'tmae_permisos_base';
    protected $primaryKey = 'n_id_permiso_base';

    protected $fillable = ['m_perfil_entidad_id', 'm_modulo_id', 'm_estado', ];

    public $timestamps = false;

    public function entidades()
    {
        return $this->belongsToMany(Entidad::class,'tmae_perfil_entidades','m_perfil_id','m_entidad_id','n_id_perfil','n_id_entidad');
    }

    public function permisos()
    {
        return $this->belongsToMany(Perfil::class,'tmae_perfil_entidades','m_perfil_id','m_entidad_id','n_id_perfil','n_id_entidad');
    }

    public function perfiles()
    {
        return $this->belongsToMany(Perfil::class,'tmae_perfil_entidades','m_perfil_id','m_entidad_id','n_id_perfil','n_id_entidad');
    }
}
