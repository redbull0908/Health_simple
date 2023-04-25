@extends('layouts.index',['title'=>"Изменить профиль"])
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
                                <div class="relative h-28 w-28 mx-auto">
                                    @if(Auth::user()->img)
                                        <img src="{{asset('storage/'.Auth::user()->img)}}" class="rounded-full shadow dark:shadow-gray-800 ring-4 ring-slate-50 dark:ring-slate-800" id="profile-image" alt="">
                                    @else
                                        <img src="{{asset('image/icon/user.png')}}" class="rounded-full shadow dark:shadow-gray-800 ring-4 ring-slate-50 dark:ring-slate-800" id="profile-image" alt="">
                                    @endif
                                    <label class="absolute inset-0 cursor-pointer" for="pro-img"></label>
                                </div>
                                <div class="mt-10">
                                    <h5 class="text-lg font-semibold">{{Auth::user()->full_name}}</h5>
                                    <p class="text-slate-400">+375{{Auth::user()->tel_number}}</p>
                                </div>
                            </div>
                        </div>

                        <div class="border-t border-gray-100 dark:border-gray-700">
                            <ul class="list-none sidebar-nav mb-0 mt-3" id="navmenu-nav">
                                <li class="navbar-item account-menu">
                                    <a href="{{route('profile')}}" class="navbar-link text-slate-400 flex items-center py-2 rounded">
                                        <span class="mr-2 text-[18px] mb-0"><i class="uil uil-dashboard"></i></span>
                                        <h6 class="mb-0 font-semibold">Профиль</h6>
                                    </a>
                                </li>


                                <li class="navbar-item account-menu">
                                    <a href="#" class="navbar-link text-slate-400 flex items-center py-2 rounded">
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

            <div class="lg:w-3/4 md:w-2/3 md:px-3 mt-[30px] md:mt-0">
                <div class="p-6 rounded-md shadow dark:shadow-gray-800 bg-white dark:bg-slate-900">
                    <h5 class="text-lg font-semibold mb-4">Информация :</h5>
                    <form method="post" action="{{route('change_info_save')}}">
                        @csrf
                        <div class="grid lg:grid-cols-2 grid-cols-1 gap-5">
                            <div>
                                <label class="form-label font-medium">Фамилия : <span class="text-red-600">*</span></label>
                                <div class="form-icon relative mt-2">
                                    <i data-feather="user" class="w-4 h-4 absolute top-3 left-4"></i>
                                    <input type="text" class="form-input pl-12" placeholder="{{Auth::user()->full_name ? explode(' ', Auth::user()->full_name)[0] : 'не указана'}}" id="firstname" name="surname" required="">
                                </div>
                            </div>
                            <div>
                                <label class="form-label font-medium">Имя : <span class="text-red-600">*</span></label>
                                <div class="form-icon relative mt-2">
                                    <i data-feather="user" class="w-4 h-4 absolute top-3 left-4"></i>
                                    <input type="text" class="form-input pl-12" placeholder="{{Auth::user()->full_name ? explode(' ', Auth::user()->full_name)[1] : 'не указано'}}" id="lastname" name="name" required="">
                                </div>
                            </div>
                            <div>
                                <label class="form-label font-medium">Отчество : <span class="text-red-600">*</span></label>
                                <div class="form-icon relative mt-2">
                                    <i data-feather="user" class="w-4 h-4 absolute top-3 left-4"></i>
                                    <input type="text" class="form-input pl-12" placeholder="{{Auth::user()->full_name ? explode(' ', Auth::user()->full_name)[2] : 'не указано'}}" id="lastname" name="second_name" required="">
                                </div>
                            </div>
                            <div>
                                <label class="form-label font-medium">Номер телефона : <span class="text-red-600">*</span></label>
                                <div class="form-icon relative mt-2">
                                    <i data-feather="mail" class="w-4 h-4 absolute top-3 left-4"></i>
                                    <input type="text" class="form-input pl-12" placeholder="{{Auth::user()->tel_number}}" name="tel_number" required="">
                                </div>
                            </div>
                            <div>
                                <label class="form-label font-medium">Дата рождения :<span class="text-red-600">*</span></label>
                                <div class="form-icon relative mt-2">
                                    <i data-feather="gift" class="w-4 h-4 absolute top-3 left-4"></i>
                                    <input type="date" name="date" id="occupation" class="form-input pl-12" value="{{Auth::user()->birthday}}">
                                </div>
                            </div>
                            <div>
                                <label class="form-label font-medium">Пол :<span class="text-red-600">*</span></label>
                                <div class="form-icon relative mt-2">
                                    <i data-feather="user" class="w-4 h-4 absolute top-3 left-4"></i>
                                    <select class="form-input pl-12" name="sex">
                                        @if(!Auth::user()->sex)
                                            <option selected></option>
                                            <option>Мужской</option>
                                            <option>Женский</option>
                                        @else
                                            @if(Auth::user()->sex == 'Мужской')
                                            <option selected>Мужской</option>
                                            <option>Женский</option>
                                            @else
                                                <option>Мужской</option>
                                                <option selected>Женский</option>
                                            @endif
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div><!--end grid-->

                        <input type="submit" id="submit" class="btn bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md mt-5" value="Изменить">
                    </form><!--end form-->
                </div>

                <div class="p-6 rounded-md shadow dark:shadow-gray-800 bg-white dark:bg-slate-900 mt-[30px]">
                    <div class="grid lg:grid-cols-2 grid-cols-1 gap-5">
                        <div>
                            <h5 class="text-lg font-semibold mb-4">Изменить пароль :</h5>
                            <form method="post" action="{{route('change_pas_save')}}">
                                @csrf
                                <div class="grid grid-cols-1 gap-5">
                                    <div>
                                        <label class="form-label font-medium">Старый пароль :</label>
{{--                                        @if($errors->pass->has('current_password'))--}}
{{--                                            <p class="error_message">{{$errors->pass->get('current_password')[0]}}</p>--}}
{{--                                        @endif--}}
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="key" class="w-4 h-4 absolute top-3 left-4"></i>
                                            <input name="current_password" type="password" class="form-input pl-12" required="">
                                        </div>
                                    </div>

                                    <div>
                                        <label class="form-label font-medium">Новый пароль :</label>
{{--                                        @if($errors->pass->has('password'))--}}
{{--                                           @foreach($errors->pass->get('password') as $message)--}}
{{--                                                <p class="error_message">{{$message}}</p>--}}
{{--                                           @endforeach--}}
{{--                                        @endif--}}
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="key" class="w-4 h-4 absolute top-3 left-4"></i>
                                            <input name="password" type="password" class="form-input pl-12" required="">
                                        </div>
                                    </div>

                                    <div>
                                        <label class="form-label font-medium">Повторить новый пароль :</label>
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="key" class="w-4 h-4 absolute top-3 left-4"></i>
                                            <input name="password_confirmation" type="password" class="form-input pl-12" required="">
                                        </div>
                                    </div>
                                </div><!--end grid-->

                                <input type="submit" id="submit" class="btn bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md mt-5" value="Изменить пароль">
                            </form>
                        </div><!--end col-->
                        <div class="ml-4">
                            @if($errors->pass->has('current_password'))
                                <p class="error_message">{{$errors->pass->get('current_password')[0]}}</p>
                            @endif
                            @if($errors->pass->has('password'))
                                @foreach($errors->pass->get('password') as $message)
                                    <p class="error_message">{{$message}}</p>
                                @endforeach
                            @endif
                        </div>
                    </div><!--end row-->
                </div>
            </div>
        </div><!--end grid-->
    </div><!--end container-->
</section><!--end section-->
<!-- End Hero -->
@endsection