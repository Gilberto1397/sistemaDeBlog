<!doctype html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="{{asset("/image/favicon/icons8-blog-doodle-16.png")}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <title>@yield('title')</title>
</head>
<body style="background-color: #241058">

@include('components.nav-bar')

@isset($message)
    <div class="w-100 d-flex justify-content-center text-white mt-3">
        <p>{{$message}}</p>
    </div>
@endisset

@yield('content')

<script src="{{asset('js/app.js')}}"></script>

</body>
</html>
