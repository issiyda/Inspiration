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
                        <div v-if="buying">
                            {{detail.content}}
                        </div>
                        <div v-else>
                            購入者にのみ開放されます
                        </div>
                    </div>

<!--                    <div class="postDetail-content">-->
<!--                        <div v-if="checkBuying">-->
<!--                            <div id="contents" class="confirm-text">-->
<!--                                {{detail.content}}-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div v-else>-->
<!--                            <div id="contents" class="confirm-text">-->
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
                        <form action="/mypage" method="post">
                            <input type="hidden" name="postId" :value="detail.id">
                            <input type="hidden" name="userId" :value="userId">
                            <input type="hidden" name="price" :value="detail.price">
                            <input type="hidden" name="_token" :value="csrf">
                            <div is="script"
                                 src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                 data-key="pk_test_GBrEKoadZp9xMAbizR6ggayP00kNbOQOVO"
                                 :data-amount="detail.price"
                                 data-name="アイデア購入"
                                 data-label="決済をする"
                                 data-description="Online course about integrating Stripe"
                                 data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                 data-locale="auto"
                                 data-currency="JPY">
                            </div>
                        </form>
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


            <div class ="review review-container">

                <div class="review-posted">
                    <div class ="review-posted-name">
                        <div class="review-img">
<!--                            <img src="../images/staff2.jpeg" alt="">-->
                            <div id="userName" class ="review-img-name">
                                だーいし
                                <p>さん</p>
                            </div>
                        </div>

                    </div>

                    <div class="review-posted-star">

                        <label for="reviewComment" class ="review-posted-comment-label">評価</label>
                        <div id="reviewComment" class ="review-posted-comment-star">
                            <div class="review-posted-comment-star-top">
                                <i class="fas fa-star ic-star fa-2x"></i>
                                <i class="fas fa-star ic-star fa-2x"></i>
                            </div>
                            <div class="review-posted-comment-star-bottom">
                                <i class="fas fa-star ic-star fa-2x"></i>
                                <i class="fas fa-star ic-star fa-2x"></i>
                                <i class="fas fa-star ic-star fa-2x"></i>
                            </div>
                        </div>
                    </div>

                    <div class ="review-posted-comment">

                        <label for="voiceComment" class ="review-posted-comment-label">レビュー</label>
                        <div id="voiceComment" class ="review-posted-comment-content">
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



                <div class="review-posted">
                    <div class ="review-posted-name">
                        <div class="review-img">
