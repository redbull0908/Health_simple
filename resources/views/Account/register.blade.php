@extends('layouts.index' ,['title'=>'Регистрация'])
@section('content')
    <div class="container">
         <form method="post" action="{{route('register')}}">
                    <div class="col-md-10 form_reg">
                    @csrf
                    <div class="input-group input-group-sm">
                        <span class="info col-sm-4 input-group-text">Логин</span>
                        <input name="login" class="form-control" value="{{old('login')}}"/>
                        @error('login')
                            <span class="form-control error">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="input-group input-group-sm mt-2">
                        <span class="info col-sm-4 input-group-text">Фамилия</span>
                        <input name="surname" class="form-control" value="{{old('surname')}}"/>
                        @error('surname')
                        <span class="form-control error">{{$message}}</span>
                        @enderror
                    </div>
                        <div class="input-group input-group-sm mt-2">
                            <span class="info col-sm-4 input-group-text">Имя</span>
                            <input name="name" class="form-control" value="{{old('name')}}"/>
                            @error('name')
                            <span class="form-control error">{{$message}}</span>
                            @enderror
                        </div>
                        <div class="input-group input-group-sm mt-2">
                            <span class="info col-sm-4 input-group-text">Отчество</span>
                            <input name="second_name" class="form-control" value="{{old('secondname')}}"/>
                            @error('second_name')
                            <span class="form-control error">{{$message}}</span>
                            @enderror
                        </div>
                    <div class="input-group input-group-sm mt-2">
                        <span class="info col-sm-4 input-group-text">Номер телефона</span>
                        <span id="code" class="col-sm-4 input-group-text">+375</span>
                        <input name="phone_number" class="form-control" value="{{old('PhoneNumber')}}"/>
                        @error('phone_number')
                        <span class="code1 form-control error">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="input-group input-group-sm mt-2">
                        <span class="info col-sm-4 input-group-text">Дата рождения</span>
                        <input type="date" name="date" id="date" max="{{date('Y')-16}}-12-31" class="form-control"/>
                        @error('date')
                        <span class="form-control error">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="input-group input-group-sm mt-2 mt-2">
                        <span class="info col-sm-4 input-group-text">Пол</span>
                        <input name="sex" type="radio" class="btn-check" id="option1" autocomplete="off" value="Мужской">
                        <label class="btn btn-primary m-3" for="option1">Мужской</label>
                        <input name="sex" type="radio" class="ml-1 btn-check" id="option2" autocomplete="off" value="Женский">
                        <label class="btn btn-primary m-3" for="option2">Женский</label>
                        @error('sex')
                        <span class="sex_error form-control error">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="input-group input-group-sm form-group mt-2">
                        <span class="info col-sm-4 input-group-text">Пароль</span>
                        <input type="password" name="Password" class="form-control" />
                        <div class="icon_pas"></div>
                        @error('Password')
                        <span class="form-control error">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="input-group input-group-sm form-group mt-2">
                        <span class="info col-sm-4 input-group-text">Потверждение пароля</span>
                        <input type="password" name="Password_confirmation" class="form-control" />
                        @error('Password_confirmation')
                        <span class="form-control error">{{$message}}</span>
                        @enderror
                    </div>
                    <br />
                    <div class="form-group">
                        <input type="submit" value="Зарегистрироваться" class="btn btn-primary" />
                    </div>
                    </div>
                </form>

        @if(old('sex')=='Мужской')
            <script>
                document.forms[0].option1.checked = true
            </script>
        @endif
        @if(old('sex')=='Женский')
            <script>
                document.forms[0].option2.checked = true
            </script>
        @endif
        @if(old('date')!=null)
            <script>
                let a = '{{old('date')}}';
                document.getElementById('date').valueAsDate = new Date(a);
            </script>
        @endif
    </div>
    <script>
        let input_pas = document.getElementsByName('Password')[0];
        let input_conf = document.getElementsByName('Password_confirmation')[0];
        document.getElementsByClassName('icon_pas')[0].addEventListener('click',function(){
            if(input_pas.type == 'password'){
                input_pas.type = 'text';
                input_conf.type = 'text';
            }
            else{
                input_pas.type = 'password';
                input_conf.type = 'password';
            }
        });
    </script>
@endsection
