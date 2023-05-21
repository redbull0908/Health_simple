<option selected></option>
@if(!$dates)
    <option selected>Записей нет</option>
@else
    @foreach($dates as $date)
        <option id="{{$date->schedule_template_id}}">{{\Carbon\Carbon::make($date->date)->format('d-m-y') }}</option>
    @endforeach
@endif

