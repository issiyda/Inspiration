<template>

    <main class="main">

        <div class="p-mypage">

            <h2 class="f-h2">自分の投稿アイデア</h2>


            <h3 class="f-h3">投稿したアイデア</h3>

            <div class="ic">


                <paginate name="paginate-log" :list="myIdeaLists" :per="15">
                    <div v-for="myIdea in paginated('paginate-log')" class="ic-card ic-filter">
                        <router-link :to="{name:'postDetail',params:{
                                ideaId: myIdea.id,
                                userId: myIdea.user_id
                                }}" class="ic-a">
                            <h4 class="f-h4">{{myIdea.title}}</h4>
                            <div class="ic-img">
                                <img :src="`./img${myIdea.img}`" alt="postIdeaImg" class="ic-img-item">
                            </div>
                            <div class="ic-review">
                                <span class="ic-span">評価</span>
                                <span class="ic-star-review" v-bind:class="star(myIdea.averageReview)"></span>
                                <span class v-if="star(myIdea.averageReview) === 'ic-not-reviewed'">未評価のアイデアです</span>
                            </div>
                            <div class="ic-desc-filter">
                                <div class="ic-desc-overflow">概要</div>
                                <div class="ic-desc-text">
                                    {{myIdea.overflow.slice(0,48)}}
                                </div>
                            </div>
                        </router-link>

                        <div class="ic-button-two-container">

                            <div class="c-mini-button">
                                <router-link :to="{name:'postDetail',params:{
                                ideaId: myIdea.id,
                                userId: myIdea.user_id
                                }}">
                                    詳細
                                </router-link>
                            </div>
                            <div class="c-mini-button"
                                 @click="toEditPage(myIdea.id,
                                        myIdea.bought_flag,
                                        myIdea.category_id,
                                        myIdea.content,
                                        myIdea.delete_flag,
                                        myIdea.img,
                                        myIdea.overflow,
                                        myIdea.price,
                                        myIdea.title,
                                        myIdea.user_id,)">
                                編集
                            </div>
                        </div>
                    </div>
                </paginate>

            </div>

            <div class="pagination" @click="moveToTop()">
                <paginate-links for="paginate-log" class="pagination-container"
                                :show-step-links="true"></paginate-links>
            </div>


        </div>
    </main>


</template>

<script>
    export default {
        name: "AllPostComponent",
        data: function () {
            return {
                myIdeaLists: [],
                paginate: ['paginate-log']

            }
        },

        created: function () {
            this.$emit('open-loading');
            this.myIdeas()
        },

        beforeUpdate() {
            this.$emit('close-loading');
        },

        methods: {


            moveToTop() {
                this.$store.dispatch('moveToTop');
            },


            clickCallback: function (pageNum) {
                this.currrentPage = Number(pageNum);
            },

            myIdeas() {
                this.myIdeaLists = this.$store.state.ideas.myIdea;
            },
            toEditPage(id, bought_flag,
                       category_id,
                       content,
                       delete_flag,
                       img,
                       overflow,
                       price,
                       title,
                       user_id) {
                if (bought_flag === 0) {
                    this.$router.push({
                        name: 'postIdeaEdit', params: {
                            id: id,
                            bought_flag: bought_flag,
                            category_id: category_id,
                            content: content,
                            delete_flag: delete_flag,
                            img: img,
                            overflow: overflow,
                            price: price,
                            title: title,
                            user_id: user_id,
                        }
                    }).catch((error) => {
                        console.log(error)
                    })
                } else if (bought_flag === 1) {
                    alert("購入されているので編集できません")
                }
            }
        },

        computed: {
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
        }
    }
</script>

<style scoped>

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


</style>
