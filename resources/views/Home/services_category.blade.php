@extends('layouts.index' ,['title'=>'Услуги'])
@section('content')
<div class="container">

    <div class="d-flex flex-wrap">

    @foreach($services_category as $category)
{{--        <div class="card">--}}
{{--            <div class="card-header" id="logo">--}}
{{--                {{$category->name}}--}}
{{--            </div>--}}
{{--            <div class="card-body">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-sm">--}}
{{--                        <img id="category_img" src="{{'./image/category/'.$category->img}}" alt="not found">--}}
{{--                    </div>--}}
{{--                    <div id="sub_category" class="col-sm">--}}
{{--                        <p class="card-text">{{$category->description}}</p>--}}
{{--                        <a class="btn btn-light" href="{{route('service',['id'=> $category->id])}}">Подробнее</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}


            <div class="card me-4 d-flex" style="width: 18rem;">
                <div class="card-header" id="logo">
                    {{$category->name}}
                </div>
                <div class="card-body" id="card_category">
                    <img src="{{asset('storage').'/'.($category->img ?? 'uploads/image/no_icon.png')}}" class="card-img" alt="not found">
                    <p class="card-text mt-3">{{$category->description}}</p>
                    <div class="row">
                        <a class="btn btn-primary" href="{{route('service',['id'=> $category->id])}}">Подробнее</a>
                    </div>
                </div>
            </div>
    @endforeach
    </div>
</div>
@endsection

