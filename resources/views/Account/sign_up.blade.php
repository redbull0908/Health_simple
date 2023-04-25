@extends('layouts.auth',['title'=>'Регистрация'])
@section('content')

<section class="md:h-screen py-36 flex items-center bg-[url('../../assets/images/cta.jpg')] bg-no-repeat bg-center">
    <div class="absolute inset-0 bg-gradient-to-b from-transparent to-black"></div>
    <div class="container">
        <div class="flex justify-center">
            <div class="max-w-[400px] h-fit h-auto m-auto p-6 bg-white shadow-md  rounded-md">
                <a href="{{route('main')}}"><img src="{{asset('image/icon/logo-icon-64.png')}}" class="mx-auto" alt=""></a>
                <h5 class="my-6 text-xl font-semibold">Регистрация</h5>
                <form method="post" action="{{route('save')}}" class="text-left">
                    @csrf
                    <div class="grid grid-cols-1">
                        <div class="mb-4">
                            <label class="font-semibold" for="login">Логин:</label>
                            @if($errors->has('login'))
                                <input name="login" id="login" type="text" class="form-input mt-3" placeholder="{{$errors->first('login')}}">
                            @else
                                <input name="login" id="login" type="text" class="form-input mt-3" placeholder="user275" value="{{old('login')}}">
                            @endif

                        </div>

                        <div class="mb-4">
                            <label class="font-semibold" for="tel_number">Номер телефона:</label>
                            @if($errors->has('tel_number'))
                                <input name="tel_number" id="tel_number" type="text" class="form-input mt-3" placeholder="{{$errors->first('tel_number')}}">
                            @else
                                <input name="tel_number" id="tel_number" type="text" class="form-input mt-3" placeholder="33 475 58 94" value="{{old('tel_number')}}">
                            @endif
                        </div>

                        <div class="mb-4">
                            <label class="font-semibold" for="password">Пароль:</label>
                            @if($errors->has('password'))
                                <input name="password" id="password" type="password" class="form-input mt-3" placeholder="{{$errors->first('password')}}">
                            @else
                                <input name="password" id="password" type="password" class="form-input mt-3" placeholder="Pass12G_445_ds">
                            @endif
                        </div>

                        <div class="mb-4">
                            <label class="font-semibold" for="password_confirmation">Потверждение пароля:</label>
                            <input name="password_confirmation" id="password_confirmation" type="password" class="form-input mt-3">
                        </div>

                        <div class="mb-4">
                            <input type="submit" class="btn bg-indigo-600 hover:bg-indigo-700 border-indigo-600 hover:border-indigo-700 text-white rounded-md w-full" value="Зарегистрироваться">
                        </div>

                        <div class="text-center">
                            <span class="text-slate-400 me-2">Есть аккаунт ? </span> <a href="{{route('login')}}" class="text-black dark:text-white font-bold">Войти</a>
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
