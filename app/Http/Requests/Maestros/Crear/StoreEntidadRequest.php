<?php

namespace App\Http\Requests\Maestros\Crear;

use App\Rules\Cadena;
use Illuminate\Foundation\Http\FormRequest;

class StoreEntidadRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'x_entidad_nomb'    => ['required', new Cadena()],
            'x_entidad_abr'     => ['required', new Cadena()],
            'x_direccion'       => ['required', new Cadena()],
            'm_nodo_id'         => 'required|numeric',
            'm_estado'          => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'x_entidad_nomb.required'   => 'Este campo es obligatorio',
            'x_entidad_abr.required'    => 'Este campo es obligatorio',
            'x_direccion.required'      => 'Este campo es obligatorio',
            'm_nodo_id.required'        => 'Este campo es obligatorio',
            'm_estado.required'         => 'Este campo es obligatorio',
            'm_nodo_id.numeric'         => 'Favor de ingresar un número valido',
            'm_estado.numeric'          => 'Favor de ingresar un número valido',
        ];
    }
}