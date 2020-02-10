<?php

namespace App\JPR\Modelos\Maestros;

use Illuminate\Database\Eloquent\Model;

class Oficinas extends Model
{
    protected $table = 'tmae_oficinas';
    protected $primaryKey = 'n_id_oficina';

    protected $fillable = ['x_nomb_oficina', 'x_abre', 'x_desc_oficina', 'm_estado', ];

    public $timestamps = false;
}
