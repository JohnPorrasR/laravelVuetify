<?php

namespace App\Http\Requests\Maestros\Actualizar;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCargoRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'x_cargo_desc'  => 'required|alpha_num',
            'm_estado'      =>'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'x_cargo_desc.required' => 'Este campo es obligatorio',
            'x_cargo_desc.alpha_num' => 'Este campo solo acepta texto',
            'm_estado.required' => 'Este campo es obligatorio',
            'm_estado.numeric' => 'Favor de ingresar un número valido',
        ];
    }
}
