<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>403</title>

    <style>
        body {
            font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        }
    </style>
</head>
<body class="antialiased">
<div class="relative flex items-top justify-center min-h-screen sm:items-center sm:pt-0">
    <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
        <div class="d-flex justify-center align-items-center pt-8 sm:justify-start sm:pt-0">
            <div class="px-4 ml-4 text-lg text-gray-500 uppercase tracking-wider border-r border-gray-400">
                Ошибка...
            </div>
            <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
                <a class="ml-4 mt-0 btn btn-primary" href="{{route('main')}}">На главную</a>
            </div>
        </div>
    </div>

</div>
</body>
</html>
