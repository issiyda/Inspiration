<template>

    <main class ="main">

        <div class="p-mypage">

            <h2 class ="f-h2">購入したアイデア</h2>


            <h3 class ="f-h3">購入したアイデア</h3>

            <div class="ic">

                <paginate name="paginate-log" :list="buyingIdeas" :per="15">
                    <div v-for="buyingIdea in paginated('paginate-log')" class="ic-card ic-filter">
                        <router-link :to="{name:'postDetail', params:{
                        ideaId:buyingIdea.post_id,
                        userId:buyingIdea.user_id
                        }}" class ="ic-a" href="#">
                            <h4 class ="f-h4">{{buyingIdea.title}}</h4>
                            <div class="ic-img">
                                <img :src="`./img${buyingIdea.img}`" alt="buyingIdeaimg" class="ic-img-item">
                            </div>
                            <div class="ic-review">
                                <span class ="ic-span">評価</span>
                                <span class v-if="star(buyingIdea.averageReview) === 'ic-not-reviewed'">未評価のアイデアです</span>
                                <span class ="ic-star-review" v-bind:class="star(buyingIdea.averageReview)"></span>
                            </div>
                            <div class="ic-desc-filter">
                                <div class ="ic-desc-overflow">概要</div>
                                <div class="ic-desc-text">
                                    {{buyingIdea.overflow.slice(0,48)}}
                                </div>
                            </div>
                            <div class="ic-button-one-container">

                                <div class="c-mini-button">
                                    <router-link :to="{name:'postDetail',params:{
                                ideaId: buyingIdea.post_id,
                                userId: buyingIdea.user_id
                                }}">
                                        詳細</router-link>
                                </div>
                            </div>
                        </router-link>
                    </div>
                </paginate>




            </div>

            <div class="pagination" @click="moveToTop()">
                <paginate-links for="paginate-log" class="pagination-container" :show-step-links="true"></paginate-links>
            </div>


        </div>
    </main>


</template>

<script>
    export default {
        name: "AllBuyComponent",

        data: function () {
            return {
                paginate: ['paginate-log']

            }
        },

        methods: {

            moveToTop() {
                this.$store.dispatch('moveToTop');
            },
        },

            created() {
            this.$emit('open-loading');
            this.ideas = this.$store.dispatch('getUserIdeas');
            console.log('AllBuyComponent mounted.');
        },

        beforeUpdate() {
            this.$emit('close-loading');
        },

        computed: {

            buyingIdeas() {
                return this.$store.state.ideas.buyingIdea;
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
