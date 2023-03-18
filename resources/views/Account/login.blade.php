@extends('layouts.index' ,['title'=>'Войти'])
@section('content')
    <div class="container">
        <form method="post" action="{{route('auth')}}">
            <div class="col-md-10 form_reg">
                @csrf
                <div class="input-group input-group-sm">
                    <span class="info col-sm-4 input-group-text">Логин</span>
                    <input name="login" class="form-control" value="{{old('login')}}"/>
                    @error('login')
                    <span class="form-control error">{{$message}}</span>
                    @enderror
                </div>
                <div class="input-group input-group-sm form-group mt-2">
                    <span class="info col-sm-4 input-group-text">Пароль</span>
                    <input type="password" name="Password" class="form-control"/>
                    <div class="icon_pas"></div>
                    @error('Password')
                        <span class="form-control error">{{$message}}</span>
                    @endif
                </div>
                <div class="input-group input-group-sm form-group mt-2">
                    <span class="info col-sm-4 input-group-text">Запомнить меня</span>
                    <input  value="true" id="remember" name="remember" type="checkbox"/>
                </div>
                <br/>
                <div class="form-group">
                    <input type="submit" value="Войти" class="btn btn-primary" />
                </div>
            </div>
        </form>
    </div>
    <script>
        let input_pas = document.getElementsByName('Password')[0];
        document.getElementsByClassName('icon_pas')[0].addEventListener('click',function(){
            if(input_pas.type == 'password'){
                input_pas.type = 'text';
            }
            else{
                input_pas.type = 'password';
            }
        });
    </script>
@endsection