<!--                            <img src="../images/staff2.jpeg" alt="">-->
                            <div class ="review-img-name">
                                だーいし
                                <p>さん</p>
                            </div>
                        </div>

                    </div>

                    <div class="review-posted-star">

                        <label for="voiceComment" class ="review-posted-comment-label">評価</label>
                        <div id="voiceComment" class ="review-posted-comment-star">
                            <div class="review-posted-comment-star-top">
                                <i class="fas fa-star ic-star fa-2x"></i>
                                <i class="fas fa-star ic-star fa-2x"></i>
                            </div>
                            <div class="review-posted-comment-star-bottom">
                                <i class="fas fa-star ic-star fa-2x"></i>
                                <i class="fas fa-star ic-star fa-2x"></i>
                                <i class="fas fa-star ic-star fa-2x"></i>
                            </div>
                        </div>
                    </div>

                    <div class ="review-posted-comment">

                        <label for="voiceComment" class ="review-posted-comment-label">レビュー</label>
                        <div id="voiceComment" class ="review-posted-comment-content">
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


            <div v-if="buying" class="review-container">

            <div class="c-heading">
                <h3 class ="f-h3">レビュー</h3>
            </div>

            <div class="review-comment">
                <form action="" @submit.prevent="reviewPost()">

                    <div class ="review-comment-container">

                        <label for="review-comment">評価</label>

                        <div class="review-comment-check">
                        <i class="fas fa-star ic-star fa-2x" @click="starJudge(1)"></i>
                        <i class="fas fa-star ic-star fa-2x" @click="starJudge(2)"></i>
                        <i class="fas fa-star ic-star fa-2x" @click="starJudge(3)"></i>
                        <i class="fas fa-star ic-star fa-2x" @click="starJudge(4)"></i>
                        <i class="fas fa-star ic-star fa-2x" @click="starJudge(5)"></i>
                        </div>

                        <div class="review-comment-result">

                        <div v-show="stars.oneStar">
                            <div class="review-comment-stars">
                                <i class="fas fa-star ic-star fa-2x faa-bounce animated review-comment-stars-select"></i>
                                <i class="fas fa-star ic-star fa-2x"></i>
                            </div>
                            <div class="review-comment-stars">
                                <i class="fas fa-star ic-star fa-2x"></i>
                                <i class="fas fa-star ic-star fa-2x"></i>
                                <i class="fas fa-star ic-star fa-2x"></i>
                            </div>
                        </div>

                        <div v-show="stars.twoStars">
                            <div class="review-comment-stars">
                                <i class="fas fa-star ic-star fa-2x faa-bounce animated review-comment-stars-select"></i>
                                <i class="fas fa-star ic-star fa-2x faa-bounce animated review-comment-stars-select"></i>
                            </div>
                            <div class="review-comment-stars">
                                <i class="fas fa-star ic-star fa-2x"></i>
                                <i class="fas fa-star ic-star fa-2x"></i>
                                <i class="fas fa-star ic-star fa-2x"></i>
                            </div>
                        </div>

                        <div v-show="stars.threeStars">
                            <div class="review-comment-stars">
                             <i class="fas fa-star ic-star fa-2x faa-bounce animated review-comment-stars-select"></i>
                             <i class="fas fa-star ic-star fa-2x faa-bounce animated review-comment-stars-select"></i>
                            </div>
                            <div class="review-comment-stars">
                                <i class="fas fa-star ic-star fa-2x faa-bounce animated review-comment-stars-select"></i>
                                <i class="fas fa-star ic-star fa-2x"></i>
                                <i class="fas fa-star ic-star fa-2x"></i>
                            </div>
                        </div>

                        <div v-show="stars.fourStars">
                            <div class="review-comment-stars">
                                <i class="fas fa-star ic-star fa-2x faa-bounce animated review-comment-stars-select"></i>
                                <i class="fas fa-star ic-star fa-2x faa-bounce animated review-comment-stars-select"></i>
                            </div>
                            <div class="review-comment-stars">
                                <i class="fas fa-star ic-star fa-2x faa-bounce animated review-comment-stars-select"></i>
                                <i class="fas fa-star ic-star fa-2x faa-bounce animated review-comment-stars-select"></i>
                                <i class="fas fa-star ic-star fa-2x"></i>
                            </div>
                        </div>

                        <div v-show="stars.fiveStars">
                            <div class="review-comment-stars">
                                <i class="fas fa-star ic-star fa-2x faa-bounce animated review-comment-stars-select"></i>
                                <i class="fas fa-star ic-star fa-2x faa-bounce animated review-comment-stars-select"></i>
                            </div>
                            <div class="review-comment-stars">
                                <i class="fas fa-star ic-star fa-2x faa-bounce animated review-comment-stars-select"></i>
                                <i class="fas fa-star ic-star fa-2x faa-bounce animated review-comment-stars-select"></i>
                                <i class="fas fa-star ic-star fa-2x faa-bounce animated review-comment-stars-select"></i>
                            </div>
                        </div>
                        </div>

                    </div>

                    <div class ="review-comment-container" >
                        <label for="review-comment">レビュー</label>
                        <textarea v-model="reviewComment" class ="c-input review-comment-input" name="review" id="review-comment" cols="30" rows="10" placeholder="レビューを記入"></textarea>
                    </div>
                    <input type="submit" class="c-mini-button review-button" value="送信">
                </form>
            </div>
            </div>

            <div v-else class="review-container-restriction">

                <div class="c-heading">
                    <h3 class ="f-h3">レビュー</h3>
                </div>


                <div class="review-comment">
                    <form action="">
                        <div class ="review-comment-container" >
                            <label for="review-comment">レビュー</label>
                            <textarea disabled class ="c-input review-comment-input" name="" id="review-comment" cols="30" rows="10" placeholder="レビューを記入"></textarea>
                        </div>
                        <input type="text" class="c-mini-button review-button-restriction" value="送信">
                    </form>

                    <div class="review-comment-restriction">購入者のみレビュー可能です</div>
                </div>

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
                reviewed:"",
                userId:"",
                deleteState:true,
                buying:false,
                stars:{
                    oneStar:false,
                    twoStars:false,
                    threeStars:false,
                    fourStars:false,
                    fiveStars:false,
                },
                reviewComment:"",
                reviewNumber:"",
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')



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
                    this.checkBuying;
                }).catch((error) => {
                console.log(error);
            });


        },

        mounted(){
            this.$emit('close-loading');
            this.getState();
            this.checkCategory();
            this.contributorJudge();
            this.checkBuying;
            this.reviewedJudge();
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

            //既にレビューしているか確認
            reviewedJudge: function(){
                axios.get('/api/reviewdJudge',{params{
                        userId:this.userId,
                        ideaId:this.id
                }
                }).then((response) =>{
                    console.log(response)
                    this.reviewed = response.data.judge;
                }).catch((error) => {
                    console.log(error)
                })

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
            },

            starJudge:function($starNumber)
            {
                this.stars.oneStar = false,
                this.stars.twoStars = false,
                this.stars.threeStars = false,
                this.stars.fourStars = false,
                this.stars.fiveStars = false

                if($starNumber === 1)
                {
                    this.stars.oneStar = true;
                    this.reviewNumber =1
                }

                if($starNumber === 2)
                {
                    this.stars.twoStars = true;
                    this.reviewNumber =2
                }

                if($starNumber === 3)
                {
                    this.stars.threeStars = true;
                    this.reviewNumber =3

                }

                if($starNumber === 4)
                {
                    this.stars.fourStars = true;
                    this.reviewNumber =4
                }

                if($starNumber === 5)
                {
                    this.stars.fiveStars = true;
                    this.reviewNumber =5
                }
            },

            reviewPost: function() {
                //すでに投稿しているかチェックユーザIDとアイデアIDに一致する値があるかないか判断

                if (this.reviewed === true) {
                    this.reviewMessage = '既にレビューが投稿されています';

                    else if (this.reviewNumber !== "" && this.reviewComment !== "") {
                        //投稿処理
                        axios.post('/api/reviewPost', {
                                params:
                                    {
                                        star: this.reviewNumber,
                                        comment: this.reviewComment
                                    }
                            }
                        )
                    }
                    //入力がされていない
                    else{
                        this.reviewMessage = '全てのレビュー入力がされていません';
                    }

                }
            }
        },

        computed:{

            //購入しているか確認
            checkBuying:function(){
                axios.get('/api/buyingJudge',{
                    params: {
                        userId: this.userId,
                        postId: this.id
                    }
                }).then((response) =>{
                    console.log(response);
                    this.buying = response.data.judge;
                }).catch((error) => {
                    console.log(error);
                });
            },
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
