<template>
    <main class ="main">

        <div class="p-mypage">

            <h2 class ="f-h2">Myページ</h2>



            <h3 class ="f-h3">購入したアイデア</h3>

            <div class="ic" >


                <div class="ic-card" v-for="buyingIdea in buyingIdeas.slice(0,5)">
                    <a class ="ic-a" href="#">

                        <h4 class ="f-h4">{{buyingIdea.title}}</h4>
                        <div class="ic-img">
<!--                            <img src="../images/staff6.jpg" alt="idea" class="ic-img-item">-->
                        </div>
                        <div class="ic-review">
                            <span class ="ic-span">評価</span>
                            <i class="fas fa-star ic-star"></i>
                            <i class="fas fa-star ic-star"></i>
                            <i class="fas fa-star ic-star"></i>
                            <i class="fas fa-star ic-star"></i>
                            <i class="fas fa-star ic-star"></i>
                        </div>
                        <div class="ic-desc">
                            <div class ="ic-desc-overflow">概要</div>
                            <div class="ic-desc-text">
                               {{buyingIdea.overflow}}
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <router-link to="/allBuy" class ="p-mypage-more">もっと見る</router-link>



            <h3 class ="f-h3">お気に入りアイデア</h3>



            <div class="ic" >


                    <div class="ic-card" v-for="favIdea in favIdeas.slice(0,5)">
                        <a class ="ic-a" href="#">

                            <h4 class ="f-h4">{{favIdea.title}}</h4>
                            <div class="ic-img">
                                <!--                            <img src="../images/staff6.jpg" alt="idea" class="ic-img-item">-->
                            </div>
                            <div class="ic-review">
                                <span class ="ic-span">評価</span>
                                <i class="fas fa-star ic-star"></i>
                                <i class="fas fa-star ic-star"></i>
                                <i class="fas fa-star ic-star"></i>
                                <i class="fas fa-star ic-star"></i>
                                <i class="fas fa-star ic-star"></i>
                            </div>
                            <div class="ic-desc">
                                <div class ="ic-desc-overflow">概要</div>
                                <div class="ic-desc-text">
                                    {{favIdea.overflow}}
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

            <router-link to="/allFavorite" class ="p-mypage-more">もっと見る</router-link>


            <h3 class ="f-h3">投稿したアイデア</h3>

                    <div class="ic" >


                        <div class="ic-card" v-for="myIdea in myIdeas.slice(0,5)">
                            <a class ="ic-a" href="#">

                                <h4 class ="f-h4">{{myIdea.title}}</h4>
                                <div class="ic-img">
                                    <!--                            <img src="../images/staff6.jpg" alt="idea" class="ic-img-item">-->
                                </div>
                                <div class="ic-review">
                                    <span class ="ic-span">評価</span>
                                    <div>
                                    <i class="fas fa-star ic-star"></i>
                                    <i class="fas fa-star ic-star"></i>
                                    </div>
                                    <div>
                                    <i class="fas fa-star ic-star"></i>
                                    <i class="fas fa-star ic-star"></i>
                                    <i class="fas fa-star ic-star"></i>
                                    </div>
                                </div>
                                <div class="ic-desc">
                                    <div class ="ic-desc-overflow">概要</div>
                                    <div class="ic-desc-text">
                                        {{myIdea.overflow}}
                                    </div>
                                </div>
                            </a>
                        </div>

                    </div>

            <router-link to="/allPost" class ="p-mypage-more">もっと見る</router-link>



            <h3 class ="f-h3">新着レビュー</h3>

                        <div class="ic" >


                            <div class="ic-card" v-for="review in reviews.slice(0,5)">
                                <a class ="ic-a" href="#">

                                    <h4 class ="f-h4">{{review.title}}</h4>
                                    <div class="ic-img">
                                        <!--                            <img src="../images/staff6.jpg" alt="idea" class="ic-img-item">-->
                                    </div>
                                    <div class="ic-review">
                                        <span class ="ic-span">評価</span>
                                        <i class="fas fa-star ic-star"></i>
                                        <i class="fas fa-star ic-star"></i>
                                        <i class="fas fa-star ic-star"></i>
                                        <i class="fas fa-star ic-star"></i>
                                        <i class="fas fa-star ic-star"></i>
                                    </div>
                                    <div class="ic-desc">
                                        <div class ="ic-desc-overflow">概要</div>
                                        <div class="ic-desc-text">
                                            {{review.overflow}}
                                        </div>
                                    </div>
                                </a>
                            </div>

                        </div>

            <router-link to="/allReview" class ="p-mypage-more">もっと見る</router-link>





        </div>
    </main>

</template>

<script>

    import { mapState } from 'vuex'

    export default {
        name: "MypageComponent",

        data:function(){
            return{
                // user:{},
                // buiedIdea: {},
                // myIdea: {},
                // favIdea :{} ,
                // review : {}

                }

        },

        methods:{


        },

        created(){
            console.log('MypageComponent mounted.');
            this.ideas = this.$store.dispatch('getUserIdeas');
            this.user = this.$store.dispatch('getUsers');

        },
        mounted() {


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
        },



    }
</script>

<style scoped>


</style>
