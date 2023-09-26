<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'phone' => 'required|string|size:13',
            'password' => 'required|string|min:8|max:32',
            'password_confirmation' => 'required|same:password'
        ];
    }

    public function messages()
    {
        return [
            'name' => 'Nome inválido',
            'name.required' => 'Nome é necessário',
            'email.email' => 'Digite um endereço de email valido.',
            'email.required' => 'Email é necessário.',
            'phone.required' => 'Telefone é necessário.',
            'phone.size' => 'Digite um telefone válido.',
            'password.required' => 'Senha é necessária.',
            'password.min' => 'Mínimo de 8 caracteres.',
            'password.max' => 'Máximo de 32 caracteres.',
            'password_confirmation.required' => 'Confirmação é necessária.',
            'password_confirmation.same' => 'As senhas são diferentes.',
        ];
    }
}
