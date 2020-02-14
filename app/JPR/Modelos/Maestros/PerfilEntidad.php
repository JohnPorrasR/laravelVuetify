<?php

namespace App\JPR\Modelos\Maestros;

use Illuminate\Database\Eloquent\Model;

class PerfilEntidad extends Model
{
    protected $table = 'tmae_perfiles_entidades';
    protected $primaryKey = 'n_id_perfil_entidad';

    protected $fillable = ['m_perfil_id', 'm_entidad_id', 'm_estado', ];

    public $timestamps = false;

    public function perfiles()
    {
        return $this->belongsTo(Perfil::class, 'm_perfil_id', 'n_id_perfil');
    }

    public function entidades()
    {
        return $this->belongsTo(Entidad::class, 'm_entidad_id', 'n_id_entidad');
    }

}
