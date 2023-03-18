@extends('layouts.index' ,['title'=>'Профиль'])
@section('content')
<div class="d-flex justify-content-start">
    <div class="card me-4" style="width: 18rem;">
        <div class="card-header">
            <h4>Профиль пользователя</h4>
        </div>
        <div class="card-body">
            <img src="{{'./image/users/'}}{{Auth::user()->img ?? 'no_icon.png'}}" class="card-img profile_img" alt="...">
            <p class="card-text mt-3">{{Auth::user()->full_name}}</p>
            <p class="card-text mt-3">Возраст {{\Carbon\Carbon::now()->year - \Carbon\Carbon::make(Auth::user()->birthday)->year}}</p>
            <div class="row">
                <a href="#" class="btn btn-primary">Изменить профиль</a>
                <a href="#" class="btn btn-primary">изменить пароль</a>
            </div>
        </div>
    </div>

    <div class="card" style="width: 18rem;">
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
</div>
@endsection
