<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>{{$title}}</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="shortcut icon" href="./image/favicon.png" type="image/png">
</head>
<body>

<nav id="fix" class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">

                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="{{route('main')}}">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('service_category')}}">Услуги</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('doctors')}}">Наши специалисты</a>
                </li>
                @auth()
                    <li id="reg" class="nav-item">
                        <a class="nav-link" href="{{route('profile')}}">Профиль</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('logout')}}">Выйти</a>
                    </li>
                @endauth
                @guest()
                    <li id="reg" class="nav-item">
                        <a class="nav-link" href="{{route("register")}}">Регистрация</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route("login")}}">Войти</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>


<footer class="border-top footer text-muted bg-light">
    <div class="container-fluid">
        &copy; 2023 - Здоровье - просто !
    </div>
</footer>

<div id="main" class="container">
    @yield('content')
</div>
</body>
</html>
