<template>
    <main>

        <div class="confirm">
            <h2 class="f-h2">アイデア投稿確認画面</h2>

            <form class="confirm-container">




                <div class="confirm-container-img">
<!--                    <img src="{{asset(('/img/staff6.jpeg'))}}" alt="">                    &lt;!&ndash; hoverしたら画像をアップロードの文字が浮き上がって画像が薄暗く &ndash;&gt;-->
                </div>


                <label for="ideaName" class="c-label">アイデア名</label>
                <div id="ideaName" class="confirm-text">みんなで早起き</div>

                <label for="category" class="c-label">カテゴリー名</label>
                <div id="category" class="confirm-text">掲示板</div>

                <label for="description" class="c-label">概要</label>
                <div id="description" class="confirm-text">
                    みんなで早起きをするためのグループメンバーを今回募集します。
                </div>


                <label for="contents" class="c-label">内容</label>
                <div id="contents" class="confirm-text">
                    みんなで早起きをするためのグループメンバーを今回募集します。

                    チームメンバーは10人募集します。
                    朝6時から勤務時間前までみんなで勉強します。
                    非常にストイックなメンバーが集まると予想されるため
                    一日でも参加報告が遅れた場合強制退会となります。
                    ご了承くださいませ。
                    aaaaaaaaaaaaaaaaaaaaaaaa
                    aaaaaaaaaaaaaaaaaaaaaa
                    aaaaaaaaaaaaaaaaaaaaa
                </div>

                <div class="confirm-attention">
                    <p>投稿を編集する場合は</p>
                    <br>
                    <p>下記の編集ボタンを押してください</p>
                </div>

                <div class ="c-button confirm-post">
                <router-link to="post">編集する</router-link>
                </div>


                <div class="confirm-attention">
                    <p>上記の内容でよろしければ</p>
                    <br>
                    <p>下記の投稿ボタンを押してください</p>
                </div>

                <div class="arrow"></div>



                <div class ="c-button confirm-post" >
                <router-link to="postComplete">投稿する</router-link>
                </div>

            </form>
        </div>

    </main>

</template>

<script>
    export default {
        name: "PostIdeaComponent"
    }
</script>

<style scoped>

</style>
