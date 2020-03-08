@section('')
    <footer>

        <div class="home-footer">
            <h3 class="home-footer-subject">Inspiration</h3>
            <div class="home-footer-container">

                <div class="home-footer-container-menu">
                    <div class="home-footer-content">
                        <ul class="nav-container">
                            @auth
                                <li class="nav-item home-footer-li">
                                    <a href="/">
                                        <div class="home-footer-item">
                                            <i class="fas fa-home fa-2x"></i>
                                            <div class="sidebar-item-text">Home</div>
                                        </div>
                                    </a>
                                </li>

                                <li class="nav-item home-footer-li">
                                    <a href="{{route('logout')}}">
                                        <div class="home-footer-item">
                                            <i class="fas fa-sign-out-alt fa-2x"></i>
                                            <div class="sidebar-item-text">Logout</div>
                                        </div>
                                    </a>
                                </li>
                            @endauth
                            {{--                        ログインしていない時--}}
                            @guest
                                <li class="nav-item home-footer-li">
                                    <a href="/">
                                        <div class="home-footer-item">
                                            <i class="fas fa-home fa-2x"></i>
                                            <div class="sidebar-item-text">Home</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item home-footer-li">
                                    <a href="{{route('register')}}">
                                        <div class="home-footer-item">
                                            <i class="fas fa-door-open fa-2x home-footer-logo"></i>
                                            <div class="sidebar-item-text">Register</div>
                                        </div>
                                    </a>
                                </li>

                                <li class="nav-item home-footer-li">
                                    <a href="{{route('login')}}">
                                        <div class="home-footer-item">
                                            <i class="fas fa-sign-in-alt fa-2x home-footer-logo"></i>
                                            <div class="sidebar-item-text">Login</div>
                                        </div>
                                    </a>
                                </li>
                        @endguest
                    </div>
                </div>
                <div class="home-footer-container-contact home-footer-item-contact">
                    <i class="fas fa-envelope fa-2x sidebar-item-logo"></i>
                    <div class="l-footer-container-contact-message">
                        <a href="{{route('contact')}}">

                            お問い合わせは<br>
                            こちらから
                        </a>
                    </div>
                </div>

            </div>

            <div class="home-footer-bottom">
                <div class="home-footer-copyRight home-footer-item">
                    Copyright © 2019 Inspiration. All rights reserved.
                </div>
            </div>

    </footer>
