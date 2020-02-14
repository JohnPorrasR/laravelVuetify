<?php

namespace App\JPR\Modelos\Maestros;

use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    protected $table = 'tmae_perfiles';
    protected $primaryKey = 'n_id_perfil';

    protected $fillable = ['x_desc_perfil', 'm_estado', ];

    public $timestamps = false;

    public function perfiles_entidades()
    {
        return $this->hasMany(PerfilEntidad::class, 'm_perfil_id', 'n_id_perfil');
    }

}
