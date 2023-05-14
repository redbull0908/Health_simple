<option selected></option>
@foreach($dates as $date)
    <option id="{{$date->schedule_template_id}}">{{\Carbon\Carbon::make($date->date)->format('d-m-y') }}</option>
@endforeach
