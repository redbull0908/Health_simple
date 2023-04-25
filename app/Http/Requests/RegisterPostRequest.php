<?php

namespace App\Http\Requests;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

use Illuminate\Foundation\Http\FormRequest;

class RegisterPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'login'=>['required','alpha_num',Rule::unique('users','login')],
//            'surname'=>'required|alpha',
//            'name'=>'required|alpha',
//            'second_name'=>'required|alpha',
            'tel_number'=>['required','digits:9','regex:/^s*((33\\d{7})|(29\\d{7})|(44\\d{7}|)|(25\\d{7}))\\s*$/',Rule::unique('users','tel_number')],
//            'date'=>'required|date',
//            'sex'=>'required',
            'password'=>'required|confirmed|min:6',
        ];
    }

    public function messages() : array
    {
        return [
            'required'=>'Поле не заполнено.',
//            'date'=>'Введите дату.',
            'min'=>'Пароль должен быть как минимум из 6 символов.',
            'confirmed'=>"Пароли не совпадают.",
            'digits'=>'Номер телефона состоит из 9 цифр.',
//            'surname.alpha'=>'Фамилия может содержать только буквы.',
//            'name.alpha'=>'Имя может содержать только буквы.',
//            'second_name.alpha'=>'Отчество может содержать только буквы.',
            'login.alpha_num'=>'Логин может содержать только буквы и цифры.',
            'login.unique'=>'Логин занят другим пользователем.',
            'tel_number.regex'=>'Номер не белорусский',
            'tel_number.unique'=>'Такой номер телефона уже зарегистрирован.'
        ];
    }

    protected function prepareForValidation()
    {
        $a = ['-',' ','_'];
        $this->merge([
            'tel_number' => Str::replace($a,'',$this->tel_number)
        ]);
    }
}
