<?php

namespace App\Transformers\Maestros;

use App\JPR\Modelos\Maestros\Entidad;
use League\Fractal\TransformerAbstract;

class EntidadTransformer extends TransformerAbstract
{

    protected $defaultIncludes = [
        //
    ];

    protected $availableIncludes = [
        //
    ];

    public function transform(Entidad $entidad)
    {
        return [
             'entidad'       => (int)$entidad->n_id_entidad,
             'nombre'       => (string)$entidad->x_entidad_nomb,
             'abr'          => (string)$entidad->x_entidad_abr,
             'direccion'    => (string)$entidad->x_direccion,
             'cod_drelm'    => (int)$entidad->m_dreugel_id,
             'nodo'         => (int)$entidad->m_nodo_id,
             'estado'       => (string)$entidad->m_estado,
        ];
    }

    public static function originalAttribute($index)
    {
        $attributes = [
            'entidad'      => 'n_id_entidad',
            'nombre'       => 'x_entidad_nomb',
            'abr'          => 'x_entidad_abr',
            'direccion'    => 'x_direccion',
            'cod_drelm'    => 'm_dreugel_id',
            'nodo'         => 'm_nodo_id',
            'estado'       => 'm_estado',
        ];
        return isset($attributes[$index]) ? $attributes[$index] : null;
    }

    public static function transformedAttribute($index)
    {
        $attributes = [
            'n_id_entidad'      => 'entidad',
            'x_entidad_nomb'    => 'nombre',
            'x_entidad_abr'     => 'abr',
            'x_direccion'       => 'direccion',
            'm_dreugel_id'      => 'cod_drelm',
            'm_nodo_id'         => 'nodo',
            'm_estado'          => 'estado',
        ];
        return isset($attributes[$index]) ? $attributes[$index] : null;
    }
}
