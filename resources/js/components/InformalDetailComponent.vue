<template>


    <main>

        <div class="postDetail">
            <h2 class="f-h2">アイデア詳細</h2>

            <div class="c-heading">
                <h3 class="f-h3">アイデア</h3>
            </div>

            <form class="postDetail-container">

                <div>

                    <label for="ideaName" class="c-label">アイデア名</label>
                    <div id="ideaName" class="confirm-text">{{ideaInfo.title}}</div>

                    <label for="ideaPrice" class="c-label">金額</label>
                    <div id="ideaPrice" class="confirm-text">{{ideaInfo.price}}</div>

                    <div class="postDetail-container-input">


                        <div class="postDetail-container-img">
                            <div class="postDetail-container-img-right">
                                <label>
                                    <img :src="`/img${ideaInfo.img}`" alt="detailIdeaImg">
                                </label>
                            </div>
                            <div class="ic postDetail-container-img-left">
                                <label class="c-label" for="img">平均評価</label>
                                <span class="ic-star-review" v-bind:class="star(ideaInfo.averageReview)"></span>
                                <span class v-if="star(ideaInfo.averageReview) === 'ic-not-reviewed'">未評価のアイデアです</span>
                            </div>
                        </div>


                        <label for="category" class="c-label">カテゴリー</label>
                        <div id="category" class="confirm-text">{{checkCategory(ideaInfo.category_id)}}</div>

                        <label for="description" class="c-label">概要</label>
                        <div id="description" class="confirm-text">
                            {{ideaInfo.overflow}}
                        </div>

                        <label for="contents" class="c-label">内容</label>
                        <div id="contents" class="confirm-text">
                            <div>
                                ご購入後にご確認ください。
                            </div>
                        </div>


                    </div>

                </div>

            </form>


            <div class="c-heading">
                <h3 class="f-h3">皆さんの声</h3>
            </div>

            <p class="center">Mypageからご確認ください。</p>


        </div>


    </main>


</template>

