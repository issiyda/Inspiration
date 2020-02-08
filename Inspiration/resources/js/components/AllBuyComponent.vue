<template>

    <main class ="main">

        <div class="p-mypage">

            <h2 class ="f-h2">自分の購入アイデア</h2>


            <h3 class ="f-h3">購入したアイデア</h3>

            <div class="ic">


                <paginate name="paginate-log" :list="buyingIdeas" :per="15">
                    <div v-for="buyingIdea in paginated('paginate-log')" class="ic-card">
                        <router-link :to="{name:'postDetail', params:{
                        ideaId:buyingIdea.id,
                        userId:buyingIdea.user_id
                        }}" class ="ic-a" href="#">
                            <h4 class ="f-h4">{{buyingIdea.title}}</h4>
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
                                    {{buyingIdea.overflow}}
                                </div>
                            </div>
                            <div class="ic-button-one-container">

                                <div class="c-mini-button">
                                    <router-link :to="{name:'postDetail',params:{
                                ideaId: buyingIdea.id,
                                userId: buyingIdea.user_id
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
        name: "AllBuyComponent",

        data:function()
        {
            return{
                paginate: ['paginate-log']

            }
        },


        created(){
            this.$emit('open-loading');
            this.ideas = this.$store.dispatch('getUserIdeas');
            console.log('AllBuyComponent mounted.');
        },

        beforeUpdate() {
            this.$emit('close-loading');
        },

        computed:{

            buyingIdeas(){
                return this.$store.state.ideas.buyingIdea;
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
