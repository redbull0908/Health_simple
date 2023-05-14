<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class SubscribeRequest extends FormRequest
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
            'time'=>'required'
        ];
    }
    protected function prepareForValidation()
    {
        $this->merge([
            'date' => $this->date === null ? null : Carbon::make(implode('-', array_reverse(explode('-',$this->date))))->format('Y-m-d'),
            'time'=>$this->time === 'Запишитесь на другой день' ? null : $this->time
        ]);
    }
}
