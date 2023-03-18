@extends('layouts.index' ,['title'=>'Наши специалисты'])
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between flex-wrap">
            @foreach($doctors as $doc)
{{--                <div class="card">--}}
{{--                    <div class="card-header">--}}
{{--                        {{$doc->full_name}}--}}
{{--                    </div>--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-sm">--}}
{{--                                <img id="doc_img" src="{{'./image/doctors/'.$doc->img}}" alt="not found"/>--}}
{{--                            </div>--}}
{{--                            <div class="col-sm">--}}
{{--                                <p class="card-text">{{$doc->description}}</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

                <div class="card mt-5" style="width: 18rem;">
                    <div class="card-header" id="logo">
                        {{$doc->full_name}}
                    </div>
                    <div class="card-body">
                        <img id="doctor_img" src="{{'./image/doctors/'.$doc->img}}" class="card-img profile_img" alt="not found">
                        <p class="card-text mt-3">{{$doc->description}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
