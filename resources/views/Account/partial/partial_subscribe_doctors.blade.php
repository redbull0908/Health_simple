<option selected></option>
@foreach($doctors as $doc)
    <option id="{{$doc->id}}">{{$doc->full_name}}</option>
@endforeach
