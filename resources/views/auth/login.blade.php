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


                    @error('password')
                    <span class="invalid-feedback error" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>


                @if (Route::has('password.request'))
                    <div class="c-form-reminder">
                        <a href="{{ route('password.request') }}">
                            パスワード<br>
                            をお忘れの方</a>
                    </div>
                @endif


                <input type="submit" class="c-button" value="ログイン">
            </form>
        </div>
    </div>
@endsection
