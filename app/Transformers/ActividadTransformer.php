<?php

namespace App\Transformers;

use App\JPR\Modelos\Maestros\Actividad;
use League\Fractal\TransformerAbstract;

class ActividadTransformer extends TransformerAbstract
{

    protected $defaultIncludes = [
        //
    ];

    protected $availableIncludes = [
        //
    ];

    public function transform(Actividad $actividad)
    {
        return [
            'cod'           => (int)$actividad->n_id_actividad,
            'nombre'        => (string)$actividad->x_nomb_actividad,
            'descripcion'   => (string)$actividad->x_desc_actividad,
            'estado'        => (int)$actividad->m_estado,
        ];
    }

    public static function originalAttribute($index)
    {
        $attributes = [
            'cod'           => 'n_id_actividad',
            'nombre'        => 'x_nomb_actividad',
            'descripcion'   => 'x_desc_actividad',
            'estado'        => 'm_estado',
        ];
        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
