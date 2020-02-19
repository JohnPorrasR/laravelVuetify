<?php

namespace App\Http\Requests\Maestros\Crear;

use App\Rules\Cadena;
use Illuminate\Foundation\Http\FormRequest;

class StoreCargoRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'x_cargo_desc'  => ['required', new Cadena()],
            'm_estado'      =>'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'x_cargo_desc.required' => 'Este campo es obligatorio',
            'm_estado.required' => 'Este campo es obligatorio',
            'm_estado.numeric' => 'Favor de ingresar un número valido',
        ];
    }
}
