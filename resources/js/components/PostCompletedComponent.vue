<template>

    <main>

        <div class="c-container">

            <h2 class="f-h2">投稿完了</h2>


            <div class="c-form">

                <div class="c-form-container">

                    <div class="completed">

                        <p class="completed-header">〜投稿完了〜</p>

                        <p class="completed-paragraph">
                            新規投稿しました
                        </p>
                        <p class="completed-paragraph">
                            新しいアイデアでより一層世界を盛り上げましょう<br>
                            あなたの新しいアイデアお待ちしてます。
                        </p>

                        <button class="completed-share" @click="twitterShare">
                            <i class="fab fa-twitter completed-share-twitter"></i><span>ツイートする</span>
                        </button>


                    </div>

                    <div class="completed-container">

                        <div class="c-button completed-button column-button">
                            <router-link to="/mypage">Mypage</router-link>
                        </div>

                        <div class="c-button completed-button column-button">
                            <router-link to="/post">再投稿</router-link>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </main>

</template>

<script>
    export default {
        name: "postCompletedComponent",

        title: "投稿完了",

        data: function () {
            return {
                title: "",
                ideaId:""
            }
        },

        created() {
            this.$emit('open-loading');
            this.ideas = this.$store.dispatch('getUserIdeas')
        },

        mounted() {
            this.title = this.$route.params.title,
                this.ideaId = this.$route.params.ideaId,
                this.$emit('close-loading');
        },

        methods: {
            twitterShare() {
                const $url = `https://twitter.com/intent/tweet?text=新規アイデア名\n「${this.title}」\n%20%23Inspiration&url=http://ec2-13-231-128-196.ap-northeast-1.compute.amazonaws.com/ideaDetail/${this.ideaId}`;
                window.open($url, null, 'top=100,left=100,width=300,height=400');

            }
        }
    }
</script>

<style scoped>

</style>

