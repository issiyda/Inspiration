@extends('layouts.app')

@section('content')

<main>

    <h2 class ="f-h2">パスワード再発行</h2>

    <div class="c-form email">
            <form class="c-form-container" method="POST" action="{{ route('password.email') }}">
                @csrf

            <p class ="c-form-container-passReminder">登録済みのメールアドレスを入力してください</p>
            <p class ="c-form-container-passReminder">入力されたメールアドレス宛に新規パスワードをお送りします</p>
            <p class ="c-form-container-passReminder">後ほど設定画面でパスワードを再設定してください</p>

            <div class="c-form-container-input passReminder-input">
                <label class ="c-label" for="mail">email</label>
                <input class = " c-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                    id="mail"  type="text" placeholder="（例）info@.com">

                @error('email')
                <span class="invalid-feedback email-alert" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

                @if (session('status'))
                    <div class="email-alert alert-success" role="alert">
                        メールを御確認下さい
                    </div>
                @endif




            <input type="submit" class="c-button" value="送信">
        </form>
    </div>

</main>

@endsection
