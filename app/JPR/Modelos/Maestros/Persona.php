<?php

namespace App\JPR\Modelos\Maestros;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'tmae_personas';
    protected $primaryKey = 'n_id_persona';

    protected $fillable = ['x_ape_pat', 'x_ape_mat', 'x_nombres', 'x_dni', 'x_correo', 'm_celular', 'm_usuario_id', 'm_tipo_persona', ];

    public $timestamps = false;

    public function detalles()
    {
        return $this->hasMany(PersonaDetalle::class,'m_persona_id','n_id_persona');
    }

}
