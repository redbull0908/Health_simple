@extends('layouts.index' ,['title'=>'Наши специалисты'])
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between flex-wrap">
            @foreach($doctors as $doc)

                <div class="card mt-5" style="width: 18rem;">
                    <div class="card-header" id="logo">
                        {{$doc->full_name}}
                    </div>
                    <div class="card-body">
                        <img id="doctor_img" src="{{asset('storage').'/'.($doc->img ?? 'uploads/image/no_icon.png')}}" class="card-img profile_img" alt="not found">
                        <p class="card-text mt-3">{{$doc->description}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
