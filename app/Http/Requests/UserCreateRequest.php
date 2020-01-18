<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
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
            'name'=>'required|string|max:255',
            'email'=>'required|string|email|max:255|unique:users',
            'password'=>'required|string|min:8|confirmed'
        ];
    }

    public function messages()
    {
        return[
            'name.required'=>'El :attribute es Obligatorio',
            'name.max'=>'La longitud máxima de :attribute es de 255 caracteres',
            'email.required'=>'El :attribute es Obligatorio',
            'email.max'=>'La longitud máxima de :attribute es de 255 caracteres',
            'password.required'=>'La :attribute es Obligatoria',
            'password.min'=>'La longitud mínima de :attribute debe ser mínimo 8 caracteres',
            'password.confirmed'=>'Los campos de contraseña no coinciden'
        ];
    }

    public function attributes()
    {
        return [
            'name'=>'Nombre',
            'password'=>'Contraseña'
        ];
    }
}
