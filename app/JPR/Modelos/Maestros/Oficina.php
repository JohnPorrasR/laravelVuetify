<?php

namespace App\JPR\Modelos\Maestros;

use Illuminate\Database\Eloquent\Model;

class Oficina extends Model
{
    protected $table = 'tmae_oficinas';
    protected $primaryKey = 'n_id_oficina';

    protected $fillable = ['x_nomb_oficina', 'x_abre', 'x_desc_oficina', 'm_estado', ];

    public $timestamps = false;

    public function entidad()
    {
        return $this->hasMany(OficinaEntidad::class, 'm_oficina_id', 'n_id_oficina');
    }

}
