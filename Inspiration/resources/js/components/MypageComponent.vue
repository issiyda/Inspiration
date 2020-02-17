<template>
    <main class ="main">

        <div class="p-mypage">

            <h2 class ="f-h2">Myページ</h2>



            <h3 class ="f-h3">購入したアイデア</h3>
            <div class="ic">


                <div class="ic-card" v-for="buyingIdea in buyingIdeas.slice(0,5)">
                    <router-link v-bind:to="{name:'postDetail',params:{
                     ideaId: buyingIdea.post_id,
                     userId: buyingIdea.user_id
                     }}" class ="ic-a" href="#">

                        <h4 class ="f-h4">{{buyingIdea.title}}</h4>
                        <div class="ic-img">
                            <img :src="require(`../assets${buyingIdea.img}`)" alt="idea" class="ic-img-item">
                        </div>
                        <div class="ic-review">
                            <span class="ic-span">評価</span>
                            <span class v-if="star(buyingIdea.averageReview) === 'ic-not-reviewed'">未評価のアイデアです</span>
                            <span class="ic-star-review" v-bind:class="star(buyingIdea.averageReview)"></span>
                        </div>
                        <div class="ic-desc">
                            <div class ="ic-desc-overflow">概要</div>
                            <div class="ic-desc-text">
                               {{buyingIdea.overflow}}
                            </div>
                        </div>

                    </router-link>
                </div>
            </div>

            <router-link to="/allBuy" class ="p-mypage-more">全件表示</router-link>



            <h3 class ="f-h3">お気に入りアイデア</h3>



            <div class="ic" >


                    <div class="ic-card" v-for="favIdea in favIdeas.slice(0,5)">
                        <router-link v-bind:to="{name:'postDetail',params:{
                                ideaId: favIdea.idea_id,
                                userId: favIdea.user_id
                                }}" class ="ic-a" href="#">
                            <h4 class ="f-h4">{{favIdea.title}}</h4>
                            <div class="ic-img">
                                <img :src="require(`../assets${favIdea.img}`)" alt="idea" class="ic-img-item">
                            </div>
                            <div class="ic-review">
                                <span class ="ic-span">評価</span>
                                <span class ="ic-star-review" v-bind:class="star(favIdea.averageReview)"></span>
                                <span class v-if="star(favIdea.averageReview) === 'ic-not-reviewed'">未評価のアイデアです</span>
                            </div>
                            <div class="ic-desc">
                                <div class ="ic-desc-overflow">概要</div>
                                <div class="ic-desc-text">
                                    {{favIdea.overflow}}
                                </div>
                            </div>
                        </router-link>
                    </div>
                </div>

            <router-link to="/allFavorite" class ="p-mypage-more">全件表示</router-link>


            <h3 class ="f-h3">投稿したアイデア</h3>

                    <div class="ic" >


                        <div class="ic-card" v-for="myIdea in myIdeas.slice(0,5)">
                            <router-link :to="{name:'postDetail',params:{
                                ideaId: myIdea.id,
                                userId: myIdea.user_id
                                }}" class ="ic-a" href="#">
                                <h4 class ="f-h4">{{myIdea.title}}</h4>
                                <div class="ic-img">
                                    <img :src="require(`../assets${myIdea.img}`)" alt="idea" class="ic-img-item">
                                </div>
                                <div class="ic-review">
                                    <span class ="ic-span">評価</span>
                                    <span class ="ic-star-review" v-bind:class="star(myIdea.averageReview)"></span>
                                    <span class v-if="star(myIdea.averageReview) === 'ic-not-reviewed'">未評価のアイデアです</span>
                                </div>
                                <div class="ic-desc">
                                    <div class ="ic-desc-overflow">概要</div>
                                    <div class="ic-desc-text">
                                        {{myIdea.overflow}}
                                    </div>
                                </div>
                            </router-link>
                        </div>
                    </div>

            <router-link to="/allPost" class ="p-mypage-more">全件表示</router-link>



            <h3 class ="f-h3">新着レビュー</h3>

                        <div class="ic" >


                            <div class="ic-card" v-for="review in reviews.slice(0,5)">
                                <router-link :to="{name:'postDetail',params:{
                                ideaId: review.id,
                                userId: review.user_id
                                }}" class ="ic-a">
                                    <h4 class ="f-h4">{{review.title}}</h4>
                                    <div class="ic-img">
                                        <img :src="require(`../assets${review.img}`)" alt="idea" class="ic-img-item">
                                    </div>
                                    <div class="ic-review">
                                        <span class ="ic-span">評価</span>
                                        <span class ="ic-star-review" v-bind:class="star(review.averageReview)"></span>
                                    </div>
                                    <div class="ic-desc">
                                        <div class ="ic-desc-overflow">コメント</div>
                                        <div class="ic-desc-text">
                                            {{review.comment}}
                                        </div>
                                    </div>
                                </router-link>
                            </div>
                        </div>

            <router-link to="/allReview" class ="p-mypage-more">全件表示</router-link>


            <div class ="c-button">
                <router-link to="/allIdea">全アイデアを見る</router-link>
            </div>




        </div>
    </main>

</template>

<script>


    export default {
        name: "MyPageComponent",

        data:function(){
            return{

                notReviewedFlag:false

                }

        },

        methods:{


        },

        created(){
            this.$emit('open-loading');
            console.log('MypageComponent mounted.');
            // this.user = this.$store.dispatch('getUsers');
        },

        mounted(){
            this.ideas = this.$store.dispatch('getUserIdeas')

        },

        beforeUpdate() {
            this.$emit('close-loading');
        },

        computed:{

            buyingIdeas(){
                return this.$store.state.ideas.buyingIdea;
            },

            myIdeas(){
                return this.$store.state.ideas.myIdea;
            },

            favIdeas(){
                return this.$store.state.ideas.favIdea;

            },
            reviews(){
                return this.$store.state.ideas.review;

            },

            star:function(){


                return function(stars) {

                    var starReview = stars;

                    if(starReview === 0)
                    {
                        return "ic-not-reviewed";
                    }
                    else if (starReview <= 0.5) {
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


</style>