<script>
    export default {
        name: "PostDetailComponent",

        props: {
            ideaInfo: {
                type: Object
            }
        },

        data: function () {
            return {
                ideaId: '',
                detail: {},
                title: "",
                favActive: "",
                user: {},
                favState: "",
                contributorFlag: false,
                reviewed: false,
                ideaReviews: {},
                ideaUserId: "",
                userId: "",
                deleteState: true,
                //他者の投稿を購入しているか
                buying: false,
                //自分の投稿が購入されているか
                bought_flag: false,
                stars: {
                    oneStar: false,
                    twoStars: false,
                    threeStars: false,
                    fourStars: false,
                    fiveStars: false,
                },
                reviewComment: "",
                reviewNumber: "",
                reviewErrorMessage: false,
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),

                processing: false,
                paginate: ['paginate-log']

            }
        },


        created() {
            this.$emit('open-loading');
            this.user = this.$store.dispatch('getUsers');
            this.ideaId = this.$route.params.ideaId;


            /**
             * 投稿情報取得
             */
            axios.get('/api/detail/' + this.ideaId, {})
                .then((response) => {
                    console.log(response.data);
                    this.detail = response.data;
                }).catch((error) => {
                console.log(error);
            });


        },

        mounted() {
            this.$nextTick(function () {
                this.getState();
                this.checkCategory();
                // this.contributorJudge();
                this.checkBuying;
                this.reviewedJudge();
                this.getReviews();
                console.log('PostDetailComponent mounted')
            })
        },

        updated() {
        },


        methods: {


            moveToTop() {

                const duration = 500;  // 移動速度（1秒で終了）
                const interval = 25;    // 0.025秒ごとに移動
                const step = -window.scrollY / Math.ceil(duration / interval); // 1回に移動する距離
                const timer = setInterval(() => {

                    window.scrollBy(0, step);   // スクロール位置を移動

                    if (window.scrollY <= 1800) {

                        clearInterval(timer);

                    }

                }, interval);

            },


            favSwitch: function (userId, ideaId) {
                this.$emit('open-loading');
                axios.post('/api/favorite/',
                    {
                        userId: userId,
                        ideaId: ideaId
                    }).then((response) => {
                    console.log(response)
                    this.getState();
                }).catch((error) => {
                    console.log(error);
                });

            },

            /**
             * お気に入り状態取得
             */
            getState: function () {
                axios.get('/api/favState', {
                    params: {
                        userId: this.$store.state.users.id,
                        ideaId: this.ideaId
                    }
                })
                    .then((response) => {
                        this.favState = response.data
                        this.$emit('close-loading');
                    }).catch((error) => {
                    console.log(error);
                    this.$emit('close-loading');
                });

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
                    return 'シェアリング'
                }
                if (category_id === 7) {
                    return 'その他'
                }
            },

            //投稿者の投稿か確認
            contributorJudge: function () {
                if (this.$store.state.users.id === this.ideaUserId) {
                    this.contributorFlag = true;
                }

                //購入されてるか確認
                // this.bought = true;
            },

            //既にレビューしているか確認
            reviewedJudge: function () {
                axios.get('/api/reviewedJudge', {
                    params: {
                        userId: this.$store.state.users.id,
                        ideaId: this.ideaId
                    }
                }).then((response) => {
                    console.log(response);
                    //投稿がある場合はtrue ない場合はデフォルト値false
                    this.reviewed = response.data.judge;
                }).catch((error) => {
                    console.log(error)
                })

            },


            //レビュー取得
            getReviews: function () {
                axios.get('/api/getReviews', {
                    params: {
                        ideaId: this.ideaId
                    }
                }).then((response) => {
                    console.log(response);
                    this.ideaReviews = response.data.reviews;
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
                        ideaId: this.ideaId
                    }
                }).then((response) => {
                    console.log(response)
                    alert("削除完了しました");
                }).catch((error) => {
                    console.log(error);
                    alert("削除失敗しました");

                })
            },

            appearForm: function () {

                this.deleteState = false
            },


            starJudge: function ($starNumber) {
                this.stars.oneStar = false,
                    this.stars.twoStars = false,
                    this.stars.threeStars = false,
                    this.stars.fourStars = false,
                    this.stars.fiveStars = false

                if ($starNumber === 1) {
                    this.stars.oneStar = true;
                    this.reviewNumber = 1
                }

                if ($starNumber === 2) {
                    this.stars.twoStars = true;
                    this.reviewNumber = 2
                }

                if ($starNumber === 3) {
                    this.stars.threeStars = true;
                    this.reviewNumber = 3

                }

                if ($starNumber === 4) {
                    this.stars.fourStars = true;
                    this.reviewNumber = 4
                }

                if ($starNumber === 5) {
                    this.stars.fiveStars = true;
                    this.reviewNumber = 5
                }
            },

            reviewPost: function () {
                //すでに投稿しているか確認
                if (this.reviewed === true) {
                    this.reviewErrorMessage = '既にレビューが投稿されています'

                } else if (this.reviewComment.length > 500) {
                    this.reviewErrorMessage = '500文字以下で入力して下さい'
                    //レビュー投稿処理
                } else if (this.reviewNumber !== "" && this.reviewComment !== "") {
                    //二度送信できないようにする処理
                    this.$emit('open-loading');
                    this.processing = true;
                    //投稿処理
                    setTimeout(() => {
                        axios.post('/api/reviewPost', {
                            userId: this.$store.state.users.id,
                            ideaId: this.ideaId,
                            ideaUserId: this.ideaUserId,
                            star: this.reviewNumber,
                            comment: this.reviewComment
                        }).then((response) => {
                            console.log(response);
                            this.processing = false;
                            this.$emit('close-loading');
                            this.$router.push({
                                name: 'reviewCompleted', params:
                                    {
                                        ideaId: this.ideaId,
                                        userId: this.ideaUserId,
                                        title: this.title
                                    }
                            })
                        }).catch((error) => {
                            this.$emit('close-loading');
                            console.log(error);
                            this.reviewErrorMessage = '時間を置いてお試し下さい'
                            this.processing = false;
                        });
                    }, 2000)
                }
                //入力がされていない
                else {
                    this.reviewErrorMessage = '全てのレビュー入力がされていません';
                }
            },

            twitterShare() {
                const $url = `https://twitter.com/intent/tweet?text=アイデア名\n「${this.title}」\r\n他にも沢山の魅力的なアイデアがあるよ!\r\n%20%23Inspiration&url=http://ec2-13-231-128-196.ap-northeast-1.compute.amazonaws.com`;
                window.open($url, null, 'top=100,left=100,width=300,height=400');

            }
        },

        computed: {

            //投稿の内容見れるか確認
            // 購入者もしくは起草者
            //購入しているか確認
            checkBuying: function () {
                axios.get('/api/buyingJudge', {
                    params: {
                        userId: this.$store.state.users.id,
                        postId: this.ideaId
                    }
                }).then((response) => {
                    console.log(response);
                    this.buying = response.data.judge;
                }).catch((error) => {
                    console.log(error);
                });
            },

            canSeeContents: function () {
                //投稿者の投稿,購入者なら内容見れる
                if (this.contributorFlag === true && this.buying === true) {
                    return true
                } else if (this.contributorFlag === false && this.buying === false) {
                    return false
                }
            },


            reviewRegurationMessage: function () {
                if (this.buying === false && this.reviewed === false) {
                    return 'レビューは購入者のみ可能です'

                } else if (this.buying === true && this.reviewed === true) {
                    return 'レビューは一度のみ可能です'

                }
                this.$emit('close-loading');

            },

            star: function () {


                return function (stars) {

                    var starReview = stars;

                    if (starReview === 0) {
                        return "ic-not-reviewed";
                    } else if (starReview <= 0.5) {
                        return "rate0-5"
                    } else if (starReview > 0.5 && starReview <= 1) {
                        return "rate1"
                    } else if (starReview > 1 && starReview <= 1.5) {
                        return "rate1-5"
                    } else if (starReview > 1.5 && starReview <= 2) {
                        return "rate2"
                    } else if (starReview > 2 && starReview <= 2.5) {
                        return "rate2-5"
                    } else if (starReview > 2.5 && starReview <= 3) {
                        return "rate3"
                    } else if (starReview > 3 && starReview <= 3.5) {
                        return "rate3-5"
                    } else if (starReview > 3.5 && starReview <= 4) {
                        return "rate4"
                    } else if (starReview > 4 && starReview <= 4.5) {
                        return "rate4-5"
                    } else if (starReview > 4.5 && starReview <= 5) {
                        return "rate5"
                    }
                }
            },

        },


    }
</script>

<style scoped>
    .fav {
        color: #FFBEDA;
        margin: 5% auto;
    }

    .c-button {
        margin: 5% auto;
    }

    .ic >>> ul {
        display: flex;
        width: 100%;
        margin: 5% auto;
        flex-wrap: wrap;
    }

    .pagination >>> ul {
        display: flex;
        font-size: 24px;
        justify-content: center;
        list-style: none;
    }

    .pagination >>> li {
        margin: 0 2%;
    }

    .pagination-container >>> a {
        color: black;
    }

    .center {
        text-align: center;
    }

</style>
