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

<nav-bar-component></nav-bar-component>

<router-view></router-view>

<side-bar-component></side-bar-component>

<footer-component></footer-component>

</div>

<!-- script js-->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- wow -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>


</body>
</html>
