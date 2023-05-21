<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ManageNewUser extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'login'=>['required','alpha_num',Rule::unique('users','login')],
            'surname'=>'required|alpha',
            'name'=>'required|alpha',
            'second_name'=>'required|alpha',
            'tel_number'=>['required','digits:9','regex:/^s*((33\\d{7})|(29\\d{7})|(44\\d{7}|)|(25\\d{7}))\\s*$/',Rule::unique('users','tel_number')],
            'date_born'=>['required','date','after:1903-01-01','before:2013-01-01'],
            'password'=>'required|min:6',
            'sex'=>['required',Rule::in('Мужской','Женский')]
        ];
    }

    public function messages() : array
    {
        return [
            'required'=>'Поле не заполнено.',
            'date'=>'Введите дату.',
            'date_born.before'=>'Введите дату',
            'date_born.after'=>'Введите дату',
            'min'=>'Пароль должен быть как минимум из 6 символов.',
            'digits'=>'Номер телефона состоит из 9 цифр.',
            'surname.alpha'=>'Фамилия может содержать только буквы.',
            'name.alpha'=>'Имя может содержать только буквы.',
            'second_name.alpha'=>'Отчество может содержать только буквы.',
            'login.alpha_num'=>'Логин может содержать только буквы и цифры.',
            'login.unique'=>'Логин занят другим пользователем.',
            'tel_number.regex'=>'Номер не белорусский',
            'tel_number.unique'=>'Такой номер телефона уже зарегистрирован.',
            'sex.in'=>'Недопустимое значение в поле ПОЛ'
        ];
    }

    protected function prepareForValidation()
    {
        $a = ['-',' ','_'];
        $this->merge([
            'date' => $this->date === null ? null : Carbon::make(implode('-', array_reverse(explode('-',$this->date))))->format('Y-m-d'),
            'time'=>$this->time === 'Запишитесь на другой день' ? null : $this->time,
            'tel_number' => Str::replace($a,'',$this->tel_number)
        ]);

    }
}
