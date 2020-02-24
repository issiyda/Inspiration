<template>
    <transition name="fade">
        <div class="sidebar">
            <div class="sidebar-container">

                <h2 class ="f-h2 sidebar-h2">~Menu~</h2>

                @auth
                    <li class ="nav-item"><a href="{{route('login')}}">Mypage</a></li>
                    <li class ="nav-item"><a href="{{route('logout')}}">Logout</a></li>
                @endauth
                {{--                        ログインしていない時--}}
                @guest
                    <li class ="nav-item"><a href="{{route('register')}}">
                            <div class="sidebar-item">
                                <i class="far fa-smile fa-2x sidebar-item-logo"></i>
                                <div class="sidebar-item-text">Mypage</div>
                            </div></a>
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
                                <i class="fas fa-sign-in-alt fa-2x sidebar-item-logo"></i>
                                <div class="sidebar-item-text"></div>
                            </div>
                        </a>
                    </li>

                @endguest
{{--                <div>--}}
{{--                    <router-link to="/mypage">--}}
{{--                        <div class="sidebar-item">--}}
{{--                            <i class="far fa-smile fa-2x sidebar-item-logo"></i>--}}
{{--                            <div class="sidebar-item-text">Mypage</div>--}}
{{--                        </div>--}}
{{--                    </router-link>--}}
{{--                </div>--}}



                <a href="logout" @click="closeMenu">
                    <div class="sidebar-item">
                        <i class="fas fa-sign-out-alt fa-2x sidebar-item-logo"></i>
                        <div class="sidebar-item-text">Logout</div>
                    </div>
                </a>

            </div>
        </div>
    </transition>
</template>



<style>
    .fade-enter-active, .fade-leave-active {
        transition: opacity 0.8s;
    }

    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
        transition: opacity 0.8s;
        opacity: 0;
    }
</style>
