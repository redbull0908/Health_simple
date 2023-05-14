@extends('layouts.index',['title' => 'Мои записи'])
@section('content')
        <!-- Start Hero -->
        <section class="relative lg:pb-24 pb-16">
            <div class="container-fluid">
                <div class="profile-banner relative text-transparent">
                    <div class="relative shrink-0">
                        <img src="{{asset('image/bg/bg_profile.jpg')}}" class="h-80 w-full object-cover" alt="">
                        <div class="absolute inset-0 bg-black/70"></div>
                    </div>
                </div>
            </div><!--end container-->

            <div class="container lg:mt-24 mt-16">
                <div class="md:flex">
                    <div class="lg:w-1/4 md:w-1/3 md:px-3">
                        <div class="relative md:-mt-48 -mt-32">
                            <div class="p-6 rounded-md shadow dark:shadow-gray-800 bg-white dark:bg-slate-900">
                                <div class="profile-pic text-center mb-5">
                                    <form method="post" action="{{route('save_image')}}" enctype="multipart/form-data">
                                        @csrf
                                        <input id="pro-img" name="profile-image" type="file" class="hidden" onchange="loadFile(event)"/>
                                    </form>
                                    <div>
                                        <div class="relative mx-auto">
                                            @if(Auth::user()->img)
                                                <img src="{{Storage::url(Auth::user()->img)}}" class="mx-auto rounded-full shadow dark:shadow-gray-800 h-32 w-32" id="profile-image" alt="">
                                            @else
                                                <img src="{{asset('image/icon/user.png')}}" class="rounded-full shadow dark:shadow-gray-800 h-24 mx-auto" id="profile-image" alt="">
                                            @endif
                                            <label class="absolute inset-0 cursor-pointer" for="pro-img" title="Загрузить фото"></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="border-t border-gray-100 dark:border-gray-700">
                                    <div class="text-center">
                                        <h5 class="text-lg font-semibold">{{Auth::user()->full_name}}</h5>
                                        <p class="text-slate-400">+375{{Auth::user()->tel_number}}</p>
                                    </div>
                                    <ul class="list-none sidebar-nav mb-0 mt-3" id="navmenu-nav">
                                        <li class="navbar-item account-menu">
                                            <a href="{{route('profile')}}" class="navbar-link text-slate-400 flex items-center py-2 rounded">
                                                <span class="mr-2 text-[18px] mb-0"><i class="uil uil-dashboard"></i></span>
                                                <h6 class="mb-0 font-semibold">Профиль</h6>
                                            </a>
                                        </li>

                                        @can('subscribe')
                                            <li class="navbar-item account-menu">
                                                <a href="{{route('subscribe')}}" class="navbar-link text-slate-400 flex items-center py-2 rounded">
                                                    <span class="mr-2 text-[18px] mb-0"><i class="uil uil-ambulance"></i></span>
                                                    <h6 class="mb-0 font-semibold">Записаться на прием</h6>
                                                </a>
                                            </li>
                                        @endcan

                                        <li class="navbar-item account-menu">
                                            <a href="{{route('get_user_subscribe')}}" class="navbar-link text-slate-400 flex items-center py-2 rounded">
                                                <span class="mr-2 text-[18px] mb-0"><i class="uil uil-bell"></i></span>
                                                <h6 class="mb-0 font-semibold">Записи на прием</h6>
                                            </a>
                                        </li>

                                        <li class="navbar-item account-menu">
                                            <a href="{{route('change')}}" class="navbar-link text-slate-400 flex items-center py-2 rounded">
                                                <span class="mr-2 text-[18px] mb-0"><i class="uil uil-setting"></i></span>
                                                <h6 class="mb-0 font-semibold">Изменить</h6>
                                            </a>
                                        </li>

                                        <li class="navbar-item account-menu">
                                            <a href="{{route('logout')}}" class="navbar-link text-slate-400 flex items-center py-2 rounded">
                                                <span class="mr-2 text-[18px] mb-0"><i class="uil uil-power"></i></span>
                                                <h6 class="mb-0 font-semibold">Выйти</h6>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                        @hasrole('user')
                            <div class="lg:w-3/4 md:w-2/3 md:px-3 mt-[30px] md:mt-0">
                        <div id="accordion-collapse" data-accordion="collapse">

                            <div class="relative shadow dark:shadow-gray-800 rounded-md overflow-hidden mt-4">
                                <h2 class="text-base font-semibold" id="accordion-collapse-heading-2">
                                    <button type="button" class="flex justify-between items-center p-5 w-full font-medium text-left" data-accordion-target="#accordion-collapse-body-2" aria-expanded="false" aria-controls="accordion-collapse-body-2">
                                        <span>Архив записей</span>
                                        <svg data-accordion-icon class="w-4 h-4 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </h2>
                                @if($subs)
                                    <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
                                            <div class="container-fluid relative">
                                                <div class="grid grid-cols-1 mt-8">
                                                    <div class="relative overflow-x-auto block w-full bg-white dark:bg-slate-900 p-8">
                                                        <table class="w-full text-sm text-left">
                                                            <thead
                                                                class="text-lg">
                                                            <tr>
                                                                <th class="text-center border border-gray-100 dark:border-gray-700 py-6 min-w-[120px]">Дата</th>
                                                                <th class="text-center border border-gray-100 dark:border-gray-700 py-6 min-w-[200px]">Время</th>
                                                                <th class="text-center border border-gray-100 dark:border-gray-700 py-6 min-w-[200px]">Категория</th>
                                                                <th class="text-center border border-gray-100 dark:border-gray-700 py-6 min-w-[200px]">Услуга</th>
                                                                <th class="text-center border border-gray-100 dark:border-gray-700 py-6 min-w-[200px]">Цена</th>
                                                                <th class="text-center border border-gray-100 dark:border-gray-700 py-6 min-w-[200px]">Доктор</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($subs as $sub)
                                                            <tr>
                                                                <th class="text-center text-indigo-600 border border-gray-100 dark:border-gray-700 py-5">{{\Carbon\Carbon::make($sub->date)->format('d-m-Y')}}</th>
                                                                <td class="text-center text-indigo-600 border border-gray-100 dark:border-gray-700 py-5">{{$sub->time}}</td>
                                                                <td class="text-center text-indigo-600 border border-gray-100 dark:border-gray-700 py-5">{{$sub->category}}</td>
                                                                <td class="text-center text-indigo-600 border border-gray-100 dark:border-gray-700 py-5">{{$sub->service}}</td>
                                                                <td class="text-center text-indigo-600 border border-gray-100 dark:border-gray-700 py-5">{{$sub->price.' р.'}}</td>
                                                                <td class="p-3 border border-gray-100 dark:border-gray-700">
                                                                    <div class="flex items-center mb-3">
                                                                        <img src="{{asset('storage/'.$sub->img)}}" class="h-12 w-12 rounded-full shadow" alt="">
                                                                        <div class="ml-3">
                                                                            <h6 class="block font-medium text-lg">{{$sub->name}}</h6>
                                                                            <span class="text-slate-400">{{$sub->specialization}}</span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <!-- End -->
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                    </div>
                                @else
                                    <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
                                        <div class="p-5">
                                            <p class="text-slate-400 dark:text-gray-400">Пусто</p>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <div class="relative shadow dark:shadow-gray-800 rounded-md overflow-hidden mt-4">
                                <h2 class="text-base font-semibold" id="accordion-collapse-heading-3">
                                    <button type="button" class="flex justify-between items-center p-5 w-full font-medium text-left" data-accordion-target="#accordion-collapse-body-3" aria-expanded="false" aria-controls="accordion-collapse-body-3">
                                        <span>Активные записи</span>
                                        <svg data-accordion-icon class="w-4 h-4 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                        </svg>
                                    </button>
                                </h2>
                                @if($active_subs)
                                    <div id="accordion-collapse-body-3" class="hidden" aria-labelledby="accordion-collapse-heading-3">
                                        <div class="container-fluid relative">
                                            <div class="grid grid-cols-1 mt-8">
                                                <div class="relative overflow-x-auto block w-full bg-white dark:bg-slate-900 p-8">
                                                    <table class="w-full text-sm text-left">
                                                        <thead
                                                            class="text-lg">
                                                        <tr>
                                                            <th class="text-center border border-gray-100 dark:border-gray-700 py-6 min-w-[120px]">Дата</th>
                                                            <th class="text-center border border-gray-100 dark:border-gray-700 py-6 min-w-[200px]">Время</th>
                                                            <th class="text-center border border-gray-100 dark:border-gray-700 py-6 min-w-[200px]">Категория</th>
                                                            <th class="text-center border border-gray-100 dark:border-gray-700 py-6 min-w-[200px]">Услуга</th>
                                                            <th class="text-center border border-gray-100 dark:border-gray-700 py-6 min-w-[200px]">Цена</th>
                                                            <th class="text-center border border-gray-100 dark:border-gray-700 py-6 min-w-[200px]">Доктор</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($active_subs as $sub)
                                                            <tr>
                                                                <th class="text-center text-indigo-600 border border-gray-100 dark:border-gray-700 py-5">{{\Carbon\Carbon::make($sub->date)->format('d-m-Y')}}</th>
                                                                <td class="text-center text-indigo-600 border border-gray-100 dark:border-gray-700 py-5">{{$sub->time}}</td>
                                                                <td class="text-center text-indigo-600 border border-gray-100 dark:border-gray-700 py-5">{{$sub->category}}</td>
                                                                <td class="text-center text-indigo-600 border border-gray-100 dark:border-gray-700 py-5">{{$sub->service}}</td>
                                                                <td class="text-center text-indigo-600 border border-gray-100 dark:border-gray-700 py-5">{{$sub->price.' р.'}}</td>
                                                                <td class="p-3 border border-gray-100 dark:border-gray-700">
                                                                    <div class="flex items-center mb-3">
                                                                        <img src="{{asset('storage/'.$sub->img)}}" class="h-12 w-12 rounded-full shadow" alt="">
                                                                        <div class="ml-3">
                                                                            <h6 class="block font-medium text-lg">{{$sub->name}}</h6>
                                                                            <span class="text-slate-400">{{$sub->specialization}}</span>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            <!-- End -->
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                    </div>
                                @else
                                    <div id="accordion-collapse-body-3" class="hidden" aria-labelledby="accordion-collapse-heading-3">
                                        <div class="p-5">
                                            <p class="text-slate-400 dark:text-gray-400">Пусто</p>
                                        </div>
                                    </div>
                                @endif

                            </div>

                        </div>
                    </div>
                        @endhasrole
                </div><!--end grid-->
            </div><!--end container-->
        </section><!--end section-->
        <!-- End Hero -->
@endsection
