@extends('layouts.index' ,['title'=>'Профиль'])
@section('content')
<div class="d-flex justify-content-start">
    <div class="card me-4">
        <div class="card-header">
            <h4>Профиль пользователя</h4>
        </div>
        <div id="card" class="card-body">
            <img id="profile_img" src="{{asset('storage').'/'.(Auth::user()->img ?? 'uploads/image/no_icon.png')}}" class="card-img profile_img" alt="...">
            <p class="card-text mt-3">{{Auth::user()->full_name}}</p>
            <p class="card-text mt-3">Возраст {{\Carbon\Carbon::now()->year - \Carbon\Carbon::make(Auth::user()->birthday)->year}}</p>
            <div class="row">
                <button id="info" class="btn btn-primary">Информация</button>
                <button id="avatar" class="btn btn-primary">Изменить фотографию</button>
                <button id="change_info" class="btn btn-primary">Изменить информацию</button>
                <button id="change_pas" class="btn btn-primary">Изменить пароль</button>
            </div>
        </div>
    </div>
    <div id="info_div" class="card me-4">
        <div class="card-header">
            <h4>Информация</h4>
        </div>
        <div class="card-body">
            <dl class="dl-horizontal">
                <dt>Дата создания</dt>
                <dd>{{\Carbon\Carbon::make(Auth::user()->created_at)->format(' d m Y')}}</dd>
                <dt>Пол</dt>
                <dd>{{Auth::user()->sex}}</dd>
                <dt>Дата рождения</dt>
                <dd>{{\Carbon\Carbon::make(Auth::user()->birthday)->format(' d m Y')}}</dd>
                <dt>Номер телефона</dt>
                <dd>+375{{Auth::user()->tel_number}}</dd>
            </dl>
        </div>
    </div>

    <div id="change_avatar_div" class="card me-4 hidden">
        <div class="card-header">
            <h4>Изменить фотографию</h4>
        </div>
        <div class="card-body">
            <form class="row" action="{{route('save_image')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input class="py-2 px-1 rounded-1 mt-2 align-text-bottom" type="file" name="image">
                <button class="m-auto mt-4 row btn btn-primary">Загрузить фото</button>
            </form>
        </div>

    </div>

    <div id="change_info_div" class="card me-4 hidden">
        <div class="card-header">
            <h4>Изменить информацию</h4>
        </div>
        <div class="card-body">
            <form method="post" action="{{route('change_info_save')}}">
                @csrf
                <dl class="dl-horizontal">
                    @if($errors->info->get('surname'))
                        <p class="card-text bg-danger p-2 rounded-2 text-light">{{$errors->info->get('surname')[0]}}</p>
                    @endif
                    <dt>Фамилия</dt>
                    <dd><input name="surname" class="form-control" placeholder="Иванов" value="{{old('surname')}}"/></dd>
                        @if($errors->info->get('name'))
                            <p class="card-text bg-danger p-2 rounded-2 text-light">{{$errors->info->get('name')[0]}}</p>
                        @endif
                    <dt>Имя</dt>
                    <dd><input name="name" class="form-control" placeholder="Иван" value="{{old('name')}}"/></dd>
                        @if($errors->info->get('second_name'))
                            <p class="card-text bg-danger p-2 rounded-2 text-light">{{$errors->info->get('second_name')[0]}}</p>
                        @endif
                    <dt>Отчество</dt>
                    <dd><input name="second_name" class="form-control" placeholder="Иванович" value="{{old('second_name')}}"/></dd>
                        @if($errors->info->get('date'))
                            <p class="card-text bg-danger p-2 rounded-2 text-light">{{$errors->info->get('date')[0]}}</p>
                        @endif
                    <dt>Дата рождения</dt>
                    <dd><input type="date" name="date" id="date" max="{{date('Y')-16}}-12-31" class="form-control"/></dd>
                        @if($errors->info->get('tel_number'))
                            <p class="card-text bg-danger p-2 rounded-2 text-light">{{$errors->info->get('tel_number')[0]}}</p>
                        @endif
                    <dt>Номер телефона</dt>
                    <dd class="d-flex align-items-center"><div>+375</div><input id="tel" name="tel_number" class="ms-2 form-control" placeholder="335682439" value="{{old('tel_number')}}"/></dd>
                        @if($errors->info->get('sex'))
                            <p class="card-text bg-danger p-2 rounded-2 text-light">{{$errors->info->get('sex')[0]}}</p>
                        @endif
                    <dt>Пол</dt>
                    <dd class="d-flex justify-content-around align-items-center">
                        <input name="sex" type="radio" class="btn-check" id="option1" autocomplete="off" value="Мужской">
                        <label style="width: 40%" class="btn btn-primary" for="option1">Мужской</label>
                        <input name="sex" type="radio" class="ml-1 btn-check" id="option2" autocomplete="off" value="Женский">
                        <label style="width: 40%" class="btn btn-primary" for="option2">Женский</label>
                    </dd>
                    <div class="row">
                        <input type="submit" id="sub" value="Потвердить" class="btn btn-primary" />
                    </div>
                </dl>
            </form>
        </div>

    </div>
    <div id="change_pas_div" class="card me-4 hidden">
        <div class="card-header">
            <h4>Изменение пароля</h4>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('change_pas_save') }}">
                @csrf
                <dl class="dl-horizontal">
                    @if($errors->pass->get('current_password'))
                            <p class="card-text bg-danger p-2 rounded-2 text-light">{{$errors->pass->get('current_password')[0]}}</p>
                    @endif
                    <dd>
                        <input name="current_password" type="password" class="form-control" placeholder="Текущий пароль">
                    </dd>
                    @if($errors->pass->get('password'))
                        <p class="card-text bg-danger p-2 rounded-2 text-light">{{$errors->pass->get('password')[0]}}</p>
                    @endif
                    <dd>
                        <input name="password" type="password" class="form-control" placeholder="Новый пароль">
                    </dd>
                    @if($errors->pass->get('password_confirmation'))
                        <p class="card-text bg-danger p-2 rounded-2 text-light">{{$errors->pass->get('password_confirmation')[0]}}</p>
                    @endif
                    <dd>
                        <input name="password_confirmation" type="password" class="form-control" placeholder="Потверждение">
                    </dd>
                    <div class="row">
                        <input type="submit" class="btn btn-primary" value="Сменить пароль"/>
                    </div>
                </dl>
            </form>
        </div>

    </div>
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
    @if($errors->pass->isNotEmpty())
        <script>
            document.getElementById('info_div').classList.add('hidden');
            document.getElementById('change_info_div').classList.add('hidden');
            document.getElementById('change_pas_div').classList.remove('hidden');
        </script>
    @endif
    @if($errors->info->isNotEmpty())
        <script>
            document.getElementById('info_div').classList.add('hidden');
            document.getElementById('change_pas_div').classList.add('hidden');
            document.getElementById('change_info_div').classList.remove('hidden');
        </script>
    @endif
    <script>
        let info = document.getElementById('info_div');
        let change_info = document.getElementById('change_info_div');
        let change_pas = document.getElementById('change_pas_div');
        let change_avatar = document.getElementById('change_avatar_div');

        document.getElementById('change_info').addEventListener('click',function (){
            let collection = document.getElementsByClassName('bg-danger');
            document.getElementById('date').valueAsDate = null;
            document.getElementsByName('surname')[0].value = '';
            document.getElementsByName('name')[0].value = '';
            document.getElementsByName('second_name')[0].value = '';
            document.getElementsByName('tel_number')[0].value = '';
            document.getElementsByName('sex')[0].checked = false
            document.getElementsByName('sex')[1].checked = false
            while (collection.length >0)
                collection[0].remove();
            info.classList.add('hidden');
            change_pas.classList.add('hidden');
            change_avatar.classList.add('hidden');
            change_info.classList.remove('hidden');
        });
        document.getElementById('info').addEventListener('click',function (){
            let collection = document.getElementsByClassName('bg-danger');
            document.getElementById('date').valueAsDate = null;
            document.getElementsByName('surname')[0].value = '';
            document.getElementsByName('name')[0].value = '';
            document.getElementsByName('second_name')[0].value = '';
            document.getElementsByName('tel_number')[0].value = '';
            document.getElementsByName('sex')[0].checked = false;
            document.getElementsByName('sex')[1].checked = false;
            while (collection.length >0)
                collection[0].remove();
            change_info.classList.add('hidden');
            change_pas.classList.add('hidden');
            change_avatar.classList.add('hidden');
            info.classList.remove('hidden');
        });
        document.getElementById('change_pas').addEventListener('click',function (){
            let collection = document.getElementsByClassName('bg-danger');
            document.getElementById('date').valueAsDate = null;
            document.getElementsByName('surname')[0].value = '';
            document.getElementsByName('name')[0].value = '';
            document.getElementsByName('second_name')[0].value = '';
            document.getElementsByName('tel_number')[0].value = '';
            document.getElementsByName('sex')[0].checked = false
            document.getElementsByName('sex')[1].checked = false
            while (collection.length >0)
                collection[0].remove();
            info.classList.add('hidden');
            change_info.classList.add('hidden');
            change_avatar.classList.add('hidden');
            change_pas.classList.remove('hidden');
        });

        document.getElementById('avatar').addEventListener('click',function (){
            let collection = document.getElementsByClassName('bg-danger');
            document.getElementById('date').valueAsDate = null;
            document.getElementsByName('surname')[0].value = '';
            document.getElementsByName('name')[0].value = '';
            document.getElementsByName('second_name')[0].value = '';
            document.getElementsByName('tel_number')[0].value = '';
            document.getElementsByName('sex')[0].checked = false
            document.getElementsByName('sex')[1].checked = false
            while (collection.length >0)
                collection[0].remove();
            info.classList.add('hidden');
            change_info.classList.add('hidden');
            change_pas.classList.add('hidden');
            change_avatar.classList.remove('hidden');
        });
    </script>
</div>
@endsection
