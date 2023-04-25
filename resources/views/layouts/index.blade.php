<!DOCTYPE html>
<html lang="en" class="light scroll-smooth" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- favicon -->
    <link rel="shortcut icon" href="{{asset('image/icon/favicon.png')}}" type="image/png">
    <!-- Css -->
    <link href="{{asset("css/tiny-slider.css")}}" rel="stylesheet">
    <link href="{{asset("css/tobii.min.css")}}" rel="stylesheet">
    <!-- Main Css -->
    <link href="{{asset("css/line.css")}}" rel="stylesheet">
    <link href="{{asset("css/icons.css")}}" rel="stylesheet">
    <link href="{{asset("css/tailwind.css")}}" rel="stylesheet">
    <title>{{$title}}</title>
</head>

<body class="font-nunito text-base text-black dark:text-white dark:bg-slate-900">
<!-- Loader Start -->
<!-- <div id="preloader">
        <div id="status">
            <div class="spinner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
            </div>
        </div>
    </div> -->
<!-- Loader End -->

<!-- Start Navbar -->
<nav id="topnav" class="defaultscroll is-sticky">
    <div class="container">
        <!-- Logo container-->
        <a class="logo pl-0" href="{{route('main')}}">
                <span class="inline-block dark:hidden">
                    <img src="{{asset("image/icon/logo-light.png")}}" class="l-dark" height="24" alt="">
                    <img src="{{asset("image/icon/logo-dark.png")}}" class="l-light" height="24" alt="">
                </span>
            <img src="{{asset("image/icon/logo-light.png")}}" height="24" class="hidden dark:inline-block" alt="">
        </a>

        <!-- End Logo container-->
        <div class="menu-extras">
            <div class="menu-item">
                <!-- Mobile menu toggle-->
                <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </div>
        </div>

        <!--Login button Start-->
        <!--Login button End-->

        <div id="navigation">
            <!-- Navigation Menu-->
            <ul class="navigation-menu nav-light">
                <li><a href="{{route('main')}}" class="sub-menu-item">Главная</a></li>

                <li><a href="{{route('services')}}" class="sub-menu-item">Услуги и цены</a></li>

                <li><a href="{{route('doctors')}}" class="sub-menu-item">Врачи</a></li>

                <li><a href="{{route('contacts')}}" class="sub-menu-item">Контакты</a></li>
                @guest()
                <li><a href="{{route('login')}}" class="sub-menu-item">Войти | Регистрация</a></li>
                @endguest
                @hasrole('user')
                <li class="has-submenu parent-parent-menu-item">
                    <a href="javascript:void(0)">{{Auth::user()->login}}</a><span class="menu-arrow"></span>
                    <ul class="submenu">
                        <li><a href="{{route('profile')}}" class="sub-menu-item">Профиль</a></li>
                        <li><a href="#" class="sub-menu-item">Записаться на прием</a></li>
                        <li><a href="{{route('logout')}}" class="sub-menu-item">Выйти</a></li>
                    </ul>
                @endhasrole
            </ul><!--end navigation menu-->
        </div><!--end navigation-->
    </div>

    <!--end container-->
</nav><!--end header-->
<!-- End Navbar -->

{{--Content--}}
@yield('content')

