<?php

namespace App\Http\Requests\Maestros\Actualizar;

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
            'x_nomb_actividad'  => 'required',
            'x_desc_actividad'  => 'required',
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
