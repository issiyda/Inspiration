<template>

    <main>

        <div class="c-container">


        <h2 class="f-h2">レビュー投稿完了</h2>


        <div class="c-form">

            <div class="c-form-container">

                <div class="completed">

                    <p class ="completed-header">〜レビュー完了〜</p>

                    <p class="completed-paragraph">
                        新規レビュー投稿しました
                    </p>
                    <p class="completed-paragraph">
                        レビュー投稿が新たなアイデアをもたらします。<br>
                        今後も貴重なお待ちしてます。
                    </p>

                    <button class="completed-share" @click="twitterShare">
                        <i class="fab fa-twitter completed-share-twitter"></i><span>ツイートする</span>
                    </button>



                </div>

                <div class="completed-container">

                    <div class="c-button completed-button column-button">
                        <router-link to="/mypage">Mypageへ</router-link>
                    </div>

                    <div  class="c-button completed-button column-button">
                        <router-link :to="{name:'postDetail',params:{
                                            ideaId:this.ideaId,
                                            userId:this.userId
                                            }}">投稿詳細へ</router-link>
                    </div>

                </div>

            </div>

        </div>
        </div>
    </main>

</template>

<script>
    export default {
        name: "reviewCompletedComponent",

        data:function()
        {
            return{
                reviewedIdea:{},
                ideaId:"",
                userId:"",
                ideas:"",
                title:""
            }
        },

        created(){
            this.$emit('open-loading');
            this.ideaId = this.$route.params.ideaId;
            this.userId = this.$route.params.userId;
            this.ideas = this.$store.dispatch('getUserIdeas');
            this.title = this.$route.params.title;
        },

        mounted() {
            this.$emit('close-loading');
        },


        methods:{

            //Twittershare用のリンクへ飛ばす
            twitterShare(){
                const $url = `https://twitter.com/intent/tweet?text=新規レビュー\n「${this.title}」\n%20%23Inspiration&url=http://ec2-13-231-128-196.ap-northeast-1.compute.amazonaws.com/ideaDetail/${this.ideaId}`;
                window.open($url, null, 'top=100,left=100,width=300,height=400');

            }
        }
    }
</script>

<style scoped>

</style>
