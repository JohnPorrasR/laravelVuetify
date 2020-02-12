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
            'links'         => [
                [
                    'rel'   => 'self',
                    'href'  => route('actividad.show', $actividad->n_id_actividad),
                ]
            ]
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

    public static function transformedAttribute($index)
    {
        $attributes = [
            'n_id_actividad'    => 'cod',
            'x_nomb_actividad'  => 'nombre',
            'x_desc_actividad'  => 'descripcion',
            'm_estado'          => 'estado',
        ];
        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
