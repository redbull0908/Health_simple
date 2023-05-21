@extends('layouts.index',['title' => 'Запись пациента'])
@section('content')
    <!-- Start Hero -->
    <section class="relative table w-full py-36 bg_manage_register bg-center bg-no-repeat">
        <div class="absolute inset-0 bg-black opacity-75"></div>
        <div class="container">
            <div class="grid grid-cols-1 pb-8 text-center mt-10">
                <h3 class="md:text-4xl text-3xl md:leading-normal tracking-wide leading-normal font-medium text-white">
                    Запись нового пациента на прием</h3>
            </div><!--end grid-->
        </div><!--end container-->
    </section><!--end section-->
    <div class="relative">
        <div
            class="shape absolute right-0 sm:-bottom-px -bottom-[2px] left-0 overflow-hidden z-1 text-white dark:text-slate-900">
            <svg class="w-full h-auto" viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
            </svg>
        </div>
    </div>
    <!-- End Hero -->

    <!-- Start Section-->
    <section class="relative md:py-24 py-16">
        <div id="content" class="container">
            <div id="subscribe" class="p-6 rounded-md shadow dark:shadow-gray-800 bg-white dark:bg-slate-900">
                <div id="user_info" class="lg:-mx-auto">
                    @if(Session::has('fail'))
                        <div class="text-center text-5xl error_message">{{Session::get('fail')}}</div>
                    @endif
                    @if(Session::has('success'))
                        <div class="text-white/80 text-center text-5xl bg-green-600">{{Session::get('success')}}</div>
                    @endif
                </div>
                <form method="post" action="{{route('manage_save_new_user')}}">
                    @csrf
                    <div class="grid lg:grid-cols-3 grid-cols-1 gap-5 mx-auto">
                        <div>
                            <h5 class="text-lg font-semibold mb-4 mt-6">Записать пациента на прием к врачу :</h5>
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
                                        <img src="{{asset('storage/'.$doctor->img)}}"
                                             class="h-[200px] rounded-3xl shadow-md dark:shadow-gray-800 lg:-mx-auto"
                                             alt="">
                                        <span class="mt-2 text-slate-400 block">{{$doctor->specialization}}</span>
                                        <p class="text-slate-400">Категория: {{$doctor->category}}</p>
                                        <p class="text-slate-400 mb-4">Опыт работы: {{$doctor->experience}}</p>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div>
                            <h5 class="text-lg font-semibold mb-4 mt-6">Регистрация нового пациента</h5>

                            <div class="lg:col-span-6 mb-5">
                                <div class="ltr:text-left rtl:text-right">
                                    <label for="login" class="font-semibold">Логин :</label>
                                    <div class="form-icon relative mt-2">
                                        <input name="login" id="login" type="text" class="form-input ps-11"
                                               placeholder="user234" required>
                                    </div>
                                </div>
                            </div>

                            <div class="lg:col-span-6 mb-5">
                                <div class="ltr:text-left rtl:text-right">
                                    <label for="surname" class="font-semibold">Фамилия :</label>
                                    <div class="form-icon relative mt-2">
                                        <input name="surname" id="surname" type="text" class="form-input ps-11"
                                               placeholder="Иванов" required>
                                    </div>
                                </div>
                            </div>

                            <div class="lg:col-span-6 mb-5">
                                <div class="ltr:text-left rtl:text-right">
                                    <label for="name" class="font-semibold">Имя :</label>
                                    <div class="form-icon relative mt-2">
                                        <input name="name" id="name" type="text" class="form-input ps-11"
                                               placeholder="Имя" required>
                                    </div>
                                </div>
                            </div>

                            <div class="lg:col-span-6 mb-5">
                                <div class="ltr:text-left rtl:text-right">
                                    <label for="second_name" class="font-semibold">Отчество :</label>
                                    <div class="form-icon relative mt-2">
                                        <input name="second_name" id="second_name" type="text" class="form-input ps-11"
                                               placeholder="Отчество" required>
                                    </div>
                                </div>
                            </div>

                            <div class="lg:col-span-6 mb-5">
                                <div class="ltr:text-left rtl:text-right">
                                    <label for="tel_number" class="font-semibold">Номер телефона :</label>
                                    <div class="form-icon relative mt-2">
                                        <input name="tel_number" id="tel_number" type="text" class="form-input ps-11"
                                               placeholder="44 456 23 64" required>
                                    </div>
                                </div>
                            </div>

                            <div class="lg:col-span-6 mb-5">
                                <div class="ltr:text-left rtl:text-right">
                                    <label for="date_born" class="font-semibold">Дата рождения :</label>
                                    <div class="form-icon relative mt-2">
                                        <input name="date_born" id="date_born" type="date" class="form-input ps-11"
                                               max="2013-01-01"
                                               placeholder="Отчество" required>
                                    </div>
                                </div>
                            </div>

                            <div class="lg:col-span-6 mb-5">
                                <div class="ltr:text-left rtl:text-right">
                                    <label for="sex" class="font-semibold">Пол :</label>
                                    <div class="form-icon relative mt-2">
                                        <select name="sex" id="sex" class="form-input ps-11" required>
                                            <option value="{{null}}" selected>Не выбран</option>
                                            <option value="Мужской">Мужской</option>
                                            <option value="Женский">Женский</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="lg:col-span-6 mb-5">
                                <div class="ltr:text-left rtl:text-right">
                                    <label for="password" class="font-semibold">Пароль :</label>
                                    <div class="form-icon relative mt-2">
                                        <input name="password" id="password" type="password" class="form-input ps-11"
                                               required
                                               placeholder="****">
                                        <i id="key"
                                           class="w-4 h-4 cursor-pointer absolute top-2 right-4 uil uil-keyboard-hide"
                                           title="показать | скрыть пароль"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!--end grid-->
                    <input type="submit" id="submit"
                           class="lg:ml-auto lg:w-2/5 btn bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md mt-5"
                           value="Записаться">
                </form><!--end form-->
                @foreach ($errors->all() as $message)
                    <div class="mt-6 text-left">
                        <span class="error_message">{{$message}}</span>
                    </div>
                @endforeach
            </div>
        </div><!--end container-->
    </section><!--end section-->
    <!-- End Section-->
    <script>
        //submit
        document.getElementById('submit').addEventListener('click', function (e) {
            e.preventDefault();
            let category = document.getElementById('category');
            let doctors = document.getElementById('doctors');
            let service = document.getElementById('services');
            category.selectedOptions[0].value = category.selectedOptions[0].id;
            doctors.selectedOptions[0].value = doctors.selectedOptions[0].id;
            service.selectedOptions[0].value = service.selectedOptions[0].id;
            document.forms[0].requestSubmit();
        });

        document.getElementById('key').addEventListener('click', function (e) {
            let password = document.getElementById('password');
            if (password.type === 'password') {
                password.type = 'text';
                e.target.classList.remove('uil-keyboard-hide');
                e.target.classList.add('uil-keyboard-show');
            } else {
                password.type = 'password';
                e.target.classList.remove('uil-keyboard-show');
                e.target.classList.add('uil-keyboard-hide');
            }
        });

        //change service ajax
        document.getElementById('category').addEventListener('change', function (e) {
            let servResponse = document.getElementById('services');
            let doctors = document.getElementById('doctors');
            if (e.target.selectedOptions[0].id) {
                //clean
                document.getElementById('date').innerHTML = '<option selected></option>';
                document.getElementById('time').innerHTML = '<option selected></option>';
                let elements = document.getElementById('doc_info').children;
                for (let element of elements) {
                    element.classList.add('hidden');
                }
                //end clean
                let xhr = new XMLHttpRequest();
                xhr.open('GET', location.origin + '/profile_services/?name=' + e.target.selectedOptions[0].id);
                xhr.send();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        servResponse.innerHTML = xhr.responseText;
                        xhr.open('GET', location.origin + '/profile_doctors/?name=' + e.target.selectedOptions[0].id);
                        xhr.send();
                        xhr.onreadystatechange = function () {
                            if (xhr.readyState === 4 && xhr.status === 200) {
                                doctors.innerHTML = xhr.responseText;
                            }
                        }
                    }
                }
            } else {
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
        document.getElementById('doctors').addEventListener('change', function (e) {
            let date = document.getElementById('date');
            if (e.target.selectedOptions[0].id) {
                document.getElementById('time').innerHTML = '<option selected></option>';
                let xhr = new XMLHttpRequest();
                xhr.open('GET', location.origin + '/profile_date/?id=' + e.target.selectedOptions[0].id);
                xhr.send();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        date.innerHTML = xhr.responseText;
                        let elements = document.getElementById('doc_info').children;
                        for (let element of elements) {
                            element.classList.add('hidden');
                        }
                        document.getElementById('doc_' + e.target.selectedOptions[0].id).classList.remove('hidden');
                    }
                }
            } else {
                //clean
                date.innerHTML = '<option selected></option>';
                let elements = document.getElementById('doc_info').children;
                for (let element of elements) {
                    element.classList.add('hidden');
                }
            }
        });

        //change date ajax
        document.getElementById('date').addEventListener('change', function (e) {
            let time = document.getElementById('time');
            if (e.target.selectedOptions[0].id) {
                let xhr = new XMLHttpRequest();
                xhr.open('GET', location.origin + '/profile_time/?id=' + e.target.selectedOptions[0].id + '&date=' + e.target.selectedOptions[0].value);
                xhr.send();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        time.innerHTML = xhr.responseText;
                    }
                }
            } else {
                time.innerHTML = '<option selected></option>';
            }
        });
    </script>
@endsection
