@extends('layouts.index' ,['title'=>$name])
@section('content')
    <div class="container">
        @foreach($services as $service)
            <div class="card">
                <div class="card-header">
                    {{$service->name}}
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm">
                        </div>
                        <div class="col-sm">
                            <p class="card-text">Цена : {{$service->price}} руб.</p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
