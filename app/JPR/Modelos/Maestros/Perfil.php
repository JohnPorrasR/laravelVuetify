<?php

namespace App\JPR\Modelos\Maestros;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $table = 'tmae_perfiles';
    protected $primaryKey = 'n_id_perfil';

    protected $fillable = ['x_desc_perfil', 'm_estado', ];

    public $timestamps = false;

    public function entidades()
    {
        return $this->belongsToMany(Entidad::class,'tmae_perfiles_entidades','m_perfil_id','m_entidad_id','n_id_perfil','n_id_entidad');
    }
}







































