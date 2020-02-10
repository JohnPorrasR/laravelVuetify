<?php

namespace App\JPR\Modelos\Maestros;

use Illuminate\Database\Eloquent\Model;

class PermisosBases extends Model
{
    protected $table = 'tmae_permisos_base';
    protected $primaryKey = 'n_id_permiso_base';

    protected $fillable = ['m_perfil_entidad_id', 'm_modulo_id', 'm_estado', ];

    public $timestamps = false;
}
