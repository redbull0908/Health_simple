<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserInfoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'surname'=>'required|alpha',
            'name'=>'required|alpha',
            'second_name'=>'required|alpha',
            'tel_number'=>['required','digits:9','regex:/^s*((33\\d{7})|(29\\d{7})|(44\\d{7}|)|(25\\d{7}))\\s*$/'],
            'date'=>'required|date',
            'sex'=>'required',
            'phone_number'=>Rule::unique('users','tel_number')
        ];
    }

    public function messages() : array
    {
        return [
            'surname.required'=>'Фамилия не заполнена.',
            'name.required'=>'Имя не заполнено.',
            'second_name.required'=>'Отчество не заполнено.',
            'sex.required'=>'Пол не выбран.',
            'tel_number.required'=>'Введите номер телефона.',
            'date'=>'Введите дату.',
            'min'=>'Пароль должен быть как минимум из 6 символов.',
            'confirmed'=>"Пароли не совпадают.",
            'digits'=>'Номер телефона состоит из 9 цифр.',
            'surname.alpha'=>'Фамилия может содержать только буквы.',
            'name.alpha'=>'Имя может содержать только буквы.',
            'second_name.alpha'=>'Отчество может содержать только буквы.',
            'phone_number.regex'=>'Введите номер телефона белорусских операторов.',
            'phone_number.unique'=>'Такой номер телефона уже зарегистрирован.'
        ];
    }
}
