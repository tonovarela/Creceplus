<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'usuario'=>'required',
            'password'=>'required'
        ];
    }


    public function messages()
    {
        return [
            'usuario.required' => 'El campo usuario es requerido'
        ];
    }


    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            
            
            // if ($validator->errors())
            //   {
            //     $validator->errors()->add('usuario', 'Esta validación se hace despues de la reglas');
            //  }


        });
    }
}
