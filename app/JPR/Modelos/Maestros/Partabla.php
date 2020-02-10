<?php

namespace App\JPR\Modelos\Maestros;

use Illuminate\Database\Eloquent\Model;

class Partabla extends Model
{
    protected $table = 'tmae_partabla';
    protected $primaryKey = 'x_par_item_cod';

    protected $fillable = ['x_par_tabla', 'x_par_item_desc', 'x_par_item_abre', 'x_par_item_aux1', 'x_par_item_aux2', 'm_estado', ];

    public $timestamps = false;
}
