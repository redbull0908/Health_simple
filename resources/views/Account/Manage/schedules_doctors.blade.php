@extends('layouts.index',['title' => 'Рассписание врачей'])
@section('content')
    <!-- Start Hero -->
    <section class="relative table w-full py-36 bg_schedules bg-center bg-no-repeat">
        <div class="absolute inset-0 bg-black opacity-75"></div>
        <div class="container">
            <div class="grid grid-cols-1 pb-8 text-center mt-10">
                <h3 class="md:text-4xl text-3xl md:leading-normal tracking-wide leading-normal font-medium text-white">Рассписание врачей</h3>
            </div><!--end grid-->
        </div><!--end container-->
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
            <div class="p-6 rounded-md shadow dark:shadow-gray-800 bg-white dark:bg-slate-900">
                    <div class="grid lg:grid-cols-3 grid-cols-1 gap-5">
                        <div>
                            <h5 class="text-lg font-semibold mb-4">Просмотреть рассписание врачей :</h5>
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
                        </div>
                        <div id="doc_info" class="lg:-mx-auto">
                            @if($doctors)
                                @foreach($doctors as $doctor)
                                    <div id="doc_{{$doctor->id}}" class="hidden content lg-text-center">
                                        <h1 class="mb-4 leading-normal font-semibold">{{$doctor->full_name}}</h1>
                                        <img src="{{asset('storage/'.$doctor->img)}}" class="h-[200px] rounded-3xl shadow-md dark:shadow-gray-800 lg:-mx-auto" alt="">
                                        <span class="mt-2 text-slate-400 block">{{$doctor->specialization}}</span>
                                        <p class="text-slate-400">Категория: {{$doctor->category}}</p>
                                        <p class="text-slate-400 mb-4">Опыт работы: {{$doctor->experience}}</p>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                        <div>
                            <h5 id="time_list" class="hidden text-2xl mb-5">Доступное время записи :</h5>
                            <p id="schedule_info" class="flex flex-wrap text-indigo-600"></p>
                        </div>
                    </div><!--end grid-->
            </div>
        </div><!--end container-->
    </section><!--end section-->
    <!-- End Section-->
    <script>
        document.getElementById('doctors').addEventListener('change',function (e){
            let date = document.getElementById('date');
            if(e.target.selectedOptions[0].id){
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
                        document.getElementById('schedule_info').innerHTML='';
                        document.getElementById('time_list').classList.add('hidden');
                    }
                }
            }
            else{
                //clean
                date.innerHTML = '<option selected></option>';
                document.getElementById('schedule_info').innerHTML='';
                document.getElementById('time_list').classList.add('hidden');
                let elements = document.getElementById('doc_info').children;
                for (let element of elements) {
                    element.classList.add('hidden');
                }
            }
        });

        document.getElementById('date').addEventListener('change',function (e){
            let time = document.getElementById('schedule_info');
            if(e.target.selectedOptions[0].id){
                let xhr = new XMLHttpRequest();
                xhr.open('GET',location.origin+'/profile_time/?id='+e.target.selectedOptions[0].id + '&date='+ e.target.selectedOptions[0].value);
                xhr.send();
                xhr.onreadystatechange = function (){
                    if(xhr.readyState === 4 && xhr.status === 200){
                        time.innerHTML = xhr.responseText;
                        time.firstChild.remove();
                        document.getElementById('time_list').classList.remove('hidden');
                    }
                }
            }
            else{
                //clean
                time.innerHTML = '';
                let elements = document.getElementById('doc_info').children;
            }
        });

        document.getElementById('category').addEventListener('change',function (e){
            let doctors = document.getElementById('doctors');
            if(e.target.selectedOptions[0].id){
                //clean
                document.getElementById('date').innerHTML = '<option selected></option>';
                document.getElementById('schedule_info').innerHTML='';
                document.getElementById('time_list').classList.add('hidden');

                let elements = document.getElementById('doc_info').children;
                for (let element of elements) {
                    element.classList.add('hidden');
                }
                //end clean
                let xhr = new XMLHttpRequest();
                        xhr.open('GET',location.origin+'/profile_doctors/?name='+e.target.selectedOptions[0].id);
                        xhr.send();
                        xhr.onreadystatechange = function (){
                            if(xhr.readyState === 4 && xhr.status === 200){
                                doctors.innerHTML = xhr.responseText;
                            }
                        }

            }
            else{
                //clean
                doctors.innerHTML = '<option selected></option>';
                document.getElementById('date').innerHTML = '<option selected></option>';
                document.getElementById('schedule_info').innerHTML='';
                document.getElementById('time_list').classList.add('hidden');
                let elements = document.getElementById('doc_info').children;
                for (let element of elements) {
                    element.classList.add('hidden');
                }
            }
        });

    </script>
@endsection
