<?php

namespace App\JPR\Modelos\Maestros;

use Illuminate\Database\Eloquent\Model;

class ActividadEntidad extends Model
{
    protected $table = 'tmae_actividades_entidades';
    protected $primaryKey = 'n_id_actividad_entidad';

    protected $fillable = ['m_actividad_id', 'm_entidad_id', 'm_estado',];

    public $timestamps = false;

    public function actividades()
    {
        return $this->belongsTo(Actividad::class, 'm_actividad_id', 'n_id_actividad');
    }

    public function entidades()
    {
        return $this->belongsTo( Entidad::class,'m_entidad_id', 'n_id_entidad');
    }

}
