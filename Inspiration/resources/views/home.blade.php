<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Home</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <!--style css-->
    <link rel="stylesheet" href="{{asset('css/app.css')}}" media="all">
    <!--font-awesome-->
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!--jquery-->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3/dist/jquery.min.js"></script>
    <!--vue使うための記述-->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- wow -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet"
          type="text/css" media="all">

</head>

<body>


<div id="app">




<main>

    <div class="home">
        <div class="hero">

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
                        <li class ="nav-item"><a href="#">Home</a></li>

{{--                        ログインしてる時--}}
                        @auth
                            <li class ="nav-item"><a href="{{route('login')}}">Mypage</a></li>
                        @endauth
{{--                        ログインしていない時--}}
                        @guest
                            <li class ="nav-item"><a href="{{route('register')}}">Register</a></li>
                            <li class ="nav-item"><a href="{{route('login')}}">Login</a></li>
                        @endguest
                    </ul>

                </div>

{{--                ここはログインログアウトの部分やからLaravelに任せましょう--}}



            </div>


            <div class="hero-item">
                <h3 class="hero-item-title">Inspiration</h3>
                <div class="hero-item-text">
                    あなたのアイデアが<br>
                    誰かの価値に</div>
            </div>

        </div>

        <div class="home-container">
            <h3 class ="home-header">あなたのアイデアから価値を生み出す</h3>
            <div class="home-what">

                <div class="home-what-container">
                    <div class="home-what-item">
                        <img src="{{asset(('/img/staff2.jpeg'))}}" alt="">
                        <p>ECサイト</p>
                    </div>
                    <div class="home-what-item">
                        <img src="{{asset(('/img/staff2.jpeg'))}}" alt="">
                        <p>SNS</p>
                    </div>
                    <div class="home-what-item">
                        <img src="{{asset(('/img/staff2.jpeg'))}}" alt="">

                        <p>マッチング</p>
                    </div>
                </div>
            </div>

            <div class="home-merit">

                <h3 class ="home-header">アイデア提供のメリット</h3>

                <div class="home-merit-evocation">
                    <p>自分のアイデアってあまり自信無いんだよな...</p>
                    <p>そんなあなたのアイデアもじつはだれかにとっては宝の山だったりします。</p>
                    <p>そんなアイデアを投稿するメリット</p>
                    <p class ="home-merit-evocation-accent">5点</p>
                    <p>挙げてみました。</p>
                </div>
                <div class="home-merit-container">
                    <div class="home-merit-item home-merit-item-left">
                        <img src="{{asset(('/img/staff2.jpeg'))}}" alt="">
                        <h3>影響力を持てる</h3>
                        <p>資本主義も成熟し今後は信用こそが本当の価値と言われる時代に発信力鍛えれます。</p>
                    </div>

                    <div class="home-merit-item home-merit-item-center">
                        <img src="{{asset(('/img/staff2.jpeg'))}}" alt="">
                        <h3>仲間が見つかる</h3>
                        <p>アイデアを投稿していく中で、ともに成長しあえる仲間を見つけることができます。</p>
                    </div>

                    <div class="home-merit-item home-merit-item-right">
                        <img src="{{asset(('/img/staff2.jpeg'))}}" alt="">
                        <h3>アイデアがお金になる</h3>
                        <p>ただ頭の中にあるだけであればガラクタ同然。誰かの手に渡ることで価値となりお金になります。</p>
                    </div>

                    <div class="home-merit-item home-merit-item-left">
                        <img src="{{asset(('/img/staff2.jpeg'))}}" alt="">
                        <h3>自己肯定感高められる</h3>
                        <p>自分のアイデアが誰かに認められることでより一層モチベーションが上がります。</p>
                    </div>

                    <div class="home-merit-item home-merit-item-left">
                        <img src="{{asset(('/img/staff2.jpeg'))}}" alt="">
                        <h3>論理的思考力Up</h3>
                        <p>どういう根拠でそのアイデアが上手くいくか論拠の提示で思考力上がります。</p>
                    </div>
                </div>
            </div>

            <div class="home-recommend">
                <p>あなたのアイデアを価値へと交換していきましょう</p>

                拡大して出てくる
                <form>
                    <input class="c-button home-recommend-button" value="新規登録">
                </form>

            </div>
        </div>


    </div>

</main>

@extends('layouts/footer')

<!-- script js-->
<script src="js/script.js"></script>
<!-- wow -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>


</div>
</body>
</html>
