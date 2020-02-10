<?php

namespace App\JPR\Modelos\Maestros;

use Illuminate\Database\Eloquent\Model;

class ActividadesEntidades extends Model
{
    protected $table = 'tmae_actividades_entidades';
    protected $primaryKey = 'n_id_actividad_entidad';

    protected $fillable = ['m_actividad_id', 'm_entidad_id', 'm_estado',];

    public $timestamps = false;
}
