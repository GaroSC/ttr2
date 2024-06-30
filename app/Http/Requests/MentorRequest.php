<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MentorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'name' => ['required' , 'regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s]+$/' , 'max:255'],
            'id_ipn' => ['required' , 'numeric' , 'unique:users'],
            'phone' => ['numeric' , 'digits:10' , 'required' , 'unique:users'],
            'email' => ['required' , 'string' , 'lowercase' , 'email' , 'max:255' , 'unique:users'],
            'password' => ['required' , 'string' , 'min:8' , 'confirmed'],

        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo nombre es obligatorio.',
            'name.regex' => 'El campo nombre solo puede contener letras y espacios.',
            'name.max' => 'El campo nombre no puede contener más de 255 caracteres.',
            'id_ipn.required' => 'El campo id ipn es obligatorio.',
            'id_ipn.numeric' => 'El campo id ipn debe ser un número.',
            'id_ipn.unique' => 'El id ipn ya ha sido registrado.',
            'phone.numeric' => 'El campo teléfono debe ser un número.',
            'phone.digits' => 'El campo teléfono debe contener 10 dígitos.',
            'phone.required' => 'El campo teléfono es obligatorio.',
            'phone.unique' => 'El teléfono ya ha sido registrado.',
            'email.required' => 'El campo correo electrónico es obligatorio.',
            'email.string' => 'El campo correo electrónico debe ser una cadena de texto.',
            'email.lowercase' => 'El campo correo electrónico debe estar en minúsculas.',
            'email.email' => 'El campo correo electrónico debe ser un correo válido.',
            'email.max' => 'El campo correo electrónico no puede contener más de 255 caracteres.',
            'email.unique' => 'El correo electrónico ya ha sido registrado.',
            'password.required' => 'El campo contraseña es obligatorio.',
            'password.string' => 'El campo contraseña debe ser una cadena de texto.',
            'password.min' => 'El campo contraseña debe contener al menos 8 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
        ];
    }

}
