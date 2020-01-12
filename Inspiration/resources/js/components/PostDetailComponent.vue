<template>


    <main>

        <div class="pd">
            <h2 class="f-h2">アイデア詳細</h2>

            <div class="c-heading">
                <h3 class ="f-h3">アイデア</h3>
            </div>

            <form class="pd-container">

                <div v-for="detail in this.detail.idea">

                <label for="ideaName" class="c-label">アイデア名</label>
                <div id="ideaName" class="confirm-text">{{detail.title}}</div>

                <label for="ideaPrice" class="c-label">金額</label>
                <div id="ideaPrice" class="confirm-text">{{detail.price}}</div>

                <div class="pd-container-input">



                    <div class="pd-container-img">
                        <div class="pd-container-img-right">
                            <label>
<!--                                <img src="../images/staff6.jpg" alt="">-->
                                <input id="img" class ="c-input pd-container-img-none" type="file" />
                                <!-- hoverしたら画像をアップロードの文字が浮き上がって画像が薄暗く -->
                            </label>
                        </div>
                        <div class="pd-container-img-left">
                            <label class ="c-label" for="img">平均評価</label>
                            ★3.3
                        </div>

                    </div>

                    平均の評価を計算するロジック記入



                    <label for="category" class="c-label">カテゴリー</label>
                    <div id="category" class="confirm-text">掲示板</div>

                    <label for="description" class="c-label">概要</label>
                    <div id="description" class="confirm-text">
                        {{detail.overflow}}
                    </div>


                    <label for="contents" class="c-label">内容</label>
                    <div id="contents" class="confirm-text">
                        {{detail.content}}
                    </div>

<!--                    未購入の場合は購入後に表示されますの表記-->

                    <label for="contents" class="c-label">内容</label>
                    <div for="fav" class="confirm-text">
                        ハートClickでお気に入り切り替え
                        <i id ="fav" class="fas fa-heart fa-2x" @click="favSwitch($store.state.users.id,detail.id)"></i>
                    </div>

                </div>
                </div>

            </form>



            <div class="c-heading">
                <h3 class ="f-h3">皆さんの声</h3>
            </div>


            <div class ="voice voice-container">

                <div class="voice-posted">
                    <div class ="voice-posted-name">
                        <div class="voice-img">
<!--                            <img src="../images/staff2.jpeg" alt="">-->
                            <div id="userName" class ="voice-img-name">
                                だーいし
                                <p>さん</p>
                            </div>
                        </div>

                    </div>

                    <div class="voice-posted-star">

                        <label for="voiceComment" class ="voice-posted-comment-label">評価</label>
                        <div id="voiceComment" class ="voice-posted-comment-star">
                            <div class="voice-posted-comment-star-top">
                                <i class="fas fa-star ic-star fa-2x"></i>
                                <i class="fas fa-star ic-star fa-2x"></i>
                            </div>
                            <div class="voice-posted-comment-star-bottom">
                                <i class="fas fa-star ic-star fa-2x"></i>
                                <i class="fas fa-star ic-star fa-2x"></i>
                                <i class="fas fa-star ic-star fa-2x"></i>
                            </div>
                        </div>
                    </div>

                    <div class ="voice-posted-comment">

                        <label for="voiceComment" class ="voice-posted-comment-label">コメント</label>
                        <div id="voiceComment" class ="voice-posted-comment-content">
                            このアイデアは非常に素敵でしたね。
                            日々の怠慢から開放されるためのアイデアです このアイデアは非常に素敵でしたね。
                            日々の怠慢から開放されるためのアイデアです このアイデアは非常に素敵でしたね。
                            日々の怠慢から開放されるためのアイデアです このアイデアは非常に素敵でしたね。
                            日々の怠慢から開放されるためのアイデアです このアイデアは非常に素敵でしたね。
                            日々の怠慢から開放されるためのアイデアです このアイデアは非常に素敵でしたね。
                            日々の怠慢から開放されるためのアイデアです このアイデアは非常に素敵でしたね。
                            日々の怠慢から開放されるためのアイデアです このアイデアは非常に素敵でしたね。
                            日々の怠慢から開放されるためのアイデアです このアイデアは非常に素敵でしたね。
                            日々の怠慢から開放されるためのアイデアです このアイデアは非常に素敵でしたね。

                        </div>
                    </div>

                </div>



                <div class="voice-posted">
                    <div class ="voice-posted-name">
                        <div class="voice-img">
