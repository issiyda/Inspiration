<template>

    <main>

        <h2 class ="f-h2">投稿完了</h2>


        <div class="c-form">

            <div class="c-form-container">

                <div class="c-form-text-attention">

                    <p>〜投稿完了〜</p>

                    <p>新規投稿がされました</p>
                    <p>新しいアイデアでより一層世界を盛り上げましょう</p>

                    <p>Twitterであなたのアイデアに</p>
                    <p>ついてもっと知ってもらう</p>



                </div>


                <div class="c-button completed-button column-button">
                <router-link to="/mypage">Mypageへ</router-link>
                </div>

                <div  class="c-button completed-button column-button">
                <router-link to="/post">再投稿</router-link>
                </div>

            </div>

        </div>

    </main>

</template>

<script>
    export default {
        name: "postCompletedComponent"
    }
</script>

<style scoped>

</style>
