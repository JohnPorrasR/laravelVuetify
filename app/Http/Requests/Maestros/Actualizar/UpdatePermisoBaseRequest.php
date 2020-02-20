<?php

namespace App\Http\Requests\Maestros\Actualizar;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePermisoBaseRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'm_perfil_entidad_id'   => 'required|numeric',
            'm_modulo_id'           => 'required',
            'm_estado'              =>'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'm_perfil_entidad_id.required'  => 'Este campo es obligatorio',
            'm_modulo_id.required'          => 'Este campo es obligatorio',
            'm_estado.required'             => 'Este campo es obligatorio',
            'm_perfil_entidad_id.numeric'   => 'Este campo solo acepta números',
            'm_estado.numeric'              => 'Este campo solo acepta números',
        ];
    }
}
