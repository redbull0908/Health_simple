<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserPasRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'Password'=>'required|confirmed|min:6',
            'current_Password'=>'required'
        ];
    }

    public function messages() : array
    {
        return [
            'Password.required'=>'Введите пароль.',
            'confirmed'=>"Пароли не совпадают.",
        ];
    }
}
