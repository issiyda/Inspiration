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


<div>




<main>

    <div class="home">
        <div class="hero">

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

                    <ul class ="nav-container">
                        <li class ="nav-item"><a href="#">Home</a></li>

{{--                        ログインしてる時--}}
                        @auth
                            <li class ="nav-item"><a href="{{route('login')}}">Mypage</a></li>
                            <li class ="nav-item"><a href="{{route('logout')}}">Logout</a></li>
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
            <h3 class="home-header">あなたのアイデアから価値を生み出す</h3>
            <div class="home-what">

                <div class="home-what-container">
                    <div class="home-what-items-top js-rise-target">
                    <div class="home-what-item">
                        <div class="home-what-shadow"></div>
                        <img src="{{asset(('/img/ec.jpg'))}}" alt="">
                    </div>
                        <p>ECサイト</p>
                        <div class="home-what-item-description">世の中の商品が集まるECサイトのアイデア</div>
                    </div>

                    <div class="home-what-items-top js-rise-target">
                    <div class="home-what-item">
                        <div class="home-what-shadow"></div>
                        <img src="{{asset(('/img/sns.jpg'))}}" alt="">
                        </div>
                        <p>SNS</p>
                        <div class="home-what-item-description">ビジネスや自己発信で用いる流行りのSNSのアイデア</div>
                    </div>


                    <div class="home-what-items-top js-rise-target">
                    <div class="home-what-item">
                        <div class="home-what-shadow"></div>
                        <img src="{{asset(('/img/matching.jpg'))}}" alt="">
                        </div>
                        <p>マッチング</p>
                        <div class="home-what-item-description">恋愛などに代表されるマッチングに関するアイデア</div>
                    </div>

                </div>

                <div class="home-what-container">


                    <div class="home-what-items-bottom js-rise-target">
                        <div class="home-what-item">
                            <div class="home-what-shadow"></div>
                            <img src="{{asset(('/img/board.jpg'))}}" alt="">
                        </div>
                        <p>掲示板</p>
                        <div class="home-what-item-description">様々な情報が飛び交う掲示板に対してのアイデア</div>
                    </div>

                    <div class="home-what-items-bottom js-rise-target">
                        <div class="home-what-item">
                            <div class="home-what-shadow"></div>
                            <img src="{{asset(('/img/infoplaner.jpg'))}}" alt="">
                        </div>
                        <p>情報発信</p>
                        <div class="home-what-item-description">自分の持つ知識を使う情報発信に関するアイデア</div>
                    </div>

                    <div class="home-what-items-bottom js-rise-target">
                        <div class="home-what-item">
                            <div class="home-what-shadow"></div>
                            <img src="{{asset(('/img/sharing.jpg'))}}" alt="">
                        </div>
                        <p>シェアリング</p>
                        <div class="home-what-item-description">ITの普及に伴うシェアリングに関するアイデア</div>
                    </div>
                </div>


                </div>
            </div>

            <div class="home-merit">

                <h3 class="home-header">アイデア提供のメリット</h3>

                <div class="home-merit-evocation">
                    <p class="home-merit-evocation-item">自分のアイデアって普段どう捉えていますか？？</p>
                    <p class="home-merit-evocation-transparent js-rise-target">自分のアイデアってあまり自信無いんだよな...</p>
                    <p class="home-merit-evocation-item">そんなあなたのアイデアも実はだれかにとっては宝の山だったりします。</p>
                    <p class="home-merit-evocation-item">そんなアイデアを投稿するメリット</p>
                    <p class ="home-merit-evocation-accent">5点</p>
                    <p class="home-merit-evocation-item">挙げてみました。</p>
                </div>
                <div class="home-merit-container js-slide-target">
                    <div class="home-merit-item">
                        <img src="{{asset(('/img/influencer.jpg'))}}" alt="">
                        <h3>影響力を持てる</h3>
                        <p>資本主義が成熟し信用こそが本当の価値と言われる時代に発信力鍛えられます。</p>
                    </div>

                    <div class="home-merit-item">
                        <img src="{{asset(('/img/partner.jpg'))}}" alt="">
                        <h3>仲間が見つかる</h3>
                        <p>アイデアを投稿していく中で、ともに成長しあえる仲間を見つけることができます。</p>
                    </div>

                    <div class="home-merit-item">
                        <img src="{{asset(('/img/money.jpg'))}}" alt="">
                        <h3>アイデアがお金になる</h3>
                        <p>頭の中にあるだけであればガラクタ同然。誰かの手に渡ることで価値となりお金になります。</p>
                    </div>
                </div>
                <div class="home-merit-container js-slide-target">
                    <div class="home-merit-item">
                        <img src="{{asset(('/img/motivation.jpg'))}}" alt="">
                        <h3>モチベーション高められる</h3>
                        <p>自分のアイデアが誰かに認められることでより一層モチベーションが上がります。</p>
                    </div>

                    <div class="home-merit-item">
                        <img src="{{asset(('/img/logical.jpg'))}}" alt="">
                        <h3>論理的思考力Up</h3>
                        <p>どういう根拠でそのアイデアが上手くいくか論拠の提示で思考力上がります。</p>
                    </div>
                </div>
            </div>
            </div>

            <div class="home-recommend">
                <p class="home-recommend-word">あなたのアイデアを価値へ
                    <br>交換していきましょう</p>

                <form action="{{route('register')}}">
                    <input type="submit" class="c-button home-recommend-button" value="新規登録">
                </form>

            </div>
</main>

    @extends('layouts/spSidebar')


    @extends('layouts/footer')
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
<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/layout.js')}}"></script>
</html>
