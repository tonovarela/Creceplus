<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PapelRequest extends FormRequest
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
            'nombre' => 'required',
            'gramaje' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El campo nombre  es requerido',
            'gramaje.required' => 'El campo gramaje es requerido'
        ];
    }
}
