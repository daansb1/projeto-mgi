<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ContaRequest extends FormRequest
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
            'name' => 'required|max:50|min:3',
            'email' => 'required|email',
            'password' => 'required|max:20|min:6',
            'confirm_password' => 'required|max:20|min:6|same:password',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Campo nome é obrigatório!',
            'name.max' => 'Campo nome deve conter no Máximo 50 caracteres!',
            'name.min' => 'Campo nome deve conter no Mínimo 3 caracteres!',
            'email.required' => 'Campo E-mail é obrigatório!',
            'email.email' => 'O campo de e-mail deve ser um endereço de e-mail válido.',
            'password.required' => 'Campo Senha é obrigatório!',
            'password.max' => 'Campo senha deve conter no Máximo 20 caracteres!',
            'password.min' => 'Campo senha deve conter no Mínimo 6 caracteres!',
            'confirm_password.max' => 'Campo Confirmar Senha deve conter no Máximo 20 caracteres!',
            'confirm_password.min' => 'Campo Confirmar Senha deve conter no Mínimo 6 caracteres!',
            'confirm_password.required' => 'Campo Confirmação de Senha é obrigatório!',
            'confirm_password.same' => 'Os campos confirmar senha e senha devem corresponder',
        ];

    }
}
