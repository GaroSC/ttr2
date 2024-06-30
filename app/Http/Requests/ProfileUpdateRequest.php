<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'regex:/^[a-zA-ZáéíóúÁÉÍÓÚ\s]+$/', 'max:255'],
            'id_ipn' => ['required', 'numeric'],
            'phone' => ['numeric', 'digits:10', 'required'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'photo' => ['mimes:jpeg,png,jpg'],
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
            'phone.numeric' => 'El campo teléfono debe ser un número.',
            'phone.digits' => 'El campo teléfono debe contener 10 dígitos.',
            'phone.required' => 'El campo teléfono es obligatorio.',
            'email.required' => 'El campo correo electrónico es obligatorio.',
            'email.string' => 'El campo correo electrónico debe ser una cadena de texto.',
            'email.lowercase' => 'El campo correo electrónico debe estar en minúsculas.',
            'email.email' => 'El campo correo electrónico debe ser un correo válido.',
            'email.max' => 'El campo correo electrónico no puede contener más de 255 caracteres.',
            'email.unique' => 'El correo electrónico ya ha sido registrado.',
            'photo.mimes' => 'El archivo debe ser una imagen con formato jpeg, png o jpg.',
        ];
    }
}


