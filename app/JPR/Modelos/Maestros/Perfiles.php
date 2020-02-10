<?php

namespace App\JPR\Modelos\Maestros;

use Illuminate\Database\Eloquent\Model;

class Perfiles extends Model
{
    protected $table = 'tmae_perfiles';
    protected $primaryKey = 'n_id_perfil';

    protected $fillable = ['x_desc_perfil', 'm_estado', ];

    public $timestamps = false;
}
