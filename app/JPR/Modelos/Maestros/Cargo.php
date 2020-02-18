<?php

namespace App\JPR\Modelos\Maestros;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    protected $table = 'tmae_cargos';
    protected $primaryKey = 'n_id_cargo';

    protected $fillable = ['x_cargo_desc', 'm_estado',];

    public $timestamps = false;

    public function entidades()
    {
        return $this->belongsToMany(Entidad::class,'tmae_cargos_entidades','m_cargo_id','m_entidad_id','n_id_cargo','n_id_entidad');
    }

}
