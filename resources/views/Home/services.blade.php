@extends('layouts.index' ,['title'=>'Услуги'])
@section('content')
<!-- Start Hero -->
<section class="relative table w-full py-36 lg:py-44 bg-[url('../../assets/images/services.jpg')] bg-no-repeat bg-center">
    <div class="absolute inset-0 bg-black opacity-75"></div>
    <div class="container">
        <div class="grid grid-cols-1 pb-8 text-center mt-10">
            <h3 class="mt-2 md:text-4xl text-3xl md:leading-normal leading-normal font-medium text-white">Услуги и цены</h3>
        </div><!--end grid-->
    </div><!--end container-->

    <div class="absolute text-center z-10 bottom-5 right-0 left-0 mx-3">
        <ul class="breadcrumb tracking-[0.5px] breadcrumb-light mb-0 inline-block">
            <li class="inline breadcrumb-item uppercase text-[13px] font-bold duration-500 ease-in-out text-white/50 hover:text-white"><a href="{{route('main')}}">health-simple</a></li>
            <li class="inline breadcrumb-item uppercase text-[13px] font-bold duration-500 ease-in-out text-white" aria-current="page">Services</li>
        </ul>
    </div>
</section><!--end section-->
<div class="relative">
    <div class="shape absolute right-0 sm:-bottom-px -bottom-[2px] left-0 overflow-hidden z-1 text-white dark:text-slate-900">
        <svg class="w-full h-auto" viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
        </svg>
    </div>
</div>
<!-- End Hero -->

<!-- Start Section-->
<section class="relative md:py-24 py-16">
    <div class="container">
        <div class="grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 gap-[30px]">
            @foreach($services as $service)
            <div class="p-6 hover:shadow-xl hover:shadow-gray-100 dark:hover:shadow-gray-800 transition duration-500 rounded-2xl mt-6 text-center">
                <div class="w-20 h-20 bg-indigo-600/5 text-indigo-600 rounded-xl text-3xl flex align-middle justify-center items-center shadow-sm dark:shadow-gray-800 mx-auto">
                    @switch($service->name)
                        @case('Онкология')
                            <i class="uil uil-atom"></i>
                            @break
                        @case('Офтальмология')
                            <i class="uil uil-eye"></i>
                            @break
                        @case('Урология')
                            <i class="uil uil-medkit"></i>
                            @break
                        @case('Гинекология')
                            <i class="uil uil-hospital"></i>
                            @break
                        @case('Лабораторная диагностика')
                            <i class="uil uil-syringe"></i>
                            @break
                        @case('Узи')
                            <i class="uil uil-microscope"></i>
                            @break
                    @endswitch
                </div>

                <div class="content mt-7">
                    <a href="{{route('service',['name'=>$service->url_name])}}" class="title h5 text-lg font-medium hover:text-indigo-600">{{$service->name}}</a>
                    <p class="text-slate-400 mt-3">{{$service->description}}</p>

                    <div class="mt-5">
                        <a href="{{route('service',['name'=>$service->url_name])}}" class="btn btn-link text-indigo-600 hover:text-indigo-600 after:bg-indigo-600 duration-500 ease-in-out">Цены <i class="uil uil-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div><!--end grid-->
    </div><!--end container-->
</section><!--end section-->
<!-- End Section-->
@endsection
