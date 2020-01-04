@extends('layouts.app')

@section('content')
    <main>

        <h2 class ="f-h2">パスワード再発行</h2>

        <div class="c-form">

            <form class="c-form-container">


                <p class ="c-form-container-passReminder">登録済みのメールアドレスを入力してください</p>
                <p class ="c-form-container-passReminder">入力されたメールアドレス宛に新規パスワードをお送りします</p>
                <p class ="c-form-container-passReminder">後ほど設定画面でパスワードを再設定してください</p>

                <div class="c-form-container-input passReminder-input">
                    <label class ="c-label" for="mail">email</label>
                    <input id="mail" class ="c-input" type="text" placeholder="（例）info@.com">
                </div>




                <input type="submit" class="c-button" value="送信">
            </form>
        </div>

    </main>

@endsection
