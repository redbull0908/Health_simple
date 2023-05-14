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

                        <div class="border-t border-gray-100 dark:border-gray-700 mt-8">
                            <div class="text-center">
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

            <div class="lg:w-3/4 md:w-2/3 md:px-3 mt-[30px] md:mt-0">
                <div class="p-6 rounded-md shadow dark:shadow-gray-800 bg-white dark:bg-slate-900">
                    @hasrole('user')
                    @if(!Auth::user()->full_name or !Auth::user()->birthday or !Auth::user()->sex)
                        <h5 class="p-0 text-lg error_message text-left">Заполните поля отмеченные звездочкой.</h5>
                    @endif
                    @endhasrole
                    @hasrole('user')
                    <h5 class="text-lg font-semibold mb-4">Изменить номер телефона :</h5>
                    <form method="post" action="{{route('change_phone_save')}}">
                        @csrf
                        <div>
                            <label class="form-label font-medium">Номер телефона :</label>
                            @if($errors->phone->has('tel_number'))
                                @foreach($errors->phone->get('tel_number') as $message)
                                    <p class="error_message">{{$message}}</p>
                                @endforeach
                            @endif
                            <div class="form-icon relative mt-2">
                                <i data-feather="mail" class="w-4 h-4 absolute top-3 left-4"></i>
                                <input type="text" class="form-input pl-12" placeholder="{{Auth::user()->tel_number}}" name="tel_number" required="">
                            </div>
                        </div>
                        <input type="submit" id="submit" class="btn bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md mt-5" value="Изменить">
                    </form>
                    @endhasrole
                    <h5 class="text-lg font-semibold mb-4 mt-6">Изменить информацию :</h5>
                    <form method="post" action="{{route('change_info_save')}}">
                        @csrf
                        <div class="grid lg:grid-cols-2 grid-cols-1 gap-5">
                            <div>
                                <label class="form-label font-medium">Фамилия : <span class="text-red-600">*</span></label>
                                @if($errors->info->has('surname'))
                                    @foreach($errors->info->get('surname') as $message)
                                        <p class="error_message">{{$message}}</p>
                                    @endforeach
                                @endif
                                <div class="form-icon relative mt-2">
                                    <i data-feather="user" class="w-4 h-4 absolute top-3 left-4"></i>
                                    <input type="text" class="form-input pl-12" placeholder="{{explode(' ', Auth::user()->full_name)[0]?? 'не указана'}}" id="firstname" name="surname" required="">
                                </div>
                            </div>
                            <div>
                                <label class="form-label font-medium">Имя : <span class="text-red-600">*</span></label>
                                @if($errors->info->has('name'))
                                    @foreach($errors->info->get('name') as $message)
                                        <p class="error_message">{{$message}}</p>
                                    @endforeach
                                @endif
                                <div class="form-icon relative mt-2">
                                    <i data-feather="user" class="w-4 h-4 absolute top-3 left-4"></i>
                                    <input type="text" class="form-input pl-12" placeholder="{{explode(' ', Auth::user()->full_name)[1]?? 'не указано'}}" id="lastname" name="name" required="">
                                </div>
                            </div>
                            <div>
                                <label class="form-label font-medium">Отчество : <span class="text-red-600">*</span></label>
                                @if($errors->info->has('second_name'))
                                    @foreach($errors->info->get('second_name') as $message)
                                        <p class="error_message">{{$message}}</p>
                                    @endforeach
                                @endif
                                <div class="form-icon relative mt-2">
                                    <i data-feather="user" class="w-4 h-4 absolute top-3 left-4"></i>
                                    <input type="text" class="form-input pl-12" placeholder="{{explode(' ', Auth::user()->full_name)[2]?? 'не указано'}}" id="lastname" name="second_name" required="">
                                </div>
                            </div>
                            <div>
                                <label class="form-label font-medium">Дата рождения :<span class="text-red-600">*</span></label>
                                @if($errors->info->has('date'))
                                    @foreach($errors->info->get('date') as $message)
                                        <p class="error_message">{{$message}}</p>
                                    @endforeach
                                @endif
                                <div class="form-icon relative mt-2">
                                    <i data-feather="gift" class="w-4 h-4 absolute top-3 left-4"></i>
                                    <input type="date" name="date" id="occupation" class="form-input pl-12" value="{{Auth::user()->birthday}}">
                                </div>
                            </div>
                            <div>
                                <label class="form-label font-medium">Пол :<span class="text-red-600">*</span></label>
                                @if($errors->info->has('sex'))
                                    @foreach($errors->info->get('sex') as $message)
                                        <p class="error_message">{{$message}}</p>
                                    @endforeach
                                @endif
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
                                        <div class="form-icon relative mt-2">
                                            <i data-feather="key" class="w-4 h-4 absolute top-3 left-4"></i>
                                            <input name="current_password" type="password" class="form-input pl-12" required="">
                                        </div>
                                    </div>

                                    <div>
                                        <label class="form-label font-medium">Новый пароль :</label>
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
