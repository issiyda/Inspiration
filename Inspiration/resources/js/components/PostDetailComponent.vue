<template>


    <main>

        <div class="postDetail">
            <h2 class="f-h2">アイデア詳細</h2>

            <div class="c-heading">
                <h3 class ="f-h3">アイデア</h3>
            </div>

            <form class="postDetail-container">

                <div v-for="detail in this.detail.idea">

                <label for="ideaName" class="c-label">アイデア名</label>
                <div id="ideaName" class="confirm-text">{{detail.title}}</div>

                <label for="ideaPrice" class="c-label">金額</label>
                <div id="ideaPrice" class="confirm-text">{{detail.price}}</div>

                <div class="postDetail-container-input">



                    <div class="postDetail-container-img">
                        <div class="postDetail-container-img-right">
                            <label>
                                <img :src="require(`../assets${detail.img}`)" alt="">
                                <input id="img" class ="c-input postDetail-container-img-none" type="file" />
                                <!-- hoverしたら画像をアップロードの文字が浮き上がって画像が薄暗く -->
                            </label>
                        </div>
                        <div class="postDetail-container-img-left">
                            <label class ="c-label" for="img">平均評価</label>
                            ★3.3
                        </div>

                    </div>

                    平均の評価を計算するロジック記入



                    <label for="category" class="c-label">カテゴリー</label>
                    <div id="category" class="confirm-text">{{checkCategory(detail.category_id)}}</div>

                    <label for="description" class="c-label">概要</label>
                    <div id="description" class="confirm-text">
                        {{detail.overflow}}
                    </div>

                    <label for="contents" class="c-label">内容</label>

                    <div id="contents" class="confirm-text">
                        {{detail.content}}
                    </div>

<!--                    <div class="postDetail-content">-->
<!--                        <div v-if="checkBuying">-->
<!--                            <div id="contents" class="confirm-text">-->
<!--                                {{detail.content}}-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div v-else>-->
<!--                            <div id="contents" class="confirm-text">-->
<!--                                購入者にのみ開放されます-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->

<!--                    未購入の場合は購入後に表示されますの表記-->

                    <label for="contents" class="c-label">お気に入り</label>
                    <div for="fav" class="confirm-text">
                        ハートClickでお気に入り切り替え
                        <i id ="fav" :class="{'fas': true, 'fa-heart':true ,'fa-2x':true,'fav': favActive}" @click="favSwitch($store.state.users.id,detail.id)"></i>
                    </div>

                    <div v-if="contributorFlag">
                        <label for="purchase" class="c-label">購入</label>
                    <div id="purchase" class="c-button">
                        購入する
                    </div>
                    </div>

                    <div v-else>
                    <label for="delete" class="c-label">削除</label>
                    <div id="delete" class="c-button" v-show="deleteState" @click="appearForm()">
                        アイデア削除
                    </div>
                    </div>

                    <div v-show="!deleteState">
                        <p>本当に削除しますか？？</p>
                        <div class="c-button" @click="postDelete" >
                            <router-link to="mypage">削除</router-link>
                        </div>
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
        name: "PostDetailComponent",

        data:function(){
            return {
                id:'',
                detail:{},
                favActive:"",
                user:{},
                favState:"",
                contributorFlag:true,
                userId:"",
                deleteState:true,



        }
        },


        created() {
            this.$emit('close-loading');

            this.user = this.$store.dispatch('getUsers')
                .then(()=>{
                    // this.contributorJudge();
                });
            this.id = this.$route.params.id;
            this.userId = this.$route.params.ideaUserId;


            /**
             * 投稿情報取得
             */
            axios.get('/api/detail/'+this.id, {
            })
                .then((response) => {
                    console.log(response.data);
                    this.detail = response.data;
                    this.contributorJudge();
                }).catch((error) => {
                console.log(error);
            });


        },

        mounted(){
            this.$emit('close-loading');
            this.getState();
            this.checkCategory();
            this.contributorJudge();
            console.log('PostDetailComponent mounted')
        },


        methods: {


            favSwitch: function (userId, ideaId) {
                axios.post('/api/favorite/',
                    {
                        userId: userId,
                        ideaId: ideaId
                    }).then((response) => {
                    console.log(response)
                }).catch((error) => {
                    console.log(error);
                });

                this.getState();
            },

            /**
             * お気に入り状態取得
             */
            getState: function () {
                axios.get('/api/favState', {
                    params: {
                        userId: this.$store.state.users.id,
                        ideaId: this.id
                    }
                })
                    .then((response) => {
                        this.favState = response.data
                    }).catch((error) => {
                    console.log(error);
                });
            },

            //投稿者の投稿か確認
            contributorJudge: function () {
                if (this.$store.state.users.id === this.userId) {
                    console.log(this.$store.state.users.id === this.userId)
                    this.contributorFlag = false;
                }
            },

            /**
             * 投稿削除のためのルーティング
             */
            postDelete: function () {
                axios.delete('/api/ideaDelete', {
                    params: {
                        ideaId: this.id
                    }
                }).then((response) => {
                    console.log(response)
                    alert("削除完了しました");
                }).catch((error) => {
                    console.log(error);
                    alert("削除失敗しました");

                })
            },

            appearForm:function(){

                this.deleteState = false
            },


                //カテゴリーチェック
            checkCategory: function (category_id) {
                if (category_id === 1) {
                    return 'マッチング'
                } else if (category_id === 2) {
                    return '掲示板'
                }
                if (category_id === 3) {
                    return 'SNS'
                }
                if (category_id === 4) {
                    return "ECサイト"
                }
                if (category_id === 5) {
                    return "情報発信"
                }
                if (category_id === 6) {
                    return 'その他'
                }
            }
        },

        computed:{

            checkBuying:function(){
               // buy_usersっていうテーブルに値があるから
               //  そこに二つの値がある投稿があればfalseを返す
               //
               //  return false;
            }

            },


        watch:{

            favState: function()
            {
                if(this.favState.favState === 1)
                    this.favActive = true;
                else if(this.favState.favState === 0)
                    this.favActive = false;
            },

        },





    }
</script>

<style scoped>
    .fav{
        color:#FFBEDA;
        margin:5% auto;
    }

    .c-button{
        margin:5% auto;
    }

</style>
