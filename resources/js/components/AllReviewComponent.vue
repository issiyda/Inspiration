<template>

    <main class ="main">

        <div class="p-mypage">

            <h2 class ="f-h2">レビューアイデア</h2>


            <h3 class ="f-h3">自分の投稿に対してのレビュー</h3>

            <div class="ic">


                <paginate name="paginate-log" :list="reviewedIdeas" :per="15">
                    <div v-for="reviewedIdea in paginated('paginate-log')" class="ic-card ic-filter">
                        <router-link :to="{name:'postDetail', params:{
                        ideaId:reviewedIdea.id,
                        userId:reviewedIdea.user_id
                        }}" class ="ic-a" href="#">
                            <h4 class ="f-h4">{{reviewedIdea.title}}</h4>
                            <div class="ic-img">
                                <img :src="require(`../assets${reviewedIdea.img}`)" alt="reviewIdeaImg" class="ic-img-item">
                            </div>
                            <div class="ic-review">
                                <span class ="ic-span">評価</span>
                                <span class ="ic-star-review" v-bind:class="star(reviewedIdea.averageReview)"></span>
                            </div>
                            <div class="ic-desc-filter">
                                <div class ="ic-desc-overflow">概要</div>
                                <div class="ic-desc-text">
                                    {{reviewedIdea.overflow}}
                                </div>
                            </div>
                            <div class="ic-button-one-container">

                                <div class="c-mini-button">
                                    <router-link :to="{name:'postDetail',params:{
                                ideaId: reviewedIdea.id,
                                userId: reviewedIdea.user_id
                                }}">
                                        詳細</router-link>
                                </div>
                            </div>
                        </router-link>
                    </div>
                </paginate>



            </div>

            <div class="pagination">
                <paginate-links for="paginate-log" class="pagination-container" :show-step-links="true"></paginate-links>
            </div>


        </div>
    </main>


</template>

<script>
    export default {
        name: "AllReviewComponent",


        data: function () {
            return {
                paginate: ['paginate-log']

            }
        },

        created: function () {
            this.$emit('open-loading');

        },

        beforeUpdate() {
            this.$emit('close-loading');
        },


        computed: {

            reviewedIdeas() {
                return this.$store.state.ideas.review;
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
        }
    }
</script>

<style scoped>

    .ic >>> ul{
        display:flex;
        width:100%;
        margin:5% auto;
        flex-wrap:wrap;
    }

    .pagination >>> ul{
        display: flex;
        font-size:24px;
        justify-content:center;
        list-style:none;
    }

    .pagination >>> li{
        margin: 0 2%;
    }

    .pagination-container >>> a{
        color:black;
    }
</style>
