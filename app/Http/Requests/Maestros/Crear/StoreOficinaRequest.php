<?php

namespace App\Http\Requests\Maestros\Crear;

use App\Rules\Cadena;
use Illuminate\Foundation\Http\FormRequest;

class StoreOficinaRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'x_nomb_oficina'    => ['required', new Cadena()],
            'x_abre'            => 'required|alpha',
            'x_desc_oficina'    => ['required', new Cadena()],
            'm_estado'          =>'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'x_nomb_oficina.required'   => 'Este campo es obligatorio',
            'x_abre.required'           => 'Este campo es obligatorio',
            'x_desc_oficina.required'   => 'Este campo es obligatorio',
            'm_estado.required'         => 'Este campo es obligatorio',
            'x_abre.alpha'              => 'Este campo solo acepta texto',
            'm_estado.numeric'          => 'Favor de ingresar un número valido',
        ];
    }
}
