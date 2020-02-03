<template>
    <main class ="main">

        <div class="p-mypage">

            <h2 class ="f-h2">Myページ</h2>



            <h3 class ="f-h3">購入したアイデア</h3>
            <div class="ic">


                <div class="ic-card" v-for="buyingIdea in buyingIdeas">
                    <router-link v-bind:to="{name:'postDetail',params:{
                     ideaId: buyingIdea.id,
                     userId: buyingIdea.user_id
                     }}" class ="ic-a" href="#">

                        <h4 class ="f-h4">{{buyingIdea.title}}</h4>
                        <div class="ic-img">
<!--                            <img :src="buyingIdea.img" alt="idea" class="ic-img-item">-->
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

                    </router-link>
                </div>
            </div>

            <router-link to="/allBuy" class ="p-mypage-more">全件表示</router-link>



            <h3 class ="f-h3">お気に入りアイデア</h3>



            <div class="ic" >


                    <div class="ic-card" v-for="favIdea in favIdeas.slice(0,5)">
                        <router-link v-bind:to="{name:'postDetail',params:{
                                ideaId: favIdea.id,
                                userId: favIdea.user_id
                                }}" class ="ic-a" href="#">
                            <h4 class ="f-h4">{{favIdea.title}}</h4>
                            <div class="ic-img">
                                <img :src="require(`../assets${favIdea.img}`)" alt="idea" class="ic-img-item">
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
                        </router-link>
                    </div>
                </div>

            <router-link to="/allFavorite" class ="p-mypage-more">全件表示</router-link>


            <h3 class ="f-h3">投稿したアイデア</h3>

                    <div class="ic" >


                        <div class="ic-card" v-for="myIdea in myIdeas.slice(0,5)">
                            <router-link v-bind:to="{name:'postDetail',params:{
                                ideaId: myIdea.id,
                                userId: myIdea.user_id
                                }}" class ="ic-a" href="#">
                                <h4 class ="f-h4">{{myIdea.title}}</h4>
                                <div class="ic-img">
                                    <img :src="require(`../assets${myIdea.img}`)" alt="idea" class="ic-img-item">
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
                            </router-link>
                        </div>
                    </div>

            <router-link to="/allPost" class ="p-mypage-more">全件表示</router-link>



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
        },

    }
</script>

<style scoped>


</style>
