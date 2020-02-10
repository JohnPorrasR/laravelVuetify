<?php

namespace App\JPR\Modelos\Maestros;

use Illuminate\Database\Eloquent\Model;

class PerfilesEntidades extends Model
{
    protected $table = 'tmae_perfiles_entidades';
    protected $primaryKey = 'n_id_perfil_entidad';

    protected $fillable = ['m_perfil_id', 'm_entidad_id', 'm_estado', ];

    public $timestamps = false;
}
