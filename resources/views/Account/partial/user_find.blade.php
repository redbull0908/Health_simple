<div  class="content lg-text-center flex flex-wrap md:mt-6">
    <div class="ml-8">
        @if($user->img)
            <img src="{{asset('storage/'.$user->img)}}"
                 class="h-[84px] rounded-3xl shadow-md dark:shadow-gray-800 lg:-mx-auto" alt="">
        @else
            <img src="{{asset('image/icon/user.png')}}"
                 class="h-[84px] rounded-3xl shadow-md dark:shadow-gray-800 lg:-mx-auto" alt="">
        @endif
    </div>
    <div class="m-auto">
        <h1 id="div_find_user" class="mb-4 leading-normal font-semibold">{{$user->full_name}}</h1>
        <span class="mt-2 text-slate-400 block">Номер телефона : +375 <span id="request_tel_user">{{$user->tel_number}}</span></span>
        <p class="text-slate-400">Дата рождения: {{\Carbon\Carbon::make($user->birthday)->format('d-m-Y')}}</p>
        <p class="text-slate-400 mb-4">Пол: {{$user->sex}}</p>
        <button id="submit_user"
                class="btn bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md mt-5">
            Выбрать
        </button>
    </div>
</div>
