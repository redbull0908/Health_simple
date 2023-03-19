@extends('layouts.index' ,['title'=>'Профиль'])
@section('content')
<div class="d-flex justify-content-start">
    <div class="card me-4">
        <div class="card-header">
            <h4>Профиль пользователя</h4>
        </div>
        <div id="card" class="card-body">
            <img src="{{'./image/users/'}}{{Auth::user()->img ?? 'no_icon.png'}}" class="card-img profile_img" alt="...">
            <p class="card-text mt-3">{{Auth::user()->full_name}}</p>
            <p class="card-text mt-3">Возраст {{\Carbon\Carbon::now()->year - \Carbon\Carbon::make(Auth::user()->birthday)->year}}</p>
            <div id="error">
            @foreach ($errors->all() as $message)
                <p class="card-text bg-danger p-1">{{$message}}</p>
            @endforeach
            </div>
            <div class="row">
                <button id="info" class="btn btn-primary">Информация</button>
                <button id="change_info" class="btn btn-primary">Изменить профиль</button>
                <button id="change_pas" class="btn btn-primary">Изменить пароль</button>
            </div>
        </div>
    </div>
    <div class="card" id="change"></div>
</div>


    <script>

        let servResponse = document.getElementById('change');

        let xhr = new XMLHttpRequest();
        xhr.open('get','{{route('get_info')}}');
        xhr.onreadystatechange = function (){
            if(xhr.readyState === 4 && xhr.status === 200){
                servResponse.innerHTML = xhr.responseText;
            }
        }
        xhr.send();

        document.getElementById('change_pas').addEventListener('click',function (e){
            let collection = document.getElementById('error');

            while (collection.firstChild) {
                collection.removeChild(collection.firstChild);
            }
            e.preventDefault();
            let xhr = new XMLHttpRequest();
            xhr.open('get','{{route('change_pas')}}');
            xhr.onreadystatechange = function (){
                if(xhr.readyState === 4 && xhr.status === 200){
                    servResponse.innerHTML = xhr.responseText;
                }
            }
            xhr.send();
        });

        document.getElementById('info').addEventListener('click',function (e){
            let collection = document.getElementById('error');

            while (collection.firstChild) {
                collection.removeChild(collection.firstChild);
            }
            e.preventDefault();
            let xhr = new XMLHttpRequest();
            xhr.open('get','{{route('get_info')}}');
            xhr.onreadystatechange = function (){
                if(xhr.readyState === 4 && xhr.status === 200){
                    servResponse.innerHTML = xhr.responseText;
                }
            }
            xhr.send();
        });

        document.getElementById('change_info').addEventListener('click',function (e){
            let collection = document.getElementById('error');

            while (collection.firstChild) {
                collection.removeChild(collection.firstChild);
            }
            e.preventDefault();
            let xhr = new XMLHttpRequest();
            xhr.open('get','{{route('change_info')}}');
            xhr.onreadystatechange = function (){
                if(xhr.readyState === 4 && xhr.status === 200){
                    servResponse.innerHTML = xhr.responseText;
                }
            }
            xhr.send();
        });
    </script>
@endsection
