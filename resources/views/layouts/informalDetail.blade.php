@extends('layouts.app')

@section('content')

    <!-- フラッシュメッセージ -->
    @if (session('flash_message'))
        <div class="flash_message">
            <div class="flash_message_word">
                {{ session('flash_message') }}
            </div>
        </div>
    @endif

    @auth

        <informal-detail-component v-bind:idea-info="{{$ideaInfo}}"></informal-detail-component>


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


    @endguest

@endsection



</div>



<!-- script js-->
<script src="{{ asset('js/app.js') }}" defer></script>
<!-- wow -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
{{--Vueのバリデーション用--}}
<script src="https://cdn.jsdelivr.net/npm/vuelidate@0.7.4/dist/validators.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vuelidate@0.7.4/dist/vuelidate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/locale/ja.js"></script>
<script src="{{asset('js/layout.js')}}"></script>


</body>
</html>
