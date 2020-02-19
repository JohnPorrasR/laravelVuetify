<?php

namespace App\JPR\Modelos\Maestros;

use App\Transformers\Maestros\EntidadTransformer;
use Illuminate\Database\Eloquent\Model;

class Entidad extends Model
{
    // public $transformer = EntidadTransformer::class;

    protected $table = 'tmae_entidades';
    protected $primaryKey = 'n_id_entidad';

    protected $fillable = ['x_entidad_nomb', 'x_entidad_abr', 'x_direccion', 'm_nodo_id', 'm_estado', ];

    public $timestamps = false;

    public function actividades()
    {
        return $this->belongsToMany(Actividad::class,'tmae_actividades_entidades','m_actividad_id','m_entidad_id','n_id_entidad','n_id_actividad');
    }

    public function cargos()
    {
        return $this->belongsToMany(Cargo::class,'tmae_cargos_entidades','m_cargo_id','m_entidad_id','n_id_entidad','n_id_cargo');
    }

    public function oficinas()
    {
        return $this->belongsToMany(Oficina::class,'tmae_oficinas_entidades','m_oficina_id','m_entidad_id','n_id_entidad','n_id_oficina');
    }

    public function perfiles()
    {
        return $this->belongsToMany(Perfil::class,'tmae_perfiles_entidades','m_perfil_id','m_entidad_id','n_id_entidad','n_id_perfil');
    }

}



