<!-- Footer Start -->
<footer class="footer bg-dark-footer relative text-gray-200 dark:text-gray-200">
    <div class="container">
        <div class="grid grid-cols-12">
            <div class="col-span-12">
                <div class="py-[60px] px-0">
                    <div class="grid md:grid-cols-12 grid-cols-1 gap-[30px]">
                        <div class="lg:col-span-4 md:col-span-12">
                            <a href="#" class="text-[22px] focus:outline-none">
                                <img src="{{asset('image/icon/logo-dark.png')}}" alt="">
                            </a>
                            <ul class="list-none mt-6">
                                <li class="inline"><a href="tel:+375336962909" target="_blank" class="btn btn-icon btn-sm border border-gray-800 rounded-md hover:border-indigo-600 dark:hover:border-indigo-600 hover:bg-indigo-600 dark:hover:bg-indigo-600"><i class="uil uil-phone" title="Позвонить"></i></a></li>
                                <li class="inline"><a href="mailto:kirillbugrimov1@gmail.com" class="btn btn-icon btn-sm border border-gray-800 rounded-md hover:border-indigo-600 dark:hover:border-indigo-600 hover:bg-indigo-600 dark:hover:bg-indigo-600"><i class="uil uil-envelope align-middle" title="Написать"></i></a></li>
                                <li class="inline"><a href="https://github.com/redbull0908/Health_simple" target="_blank" class="btn btn-icon btn-sm border border-gray-800 rounded-md hover:border-indigo-600 dark:hover:border-indigo-600 hover:bg-indigo-600 dark:hover:bg-indigo-600"><i class="uil uil-github align-middle" title="Github"></i></a></li>
                                <li class="inline"><a href="https://www.linkedin.com/in/kirill-bugrimov-879863224" target="_blank" class="btn btn-icon btn-sm border border-gray-800 rounded-md hover:border-indigo-600 dark:hover:border-indigo-600 hover:bg-indigo-600 dark:hover:bg-indigo-600"><i class="uil uil-linkedin" title="Linkedin"></i></a></li>
                                <li class="inline"><a href="https://vk.com/kirill_bugrimov" target="_blank" class="btn btn-icon btn-sm border border-gray-800 rounded-md hover:border-indigo-600 dark:hover:border-indigo-600 hover:bg-indigo-600 dark:hover:bg-indigo-600"><i class="uil uil-vk align-middle" title="vkontakte"></i></a></li>
                                <li class="inline"><a href="https://www.instagram.com/kirill.vse.skuril/" target="_blank" class="btn btn-icon btn-sm border border-gray-800 rounded-md hover:border-indigo-600 dark:hover:border-indigo-600 hover:bg-indigo-600 dark:hover:bg-indigo-600"><i class="uil uil-instagram align-middle" title="instagram"></i></a></li>
                                <li class="inline"><a href="skype:live:.cid.8df272c51f9ae7b4?chat" target="_blank" class="btn btn-icon btn-sm border border-gray-800 rounded-md hover:border-indigo-600 dark:hover:border-indigo-600 hover:bg-indigo-600 dark:hover:bg-indigo-600"><i class="uil uil-skype align-middle" title="Skype"></i></a></li>
                            </ul><!--end icon-->
                        </div><!--end col-->
                        <div class="lg:col-span-3 md:col-span-4">
                            <h5 class="tracking-[1px] text-gray-100 font-semibold">Медицинский центр</h5>
                            <ul class="list-none footer-list mt-6">
                                <li><a href="{{{route('contacts')}}}"
                                       class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i
                                            class="uil uil-angle-right-b me-1"></i> Контакты</a></li>
                                <li class="mt-[10px]"><a href="{{route('services')}}"
                                                         class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i
                                            class="uil uil-angle-right-b me-1"></i> Услуги и цены</a></li>
                                <li class="mt-[10px]"><a href="{{route('doctors')}}"
                                                         class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i
                                            class="uil uil-angle-right-b me-1"></i> Врачи</a></li>
                                <li class="mt-[10px]"><a href="#"
                                                         class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i
                                            class="uil uil-angle-right-b me-1"></i> Запись на прием</a></li>
                                @guest()
                                    <li class="mt-[10px]"><a href="{{route('login')}}"
                                                             class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i
                                                class="uil uil-angle-right-b me-1"></i> Войти | Регистрация</a></li>
                                @endguest
                            </ul>
                        </div><!--end col-->

                        <div class="lg:col-span-3 md:col-span-4">
                            <h5 class="tracking-[1px] text-gray-100 font-semibold">Полезные ссылки</h5>
                            <ul class="list-none footer-list mt-6">
                                <li><a href="https://tabletka.by/"
                                       class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i
                                            class="uil uil-angle-right-b me-1"></i>tabletka.by</a></li>
                                <li class="mt-[10px]"><a href="https://minzdrav.gov.by/"
                                                         class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i
                                            class="uil uil-angle-right-b me-1"></i>minzdrav.gov.by</a></li>
                                <li class="mt-[10px]"><a href="https://www.103.by/"
                                                         class="text-gray-300 hover:text-gray-400 duration-500 ease-in-out"><i
                                            class="uil uil-angle-right-b me-1"></i>103.by</a></li>
                            </ul>
                        </div><!--end col-->
                    </div><!--end grid-->
                </div><!--end col-->
            </div>
        </div><!--end grid-->
    </div><!--end container-->

</footer><!--end footer-->
<!-- Footer End -->


<!-- Back to top -->
<a href="#" onclick="topFunction()" id="back-to-top"
   class="back-to-top fixed hidden text-lg rounded-full z-10 bottom-5 right-5 h-9 w-9 text-center bg-indigo-600 text-white leading-9"><i
        class="uil uil-arrow-up"></i></a>
<!-- Back to top -->

<!-- JAVASCRIPTS -->
<script src="{{asset("js/tiny-slider.js")}}"></script>
<script src="{{asset("js/tobii.min.js")}}"></script>
<script src="{{asset("js/feather.min.js")}}"></script>
<script src="{{asset("js/plugins.init.js")}}"></script>
<script src="{{asset("js/app.js")}}"></script>
<!-- JAVASCRIPTS -->
</body>

</html>
