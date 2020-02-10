<?php

namespace App\JPR\Modelos\Maestros;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = 'tmae_log';
    protected $primaryKey = 'n_id_log';

    protected $fillable = ['x_tabla', 'id_reg_table', 'x_campo_name', 'x_dato_old', 'x_dato_new', 'x_accion', 'n_id_usuario', 'x_user_bd', 'f_fecha', 'n_estado', ];

    public $timestamps = false;
}
