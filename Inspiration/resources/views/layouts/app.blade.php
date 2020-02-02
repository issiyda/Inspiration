{{--<!doctype html>--}}
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
{{--<head>--}}
{{--    <meta charset="utf-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1">--}}

{{--    <!-- CSRF Token -->--}}
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}

{{--    <title>{{ config('app.name', 'Laravel') }}</title>--}}

{{--    <!-- Scripts -->--}}
{{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}

{{--    <!-- Fonts -->--}}
{{--    <link rel="dns-prefetch" href="//fonts.gstatic.com">--}}
{{--    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">--}}

{{--    <!-- Styles -->--}}
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
{{--</head>--}}

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
    <!-- wow -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet"
          type="text/css" media="all">

</head>

<body>
    <div>
        <div class ="nav">

            <div class="nav-title">
                Inspiration
            </div>

            {{--                <div class ="nav">--}}
            {{--                    <ul class ="nav-container">--}}
            {{--                        <li class ="nav-item"><a href="#">Top</a></li>--}}
            {{--                        <li class ="nav-item"><a href="#">Register</a></li>--}}
            {{--                        <li class ="nav-item"><a href="#">Login</a></li>--}}
            {{--                    </ul>--}}
            {{--                </div>--}}

            <div class="nav-trigger js-toggle-sp-menu">
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

        {{--        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">--}}
{{--            <div class="container">--}}
{{--                <a class="navbar-brand" href="{{ url('/') }}">--}}
{{--                    {{ config('app.name', 'Laravel') }}--}}
{{--                </a>--}}
{{--                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">--}}
{{--                    <span class="navbar-toggler-icon"></span>--}}
{{--                </button>--}}

{{--                <div class="collapse navbar-collapse" id="navbarSupportedContent">--}}
{{--                    <!-- Left Side Of Navbar -->--}}
{{--                    <ul class="navbar-nav mr-auto">--}}

{{--                    </ul>--}}

{{--                    <!-- Right Side Of Navbar -->--}}
{{--                    <ul class="navbar-nav ml-auto">--}}
{{--                        <!-- Authentication Links -->--}}
{{--                        @guest--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
{{--                            </li>--}}
{{--                            @if (Route::has('register'))--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
{{--                                </li>--}}
{{--                            @endif--}}
{{--                        @else--}}
{{--                            <li class="nav-item dropdown">--}}
{{--                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--                                    {{ Auth::user()->name }} <span class="caret"></span>--}}
{{--                                </a>--}}

{{--                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
{{--                                    <a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--                                       onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();">--}}
{{--                                        {{ __('Logout') }}--}}
{{--                                    </a>--}}

{{--                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
{{--                                        @csrf--}}
{{--                                    </form>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                        @endguest--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </nav>--}}

        <main>
            @yield('content')
        </main>

        <footer>
                <div class="l-footer">
                    <div class="l-footer-container">

                        <div class="l-footer-content">
                            <h3>Inspiration</h3>
                            <p><a href="">Top</a></p>
                            <p><a href="">Mypage</a></p>
                            <p><a href="">Idea一覧</a></p>
                        </div>
                        <div class="l-footer-content">
                            <h3>Inspiration</h3>
                            <p><a href="">Top</a></p>
                            <p><a href="">Mypage</a></p>
                            <p><a href="">Idea一覧</a></p>
                        </div>
                        <div class="l-footer-content">
                            <h3>Inspiration</h3>
                            <p><a href="">Top</a></p>
                            <p><a href="">Mypage</a></p>
                            <p><a href="">Idea一覧</a></p>
                        </div>

                    </div>

                    <div class="l-footer-bootm">
                        <div class="l-footer-copyRight">
                            Copyright © 2019 Inspiration. All rights reserved.
                        </div>
                    </div>

                </div>

        </footer>


    </div>


</body>
</html>
