@extends('layouts.app')

@section('content')

        @if (session('flash_message'))
            <div class="flash_message">
                {{ session('flash_message') }}
            </div>
        @endif

                <div class="contact">
                    <h2 class="f-h2">お問い合わせ</h2>
                    <form class="contact-container" method="POST" action="{{route('contactPost')}}">
                            @csrf
                        <div class="contact-container-input">

                            <div class="contact-container-input">
                                <label class="c-label" for="subject">お名前</label>
                                <input id="subject" name="userName" class="c-input" type="text" placeholder="お名前">
                            </div>

                            @if($errors->has('userName'))
                                <div class="error">{{$errors->first('userName')}}</div>
                            @endif

                            <div class="contact-container-input">
                                <label class="c-label" for="subject">メールアドレス</label>
                                <input id="subject" name="userEmail" class="c-input" type="email" placeholder="メールアドレス">
                            </div>

                            @if($errors->has('userEmail'))
                                <div class="error">{{$errors->first('userEmail')}}</div>
                            @endif

                            <div class="contact-container-input">
                                <label class="c-label" for="subject">件名</label>
                                <input id="subject" name="subject" class="c-input" type="text" placeholder="（例）アカウントに関して">
                            </div>

                            @if($errors->has('subject'))
                            <div class="error">{{$errors->first('subject')}}</div>
                            @endif

                            <div class="contact-container-input">
                                <label class="c-label" for="contactTexts">内容</label>
                                <textarea id="contactTexts" name="contents" class="c-input contact-textarea" type="text" placeholder="お問い合わせ内容記入"></textarea>
                            </div>

                            @if($errors->has('contents'))
                            <div class="error">{{$errors->first('contents')}}</div>
                            @endif


                            <button type="submit" id="submit" class="c-button">
                                送信する
                            </button>
                        </div>
                    </form>
                </div>
            </div>
   @endsection

