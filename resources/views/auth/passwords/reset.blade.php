@extends('layouts.app')

@section('content')
        <div class="c-container">


        <h2 class ="f-h2">パスワード再発行</h2>

        <div class="c-form">

            <form class="c-form-container" method="POST" action="{{ route('password.update') }}">


{{--                <p class ="c-form-container-passReminder">登録済みのメールアドレスを入力してください</p>--}}
{{--                <p class ="c-form-container-passReminder">入力されたメールアドレス宛に新規パスワードをお送りします</p>--}}
{{--                <p class ="c-form-container-passReminder">後ほど設定画面でパスワードを再設定してください</p>--}}

{{--                <div class="c-form-container-input passReminder-input">--}}
{{--                    <label class ="c-label" for="mail">email</label>--}}
{{--                    <input id="mail" class ="c-input" type="text" placeholder="（例）info@.com">--}}
{{--                </div>--}}

{{--                <input type="submit" class="c-button" value="送信">--}}

                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                <div class="c-form-container-input register-input">
                    <label class ="c-label" for="email">mail</label>
                    <input id="email" name="email" class ="c-input" type="text" placeholder="（例）info@.com" value="{{old('email')}}">
                    @error('email')
                    <span class="invalid-feedback error" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="c-form-container-input register-input">
                    <label class ="c-label" for="pass">password</label>
                    <input id="password" name="password" class ="c-input" type="password" placeholder="（例）Jkl439fu">
                    @error('password')
                    <span class="invalid-feedback error" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @enderror
                </div>

                <div class="c-form-container-input register-input">
                    <label class ="c-label" for="pass_confirmation">password再入力</label>
                    <input id="pass_confirmation" name="password_confirmation" class ="c-input" type="password" placeholder="パスワード再入力">
                    @error('pass_confirmation')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('pass_confirmation') }}</strong>
                                    </span>
                    @enderror
                </div>

                <input type="submit" class="c-button">

            </form>
        </div>
        </div>


@endsection
