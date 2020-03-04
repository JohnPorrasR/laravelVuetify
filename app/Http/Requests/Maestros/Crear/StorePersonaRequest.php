<?php

namespace App\Http\Requests\Maestros\Crear;

use App\Rules\Cadena;
use Illuminate\Foundation\Http\FormRequest;

class StorePersonaRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'ape_pat'   => ['required', new Cadena()],
            'ape_mat'   => ['required', new Cadena()],
            'nomb'      => ['required', new Cadena()],
            'dni'       => ['required', new Cadena()],
            'correo'    => 'required',
            'celular'   => 'required|numeric',
            'usu'       => 'required',
            'tipo_per'  => 'required',
            'cargo'     => 'required|numeric',
            'oficina'   => 'required|numeric',
            'entidad'   => 'required|numeric',
            'perfil'    => 'required|numeric',
        ];
    }

    public function messages()
    {
        return [
            'ape_pat.required'  => 'Este campo es obligatorio',
            'ape_mat.required'  => 'Este campo es obligatorio',
            'nomb.required'     => 'Este campo es obligatorio',
            'dni.required'      => 'Este campo es obligatorio',
            'correo.required'   => 'Este campo es obligatorio',
            'celular.required'  => 'Este campo es obligatorio',
            'celular.numeric'   => 'Este campo solo acepta números',
            'usu.required'      => 'Este campo es obligatorio',
            'cargo.required'    => 'Este campo es obligatorio',
            'oficina.required'  => 'Este campo es obligatorio',
            'entidad.required'  => 'Este campo es obligatorio',
            'perfil.required'   => 'Este campo es obligatorio',
            'tipo_per.numeric'  => 'Este campo es obligatorio',
            'cargo.numeric'     => 'Este campo es obligatorio',
            'oficina.numeric'   => 'Este campo es obligatorio',
            'entidad.numeric'   => 'Este campo es obligatorio',
            'perfil.numeric'    => 'Este campo es obligatorio',
        ];
    }
}
