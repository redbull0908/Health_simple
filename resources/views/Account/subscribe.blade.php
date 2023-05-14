@extends('layouts.index',['title'=>"Записаться на прием"])
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

                                    <li class="navbar-item account-menu active">
                                        <a href="" class="navbar-link text-slate-400 flex items-center py-2 rounded">
                                            <span class="mr-2 text-[18px] mb-0"><i class="uil uil-ambulance"></i></span>
                                            <h6 class="mb-0 font-semibold">Записаться на прием</h6>
                                        </a>
                                    </li>

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
                @if(!Auth::user()->full_name or !Auth::user()->birthday or !Auth::user()->sex)
                    <div class="lg:w-3/4 md:w-2/3 md:px-3 mt-[30px] md:mt-0">
                        <span class="p-0 text-lg error_message text-left">Что бы записаться к врачу , укажите данные о себе в своем профиле.<a class="ml-2 text-indigo-600" href="{{route('change')}}">Указать</a> </span>
                    </div>
                @else
                    <div class="lg:w-3/4 md:w-2/3 md:px-3 mt-[30px] md:mt-0">
                        <div class="p-6 rounded-md shadow dark:shadow-gray-800 bg-white dark:bg-slate-900">
                            <h5 class="text-lg font-semibold mb-4 mt-6">Записаться на прием к врачу :</h5>
                            <form method="post" action="{{route('subscribe_save')}}">
                                @csrf
                                <div class="grid lg:grid-cols-2 grid-cols-1 gap-5">
                                    <div>
                                        <label class="form-label font-medium">Категория :</label>
                                        <div class="form-icon relative mt-2 mb-4">
                                            <i class="w-4 h-4 absolute top-2 left-4 uil uil-apps"></i>
                                            <select id="category" class="text-[13px] form-input pl-12" name="category">
                                                <option selected></option>
                                                @foreach($category as $cat)
                                                    <option id="{{$cat->url_name}}">{{$cat->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <label class="form-label font-medium">Услуга :</label>
                                        <div class="form-icon relative mt-2 mb-4">
                                            <i class="w-4 h-4 absolute top-2 left-4 uil uil-book"></i>
                                            <select id="services" class="text-[13px] form-input pl-12" name="service">
                                                <option selected></option>
                                            </select>
                                        </div>
                                        <label class="form-label font-medium">Доктор :</label>
                                        <div class="form-icon relative mt-2 mb-4">
                                            <i class="w-4 h-4 absolute top-2 left-4 uil uil-user-nurse"></i>
                                            <select id="doctors" class="text-[13px] form-input pl-12" name="doctor">
                                                <option selected></option>
                                            </select>
                                        </div>
                                        <label class="form-label font-medium">Дата :</label>
                                        <div class="form-icon relative mt-2 mb-4">
                                            <i class="w-4 h-4 absolute top-2 left-4 uil uil-calendar-alt"></i>
                                            <select id="date" class="form-input pl-12" name="date">
                                            </select>
                                        </div>
                                        <label class="form-label font-medium">Время :</label>
                                        <div class="form-icon relative mt-2 mb-4">
                                            <i class="w-4 h-4 absolute top-2 left-4 uil uil-hourglass"></i>
                                            <select id="time" class="form-input pl-12" name="time">
                                            </select>
                                        </div>
                                        @hasrole('user')
                                        <div>
                                            <input name="login" class="hidden" type="text" value="{{Auth::user()->login}}">
                                        </div>
                                        @endhasrole
                                    </div>
                                    <div id="doc_info" class="lg:-mx-auto">
                                        @if($doctors)
                                            @foreach($doctors as $doctor)
                                                <div id="doc_{{$doctor->id}}" class="hidden content lg:-mx-auto lg-text-center">
                                                    <h1 class="mb-4 leading-normal font-semibold">{{$doctor->full_name}}</h1>
                                                    <img src="{{asset('storage/'.$doctor->img)}}" class="h-[200px] rounded-3xl shadow-md dark:shadow-gray-800 lg:-mx-auto" alt="">
                                                    <span class="mt-2 text-slate-400 block">{{$doctor->specialization}}</span>
                                                    <p class="text-slate-400">Категория: {{$doctor->category}}</p>
                                                    <p class="text-slate-400 mb-4">Опыт работы: {{$doctor->experience}}</p>
                                                </div>
                                            @endforeach
                                        @endif
                                        @if($id)
                                            <div id="doc_id" class="hidden">{{$id}}</div>
                                            <div id="category_id" class="hidden">{{$url_category}}</div>
                                        @endif
                                    </div>
                                </div><!--end grid-->

                                <input type="submit" id="submit" class="btn bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md mt-5" value="Записаться">
                            </form><!--end form-->
                        </div>
                    </div>
                @endif
                @endhasrole


            </div><!--end grid-->
        </div><!--end container-->
    </section><!--end section-->
    <!-- End Hero -->
    @if($id)
        <script>
            let xhr = new XMLHttpRequest();
            let id = document.getElementById('doc_id').innerText;
            let category_id = document.getElementById('category_id').innerText;
            xhr.open('GET',location.origin+'/profile_services/?name='+category_id);
            xhr.send();
            xhr.onreadystatechange = function (){
                if(xhr.readyState === 4 && xhr.status === 200){
                    document.getElementById('services').innerHTML = xhr.responseText;
                    xhr.open('GET',location.origin+'/profile_doctors/?name='+category_id);
                    xhr.send();
                    xhr.onreadystatechange = function (){
                        if(xhr.readyState === 4 && xhr.status === 200){
                            document.getElementById('doctors').innerHTML = xhr.responseText;
                            let doctors = document.getElementById('doctors').children;
                            for (let doctor of doctors) {
                                if(doctor.id === id)
                                doctor.selected = true;
                            }
                            let categorys = document.getElementById('category').children;
                            for (let category of categorys) {
                                if(category.id === category_id)
                                    category.selected = true;
                            }
                            document.getElementById('doc_'+id).classList.remove('hidden');
                            xhr.open('GET',location.origin+'/profile_date/?id='+id);
                            xhr.send();
                            xhr.onreadystatechange = function (){
                                if(xhr.readyState === 4 && xhr.status === 200){
                                    document.getElementById('date').innerHTML = xhr.responseText;
                                }
                            }
                        }
                    }
                }
            }

        </script>
    @endif
    <script>
        //submit
        document.getElementById('submit').addEventListener('click',function (e){
            e.preventDefault();
            let category = document.getElementById('category');
            let doctors = document.getElementById('doctors');
            let service = document.getElementById('services');
            category.selectedOptions[0].value = category.selectedOptions[0].id;
            doctors.selectedOptions[0].value = doctors.selectedOptions[0].id;
            service.selectedOptions[0].value = service.selectedOptions[0].id;
            document.forms[1].requestSubmit();
        });
        //change service ajax
        document.getElementById('category').addEventListener('change',function (e){
            let servResponse = document.getElementById('services');
            let doctors = document.getElementById('doctors');
            if(e.target.selectedOptions[0].id){
                //clean
                document.getElementById('date').innerHTML = '<option selected></option>';
                document.getElementById('time').innerHTML = '<option selected></option>';
                let elements = document.getElementById('doc_info').children;
                for (let element of elements) {
                    element.classList.add('hidden');
                }
                //end clean
                let xhr = new XMLHttpRequest();
                xhr.open('GET',location.origin+'/profile_services/?name='+e.target.selectedOptions[0].id);
                xhr.send();
                xhr.onreadystatechange = function (){
                    if(xhr.readyState === 4 && xhr.status === 200){
                        servResponse.innerHTML = xhr.responseText;
                        xhr.open('GET',location.origin+'/profile_doctors/?name='+e.target.selectedOptions[0].id);
                        xhr.send();
                        xhr.onreadystatechange = function (){
                            if(xhr.readyState === 4 && xhr.status === 200){
                                doctors.innerHTML = xhr.responseText;
                            }
                        }
                    }
                }
            }
            else{
                //clean
                servResponse.innerHTML = '<option selected></option>';
                doctors.innerHTML = '<option selected></option>';
                document.getElementById('date').innerHTML = '<option selected></option>';
                document.getElementById('time').innerHTML = '<option selected></option>';
                let elements = document.getElementById('doc_info').children;
                for (let element of elements) {
                    element.classList.add('hidden');
                }
            }
        });

        //change doctors ajax
        document.getElementById('doctors').addEventListener('change',function (e){
            let date = document.getElementById('date');
            if(e.target.selectedOptions[0].id){
                document.getElementById('time').innerHTML = '<option selected></option>';
                let xhr = new XMLHttpRequest();
                xhr.open('GET',location.origin+'/profile_date/?id='+e.target.selectedOptions[0].id);
                xhr.send();
                xhr.onreadystatechange = function (){
                    if(xhr.readyState === 4 && xhr.status === 200){
                        date.innerHTML = xhr.responseText;
                        let elements = document.getElementById('doc_info').children;
                        for (let element of elements) {
                            element.classList.add('hidden');
                        }
                        document.getElementById('doc_'+e.target.selectedOptions[0].id).classList.remove('hidden');
                    }
                }
            }
            else{
                //clean
                date.innerHTML = '<option selected></option>';
                let elements = document.getElementById('doc_info').children;
                for (let element of elements) {
                    element.classList.add('hidden');
                }
            }
        });

        //change date ajax
        document.getElementById('date').addEventListener('change',function (e){
            let time = document.getElementById('time');
            if(e.target.selectedOptions[0].id){
                let xhr = new XMLHttpRequest();
                xhr.open('GET',location.origin+'/profile_time/?id='+e.target.selectedOptions[0].id + '&date='+ e.target.selectedOptions[0].value);
                xhr.send();
                xhr.onreadystatechange = function (){
                    if(xhr.readyState === 4 && xhr.status === 200){
                        time.innerHTML = xhr.responseText;
                    }
                }
            }
            else{
                time.innerHTML = '<option selected></option>';
            }
        });
    </script>
@endsection
