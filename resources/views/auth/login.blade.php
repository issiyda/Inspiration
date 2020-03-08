@extends('layouts.app')

@section('content')



    <div class="c-container">

        <h2 class="f-h2">ログイン</h2>

        <div class="c-form">


            <form method="post" class="c-form-container">
                @csrf
                <div class="c-form-container-input">
                    <label class="c-label" for="email">email</label>
                    <input id="email" value="{{old('email')}}" name="email" class="c-input" type="text"
                           placeholder="（例）info@.com">
                    {{--                <span class="invalid-feedback" role="alert">--}}
                    {{--                                        <strong>{{ $errors->first('email') }}</strong>--}}
                    {{--                                    </span>--}}
                    @error('email')
                    <span class="invalid-feedback error" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="c-form-container-input">
                    <label class="c-label" for="pass">password</label>
                    <input id="pass" value="{{old('password')}}" name="password" class="c-input" type="password"
                           placeholder="（例）Jkl439fu">
                    {{--                @error('pass')--}}
                    {{--                <span class="invalid-feedback" role="alert">--}}
                    {{--                                        <strong>{{ $errors->first('pass') }}</strong>--}}
                    {{--                                    </span>--}}
                    {{--                @enderror--}}

                    @error('password')
                    <span class="invalid-feedback error" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>


                <div class="c-form-check">

                    <input class="c-form-check-box" id="checked" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="checked">次回以降自動でログインする</label>

                </div>



                @if (Route::has('password.request'))
                    <div class="c-form-reminder">
                        <a href="{{ route('password.request') }}">
                            メールアドレスorパスワード<br>
                            をお忘れの方</a>
                    </div>
                @endif


                <input type="submit" class="c-button" value="ログイン">
            </form>
        </div>
    </div>
@endsection
