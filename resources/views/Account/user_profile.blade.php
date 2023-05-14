@extends('layouts.index',['title'=>'Профиль пользователя'])
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

                        <div class="border-t border-gray-100 dark:border-gray-700 mt-5 text-center">
                            <div class="">
                                <h5 class="text-lg font-semibold">{{Auth::user()->full_name}}</h5>
                                @hasrole('user')
                                <p class="text-slate-400">+375{{Auth::user()->tel_number}}</p>
                                @endhasrole
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

                                    <li class="navbar-item account-menu">
                                        <a id="get_sub_link" href="{{route('get_user_subscribe')}}" class="navbar-link text-slate-400 flex items-center py-2 rounded">
                                            <span class="mr-2 text-[18px] mb-0"><i class="uil uil-bell"></i></span>
                                            <h6 class="mb-0 font-semibold">Записи на прием</h6>
                                        </a>
                                    </li>
                                @endcan
                                @can('doctor_subscribe')
                                    <li class="navbar-item account-menu">
                                        <a id="get_sub_link" href="{{route('get_doctor_subscribe')}}" class="navbar-link text-slate-400 flex items-center py-2 rounded">
                                            <span class="mr-2 text-[18px] mb-0"><i class="uil uil-bell"></i></span>
                                            <h6 class="mb-0 font-semibold">Записи на прием</h6>
                                        </a>
                                    </li>
                                @endcan

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

            <div class="lg:w-1/2 md:w-1/2 md:px-3 mt-[30px] md:mt-0">

                <div class="grid lg:grid-cols-2 grid-cols-1 gap-[30px] pt-6">
                    <div>
                        <h5 class="text-xl font-semibold">Информация :</h5>
                        <div class="mt-6">
                            @hasrole('user')
                            <div class="flex items-center">
                                <i data-feather="mail" class="fea icon-ex-md text-slate-400 mr-3"></i>
                                <div class="flex-1">
                                    <h6 class="text-indigo-600 dark:text-white font-medium mb-0">Номер телефона</h6>
                                    <p class="text-slate-400">{{'+375'.Auth::user()->tel_number}}</p>
                                </div>
                            </div>
                            @endhasrole
                            @if(Auth::user()->full_name)
                            <div class="flex items-center mt-3">
                                <i data-feather="info" class="fea icon-ex-md text-slate-400 mr-3"></i>
                                <div class="flex-1">
                                    <h6 class="text-indigo-600 dark:text-white font-medium mb-0">ФИО :</h6>
                                    <p class="text-slate-400">{{Auth::user()->full_name}}</p>
                                </div>
                            </div>
                            @endif
                            @if(Auth::user()->birthday)
                            <div class="flex items-center mt-3">
                                <i data-feather="gift" class="fea icon-ex-md text-slate-400 mr-3"></i>
                                <div class="flex-1">
                                    <h6 class="text-indigo-600 dark:text-white font-medium mb-0">Дата рождения :</h6>
                                    <p class="text-slate-400 mb-0">{{Auth::user()->birthday}}</p>
                                </div>
                            </div>
                            @endif
                            @if(Auth::user()->sex)
                            <div class="flex items-center mt-3">
                                <i data-feather="user" class="fea icon-ex-md text-slate-400 mr-3"></i>
                                <div class="flex-1">
                                    <h6 class="text-indigo-600 dark:text-white font-medium mb-0">Пол :</h6>
                                    <p class="text-slate-400 mb-0">{{Auth::user()->sex}}</p>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
            </div>
        </div><!--end grid-->
    </div><!--end container-->
    </div>
</section><!--end section-->
<!-- End Hero -->
@endsection
