<?php

namespace App\JPR\Modelos\Maestros;

use Illuminate\Database\Eloquent\Model;

class Entidad extends Model
{
    protected $table = 'tmae_entidades';
    protected $primaryKey = 'n_id_entidad';

    protected $fillable = ['x_entidad_nomb', 'x_entidad_abr', 'x_direccion', 'm_dreugel_id', 'm_nodo_id', 'm_estado', ];

    public $timestamps = false;

    public function actividades()
    {
        return $this->belongsToMany(Actividad::class,'tmae_actividades_entidades','m_actividad_id','m_entidad_id','n_id_actividad','n_id_entidad');
        // return $this->hasMany(ActividadEntidad::class, 'm_entidad_id', 'n_id_entidad');
    }

    public function cargos()
    {
        return $this->hasMany(CargoEntidad::class, 'm_entidad_id', 'n_id_entidad');
    }

    public function oficinas()
    {
        return $this->hasMany(OficinaEntidad::class, 'm_entidad_id', 'n_id_entidad');
    }

    public function perfiles()
    {
        return $this->hasMany(PerfilEntidad::class, 'm_entidad_id', 'n_id_entidad');
    }

}



















