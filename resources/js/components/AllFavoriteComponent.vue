<template>

    <main class="main">

        <div class="p-mypage">

            <h2 class="f-h2">お気に入り<br class="sp">アイデア</h2>


            <h3 class="f-h3">お気に入りアイデア</h3>

            <div class="ic">


                <paginate name="paginate-log" :list="favoriteIdeas" :per="15">
                    <div v-for="favoriteIdea in paginated('paginate-log')" class="ic-card ic-filter">
                        <router-link :to="{name:'postDetail', params:{
                        ideaId:favoriteIdea.idea_id,
                        userId:favoriteIdea.user_id
                        }}" class="ic-a" href="#">
                            <h4 class="f-h4">{{favoriteIdea.title}}</h4>
                            <div class="ic-img">
                                <img :src="`./img${favoriteIdea.img}`" alt="favoriteIdeaimg" class="ic-img-item">
                            </div>
                            <div class="ic-review">
                                <span class="ic-span">評価</span>
                                <div>
                                    <span class="ic-star-review" v-bind:class="star(favoriteIdea.averageReview)"></span>
                                    <span class
                                          v-if="star(favoriteIdea.averageReview) === 'ic-not-reviewed'">未評価のアイデアです</span>
                                </div>
                            </div>
                            <div class="ic-desc-filter">
                                <div class="ic-desc-overflow">概要</div>
                                <div class="ic-desc-text">
                                    {{favoriteIdea.overflow.slice(0,48)}}
                                </div>
                            </div>
                            <div class="ic-button-two-container">

                                <div class="c-mini-button">
                                    <router-link :to="{name:'postDetail',params:{
                                ideaId: favoriteIdea.idea_id,
                                userId: favoriteIdea.user_id
                                }}">
                                        詳細
                                    </router-link>
                                </div>

                                <div class="c-mini-button">
                                    <a href="#"
                                       @click.prevent="favDelete(favoriteIdea.user_id,favoriteIdea.idea_id)">解除</a>
                                </div>
                            </div>
                        </router-link>
                    </div>

                    <div class="errorMessage">
                        {{errorMessage}}
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
        name: "AllFavoriteComponent",

        title: "全てのお気に入り",

        data: function () {
            return {
                ideas: {},
                errorMessage: "",
                paginate: ['paginate-log']

            }
        },

        created: function () {
            this.$emit('open-loading');
        },

        beforeUpdate() {
            this.$emit('close-loading');
        },

        methods: {


            moveToTop() {
                this.$store.dispatch('moveToTop');
            },


            favDelete: function (userId, ideaId) {

                this.$emit('open-loading');

                this.errorMessage = "";
                axios.post('/api/favDelete', {
                    userId: userId,
                    ideaId: ideaId
                }).then((response) => {
                    console.log(response)
                    this.ideas = this.$store.dispatch('getUserIdeas')
                        .then(this.$emit('close-loading'));

                }).catch((error) => {
                    console.log(error)
                    this.errorMessage = "お気に入り解除できませんでした" +
                        "時間を置いてお試し下さい"
                            .then(this.$emit('close-loading'));

                })

            }
        },

        computed: {

            favoriteIdeas() {
                return this.$store.state.ideas.favIdea;
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

    .errorMessage {
        color: #FFBEDA;
    }

    .ic-card >>> a {
        position: relative;
        z-index: 1;
    }
</style>
