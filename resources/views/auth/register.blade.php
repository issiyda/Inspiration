@extends('layouts.app')

@section('content')

        <div class="c-container">

        <h2 class="f-h2">新規登録</h2>

        <div class="c-form">

            <form method="post" action="{{route('register')}}"  class="c-form-container register">
                @csrf
                <div class="c-form-container-input register-input">
                    <label class ="c-label" for="email">name</label>
                    <input id="name" name="name" class ="c-input" type="text" placeholder="（例）だーいし" value="{{old('name')}}">
                    @error('name')
                    <span class="invalid-feedback error" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                    @enderror
                </div>
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
