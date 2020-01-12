<template>
    <main>

        <div class="profile">
            <h2 class="f-h2">アイデア編集</h2>

            <form class="profile-container">


                <div class="profile-container-input">



                    <div class="profile-container-img">
                        <div class="profile-container-img-left">
                            <label class ="c-label" for="img">アイデアイメージ画像</label>
                        </div>
                        <div class="profile-container-img-right">
                            <label>
<!--                                <img src="../images/staff6.jpg" alt="">-->
                                <input id="img" class ="c-input profile-container-img-none" type="file" />
                                <!-- hoverしたら画像をアップロードの文字が浮き上がって画像が薄暗く -->
                            </label>
                        </div>
                    </div>

                    <div class="profile-container-input">
                        <label class ="c-label" for="name">アイデア名</label>
                        <input id="name" class ="c-input" type="text" placeholder="（例）info@.com" value="">
                    </div>

                    <div class="profile-container-input">

                        <label class ="c-label" for="category">カテゴリー</label>
                        <div class="c-radio-container">

                            <input id="matching" name="category"  type="radio" value="マッチング" checked>
                            <label for="matching" class="c-radio" >マッチング</label>

                            <input id="board" name="category" class ="" type="radio" value="掲示板">
                            <label for="board" class="c-radio">掲示板</label>

                            <input id="sns" name="category" class ="" type="radio" value="SNS">
                            <label for="sns" class="c-radio">SNS</label>

                            <input id="EC" name="category" class ="" type="radio" value="ECサイト">
                            <label for="EC" class="c-radio">ECサイト</label>

                            <input id="infoplaner" name="category" class ="" type="radio" value="情報発信">
                            <label for="infoplaner" class="c-radio">情報発信</label>

                            <input id="other" name="category" class ="" type="radio" value="その他">
                            <label for="other" class="c-radio">その他</label>


                        </div>
                    </div>



                    <div class="profile-container-input">
                        <label class ="c-label" for="profile">概要</label>
                        <textarea name="" id="profile" class ="c-textarea" cols="30" rows="10" placeholder="自己紹介を記入してください">みんなで早起きをするためのグループメンバーを今回募集します。
                    </textarea>
                        <span>50/100文字</span>
                    </div>



                    <div class="profile-container-input">
                        <label class ="c-label" for="contents">内容</label>
                        <textarea name="" id="contents" class ="c-textarea" cols="30" rows="10" placeholder="あなたのアイデアをお待ちしてます">みんなで早起きをするためのグループメンバーを今回募集します。

                        チームメンバーは10人募集します。
                        朝6時から勤務時間前までみんなで勉強します。
                        非常にストイックなメンバーが集まると予想されるため
                        一日でも参加報告が遅れた場合強制退会となります。
                        ご了承くださいませ。
                        aaaaaaaaaaaaaaaaaaaaaaaa
                        aaaaaaaaaaaaaaaaaaaaaa
                        aaaaaaaaaaaaaaaaaaaaa
                    </textarea>
                        <span>50/100文字</span>
                    </div>



                    <input type="submit" class="c-button">
                </div>
            </form>
        </div>

    </main>
</template>

<script>
    export default {
        name: "EditIdeaComponent"
    }
</script>

<style scoped>

</style>
