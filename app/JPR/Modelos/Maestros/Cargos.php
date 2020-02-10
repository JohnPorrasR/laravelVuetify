<?php

namespace App\JPR\Modelos\Maestros;

use Illuminate\Database\Eloquent\Model;

class Cargos extends Model
{
    protected $table = 'tmae_cargos';
    protected $primaryKey = 'n_id_cargo';

    protected $fillable = ['x_cargo_desc', 'm_estado',];

    public $timestamps = false;
}
