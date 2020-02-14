<?php

namespace App\JPR\Modelos\Maestros;

use App\Transformers\ActividadTransformer;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    public $transformer = ActividadTransformer::class;

    protected $table = 'tmae_actividades';
    protected $primaryKey = 'n_id_actividad';

    protected $fillable = ['x_nomb_actividad', 'x_desc_actividad', 'm_estado', ];

    public $timestamps = false;

    public function entidades()
    {
        return $this->belongsToMany(Entidad::class,'tmae_actividades_entidades','m_actividad_id','m_entidad_id','n_id_actividad','n_id_entidad');
        // return $this->hasMany(ActividadEntidad::class, 'm_actividad_id', 'n_id_actividad');
    }
}
