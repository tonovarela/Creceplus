<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'nombre'=>'required',
            'correo'=>'required',
            'departamento'=>'required',
            'login'=>'required',
            'password'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El campo nombre  es requerido',
            'correo.required' => 'El campo correo es requerido',
            'departamento.required' => 'El campo departamento es requerido',
            'login.required' => 'El campo login es requerido',
            'password.required' => 'El campo password es requerido',

        ];
    }
}
