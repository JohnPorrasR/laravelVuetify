<?php

namespace App\JPR\Modelos\Proceso;

use Illuminate\Database\Eloquent\Model;

class ProcesoDoc extends Model
{
    protected $table = 'tpro_procesos_docs';
    protected $primaryKey = 'n_id_proceso_doc';

    protected $fillable = ['x_nomb', 'x_nomb_doc', 'x_url', 'm_urgente', 'm_firmado', 'm_usuario_id', 'm_tipo_doc_entidad_id', 'm_proceso_id', 'm_estado', ];

    public $timestamps = false;
}