<!--                            <img src="../images/staff2.jpeg" alt="">-->
                            <div class ="voice-img-name">
                                だーいし
                                <p>さん</p>
                            </div>
                        </div>

                    </div>

                    <div class="voice-posted-star">

                        <label for="voiceComment" class ="voice-posted-comment-label">評価</label>
                        <div id="voiceComment" class ="voice-posted-comment-star">
                            <div class="voice-posted-comment-star-top">
                                <i class="fas fa-star ic-star fa-2x"></i>
                                <i class="fas fa-star ic-star fa-2x"></i>
                            </div>
                            <div class="voice-posted-comment-star-bottom">
                                <i class="fas fa-star ic-star fa-2x"></i>
                                <i class="fas fa-star ic-star fa-2x"></i>
                                <i class="fas fa-star ic-star fa-2x"></i>
                            </div>
                        </div>
                    </div>

                    <div class ="voice-posted-comment">

                        <label for="voiceComment" class ="voice-posted-comment-label">コメント</label>
                        <div id="voiceComment" class ="voice-posted-comment-content">
                            このアイデアは非常に素敵でしたね。
                            日々の怠慢から開放されるためのアイデアです このアイデアは非常に素敵でしたね。
                            日々の怠慢から開放されるためのアイデアです このアイデアは非常に素敵でしたね。
                            日々の怠慢から開放されるためのアイデアです このアイデアは非常に素敵でしたね。
                            日々の怠慢から開放されるためのアイデアです このアイデアは非常に素敵でしたね。
                            日々の怠慢から開放されるためのアイデアです このアイデアは非常に素敵でしたね。
                            日々の怠慢から開放されるためのアイデアです このアイデアは非常に素敵でしたね。
                            日々の怠慢から開放されるためのアイデアです このアイデアは非常に素敵でしたね。
                            日々の怠慢から開放されるためのアイデアです このアイデアは非常に素敵でしたね。
                            日々の怠慢から開放されるためのアイデアです このアイデアは非常に素敵でしたね。

                        </div>
                    </div>

                </div>

            </div>

            <div class="c-heading">
                <h3 class ="f-h3">コメント</h3>
            </div>

            <div class="voice-comment">
                <form action="">
                    <div class ="voice-comment-container" >
                        <label for="voice-comment">コメント</label>
                        <textarea class ="c-input voice-comment-input" name="" id="voice-comment" cols="30" rows="10" placeholder="コメントを記入"></textarea>
                    </div>
                    <input type="text" class="c-mini-button voice-button" value="送信">
                </form>
            </div>
        </div>



    </main>


</template>

<script>
    export default {
        name: "headerBeforeComponent",

        data:function(){
            return {
                id:'',
                detail:{},

        }
        },

        methods:{

            favSwitch:function(userId,ideaId)
            {
               axios.post('/api/favorite/',
                   {userId:userId,
                    ideaId:ideaId
               }).then((response) =>{
                   console.log(response)
               }).catch((error) =>{
                   console.log(error);
               })
            }
        },


        created() {

            this.id = this.$route.params.id;

            axios.get('/api/detail/'+this.id, {
            })
                .then((response) => {
                    console.log(response.data);
                    this.detail = response.data

                }).catch((error) => {
                console.log(error);

            });
        },

        mounted(){
            console.log('PostDetailComponent mounted')
            this.user = this.$store.dispatch('getUsers');
        }


    }
</script>

<style scoped>

</style>
