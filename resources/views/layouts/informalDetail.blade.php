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


        <informal-detail-component v-bind:idea-info="{{$ideaInfo}}"></informal-detail-component>




@endsection






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
