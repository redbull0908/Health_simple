<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class UserInfoRequest extends FormRequest
{
    public function rules():array{
        return [];
    }
    protected function prepareForValidation()
    {
        $a = ['-',' ','_'];
        $this->merge([
            'tel_number' => Str::replace($a,'',$this->tel_number)
        ]);
    }
}
