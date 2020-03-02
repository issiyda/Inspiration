<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--style css-->
    <link rel="stylesheet" href="{{asset('css/app.css')}}" media="all">
    <!--font-awesome-->
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <!--jquery-->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3/dist/jquery.min.js"></script>
    <script src="asset{{'js/jquery-3.3.1.min.js'}}"></script>
    <script src="asset{{'js/layout.js'}}"></script>
    <!-- wow -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet"
          type="text/css" media="all">

</head>

<body>
    <div id="app">
        <div class ="nav">

            <a class="nav-title" href="/home">
                Inspiration
            </a>


            <div class="nav-trigger js-home-sp-menu">
                <span></span>
                <span></span>
                <span></span>
            </div>

            <div class="nav-sp">

                <div class ="nav-heading">
                    <h2 class ="f-h2">Menu</h2>
                </div>

                {{--                    <ul class ="nav-container">--}}
                {{--                        <li class ="nav-item"><a href="#">Top</a></li>--}}
                {{--                        <li class ="nav-item"><a href="#">Mypage</a></li>--}}
                {{--                        <li class ="nav-item"><a href="#">Post</a></li>--}}
                {{--                        <li class ="nav-item"><a href="#">Profile</a></li>--}}
                {{--                        <li class ="nav-item"><a href="#">Logout</a></li>--}}
                {{--                    </ul>--}}

                <ul class ="nav-container">
                    <li class ="nav-item"><a href="/">Home</a></li>
                    <li class ="nav-item"><a href="{{route('register')}}">Register</a></li>
                    <li class ="nav-item"><a href="{{route('login')}}">Login</a></li>
                </ul>

            </div>



            {{--                ここはログインログアウトの部分やからLaravelに任せましょう--}}



        </div>

        <div class="nav-height"></div>


        <main>
            @yield('content')
        </main>

        @extends('layouts/spSidebar')
        @extends('layouts/footer')
    </div>


</body>
<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/layout.js')}}"></script>
</html>
