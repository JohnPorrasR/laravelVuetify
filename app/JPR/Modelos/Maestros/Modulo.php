<?php

namespace App\JPR\Modelos\Maestros;

use Illuminate\Database\Eloquent\Model;

class Modulo extends Model
{
    protected $table = 'tmae_modulos';
    protected $primaryKey = 'n_id_modulo';

    protected $fillable = ['x_modulo_desc', 'x_url', 'x_etiqueta', 'm_modulo_id', 'm_orden', 'm_estado', ];

    public $timestamps = false;

    public function modulo()
    {
        return $this->hasMany(Modulo::class, 'm_modulo_id','n_id_modulo');
    }

}
