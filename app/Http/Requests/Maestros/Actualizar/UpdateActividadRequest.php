<?php

namespace App\Http\Requests\Maestros\Actualizar;

use App\Rules\Cadena;
use Illuminate\Foundation\Http\FormRequest;

class UpdateActividadRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'x_nomb_actividad'  => ['required', new Cadena()],
            'x_desc_actividad'  => ['required', new Cadena()],
            'm_estado'          => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'x_nomb_actividad.required' => 'Este campo es obligatorio',
            'x_desc_actividad.required' => 'Este campo es obligatorio',
            'm_estado.required'         => 'Este campo es obligatorio',
            'm_estado.numeric'          => 'El campo solo acepta números',
        ];
    }
}
