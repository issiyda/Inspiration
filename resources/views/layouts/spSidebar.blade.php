
        <div class="sidebar">
            <div class="sidebar-container">

                <h2 class ="f-h2 sidebar-h2">~Menu~</h2>

                @auth
                    <li class ="nav-item">
                        <a href="{{route('mypage')}}">
                            <div class="sidebar-item">
                                <i class="far fa-smile fa-2x sidebar-item-logo"></i>
                                <div class="sidebar-item-text">Mypage</div>
                            </div>
                        </a>
                    </li>

                    <li class ="nav-item">
                        <a href="{{route('logout')}}">
                            <div class="sidebar-item">
                                <i class="fas fa-sign-out-alt fa-2x sidebar-item-logo"></i>
                                <div class="sidebar-item-text">Logout</div>
                            </div>
                        </a>
                    </li>

                    <li class ="nav-item">
                        <a href="{{route('contact')}}">
                            <div class="sidebar-item">
                                <i class="fas fa-envelope fa-2x sidebar-item-logo"></i>
                                <div class="sidebar-item-text">Contact</div>
                            </div>
                        </a>
                    </li>
                @endauth
                {{--                        ログインしていない時--}}
                @guest
                    <li class ="nav-item">
                        <a href="{{route('register')}}">
                            <div class="sidebar-item">
                                <i class="fas fa-door-open fa-2x sidebar-item-logo"></i>
                                <div class="sidebar-item-text">Register</div>
                            </div>
                        </a>
                    </li>

                    <li class ="nav-item">
                        <a href="{{route('login')}}">
                            <div class="sidebar-item">
                                <i class="fas fa-sign-in-alt fa-2x sidebar-item-logo"></i>
                                <div class="sidebar-item-text">Login</div>
                            </div>
                        </a>
                    </li>

                    <li class ="nav-item">
                        <a href="{{route('contact')}}">
                            <div class="sidebar-item">
                                <i class="fas fa-envelope fa-2x sidebar-item-logo"></i>
                                <div class="sidebar-item-text">Contact</div>
                            </div>
                        </a>
                    </li>

                @endguest



            </div>
        </div>





