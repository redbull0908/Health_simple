@extends('layouts.auth' ,['title'=>'Войти'])
@section('content')
<section class="md:h-screen py-36 flex items-center bg-[url('../../assets/images/cta.jpg')] bg-no-repeat bg-center">
    <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black"></div>
    <div class="container">
        <div class="flex justify-center">
            <div class="max-w-[400px] w-full m-auto p-6 bg-white rounded-md">
                <a href="{{route('main')}}"><img src="{{asset('image/icon/logo-icon-64.png')}}" class="mx-auto" alt=""></a>
                <h5 class="my-6 text-xl font-semibold">Войти</h5>
                <form method="post" action="{{route('auth')}}" class="text-left">
                    <div class="grid grid-cols-1">
                        @csrf
                        <div class="mb-4">
                            <label class="font-semibold" for="login">Логин:</label>
                            @error('login')
                            <p class="text-slate-400 text-red-600 mb-0">{{$message}}</p>
                            @enderror
                            <input name="login" id="login" class="form-input mt-3" placeholder="user275" value="{{old('login')}}" >
                        </div>

                        <div class="mb-4">
                            <label class="font-semibold" for="password">Пароль:</label>
                            @error('password')
                            <p class="text-slate-400 text-red-600 mb-0">{{$message}}</p>
                            @enderror
                            <input name="password" id="password" type="password" class="form-input mt-3" placeholder="Pass12G_445_ds">
                        </div>

                        <div class="flex justify-between mb-4">
                            <div class="form-checkbox flex items-center mb-0">
                                <input name="remember" class="mr-2 border border-inherit w-[14px] h-[14px]" type="checkbox" value="true" id="remember">
                                <label class="text-slate-400" for="remember">Запомнить меня</label>
                            </div>
{{--                            <p class="text-slate-400 mb-0"><a href="auth-re-password.html" class="text-slate-400">Forgot password ?</a></p>--}}
                        </div>

                        <div class="mb-4">
                            <input formaction="" type="submit" class="btn bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md w-full" value="Войти">
                        </div>

                        <div class="text-center">
                            <span class="text-slate-400 me-2">Нет аккаунта ?</span> <a href="{{route('register')}}" class="text-black dark:text-white font-bold">Зарегистрироваться</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section><!--end section -->

<div class="fixed bottom-3 right-3">
    <a href="{{redirect()->back()}}" class="back-button btn btn-icon bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-full"><i data-feather="arrow-left" class="h-4 w-4"></i></a>
</div>
@endsection
