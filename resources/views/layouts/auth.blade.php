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

@yield('content')

<!-- JAVASCRIPTS -->
<script src="{{asset("js/tiny-slider.js")}}"></script>
<script src="{{asset("js/tobii.min.js")}}"></script>
<script src="{{asset("js/feather.min.js")}}"></script>
<script src="{{asset("js/plugins.init.js")}}"></script>
<script src="{{asset("js/app.js")}}"></script>
<!-- JAVASCRIPTS -->
</body>

</html>
