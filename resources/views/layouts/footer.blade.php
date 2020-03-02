<footer>

    <div class="home-footer">
        <h3 class="home-footer-subject">Inspiration</h3>
        <div class="home-footer-container">

            <div class="home-footer-container-menu">
                <h3 class="home-footer-container-menu-h3">Inspiration</h3>
                <div class="home-footer-content">
                        @auth
                            <p><a href="/">Home</a></p>
                            <p><a href="/mypage">Mypage</a></p>
                        @endauth
                        @guest
                            <p><a href="">Home</a></p>
                            <p><a href="/register">Register</a></p>
                            <p><a href="/login">Login</a></p>
                        @endguest
                </div>
            </div>
            <div class="home-footer-container-contact">
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
            <div class="home-footer-copyRight">
                Copyright © 2019 Inspiration. All rights reserved.
            </div>
        </div>
    </div>
</footer>
