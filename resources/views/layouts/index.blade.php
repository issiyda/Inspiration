<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Home</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--style css-->
    <link rel="stylesheet" href="{{asset('css/app.css')}}" media="all">
    <!--font-awesome-->
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!--jquery-->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3/dist/jquery.min.js"></script>
    <!--vue使うための記述-->

    <!-- wow -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet"
          type="text/css" media="all">

</head>

<body>

<div id="app">

    <div class="nav">

        <a class="nav-title" href="/home">
            Inspiration
        </a>

        <div class="nav-trigger js-toggle-sp-menu"  @touchStart="sidebarSwitch">
            <span></span>
            <span></span>
            <span></span>
        </div>

        <div class="nav-sp">

            <div class ="nav-heading">
                <h2 class ="f-h2">Menu</h2>
            </div>

            <ul class ="nav-container">
                <li class ="nav-item"><a href="/home">Home</a></li>
                <li class ="nav-item"><router-link to="/mypage">Mypage</router-link></li>
                <li class ="nav-item"><router-link to="/post">Post</router-link></li>
                <li class ="nav-item"><router-link to="/profile">Profile</router-link></li>
                <li class ="nav-item"><router-link to="/contact">Contact</router-link></li>
                <li class ="nav-item"><a href="{{route('logout')}}">Logout</a></li>
            </ul>

            <!--            <ul class ="nav-container">-->
            <!--                <li class ="nav-item"><a href="">Top</a></li>-->
            <!--                <li class ="nav-item"><a href="#">Mypage</a></li>-->
            <!--                <li class ="nav-item"><a href="#">Post</a></li>-->
            <!--                <li class ="nav-item"><a href="#">Profile</a></li>-->
            <!--                <li class ="nav-item"><a href="#">Logout</a></li>-->
            <!--            </ul>-->

        </div>



    </div>



    <div class="nav-height"></div>

    <!-- フラッシュメッセージ -->
    @if (session('flash_message'))
        <div class="flash_message">
            <div class="flash_message_word">
                {{ session('flash_message') }}
            </div>
        </div>
    @endif

    @auth


    <div v-if="show" class="loading">
        <div class="loading-overlay">
            <div class ="loader-container">
            <div class="loader">
            </div>
            </div>
        </div>
    </div>


    <router-view v-on:close-loading="closeMethod()" v-on:open-loading="openMethod()"></router-view>

        <side-bar-component v-if="sidebarShow" @call-sidebar-switch="sidebarSwitch" v-bind:class="{'sidebar-active':isMenuActive}"></side-bar-component>

        <footer-component></footer-component>

    @endauth

    @guest
        <div class="guest">
            ログインしてください。
            <form method='get' class="guest-form">
                <button class="c-button guest-button">
                    <a href="/home">Home</a>
                </button>
                <button class="c-button guest-button">
                    <a href="/login">Login</a>
                </button>
            </form>
        </div>

        <side-bar-component v-if="sidebarShow" @call-sidebar-switch="sidebarSwitch" v-bind:class="{'sidebar-active':isMenuActive}"></side-bar-component>

        <guest-footer-component></guest-footer-component>

    @endguest




</div>



<!-- script js-->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- wow -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
{{--Vueのバリデーション用--}}
<script src="https://cdn.jsdelivr.net/npm/vuelidate@0.7.4/dist/validators.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vuelidate@0.7.4/dist/vuelidate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/locale/ja.js"></script>


</body>
</html>
