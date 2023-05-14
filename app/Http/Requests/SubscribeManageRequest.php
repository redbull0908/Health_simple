<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class SubscribeManageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules():array{
        return [
            'category'=>'required',
            'service'=>'required',
            'doctor'=>'required',
            'date'=>'required',
            'time'=>'required',
            'tel_number'=>['required','digits:9','regex:/^s*((33\\d{7})|(29\\d{7})|(44\\d{7}|)|(25\\d{7}))\\s*$/']
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
