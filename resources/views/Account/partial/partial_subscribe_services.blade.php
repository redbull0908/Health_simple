<option selected></option>
@foreach($services as $serv)
    <option id="{{$serv->id}}">{{$serv->name}}</option>
@endforeach
