<template>

    <main class ="main">

        <div class="p-mypage">

            <h2 class ="f-h2">自分の投稿アイデア</h2>


            <h3 class ="f-h3">投稿したアイデア</h3>

            <div class="ic">


                <paginate name="paginate-log" :list="myIdeaLists" :per="15">
                    <div v-for="myIdea in paginated('paginate-log')" class="ic-card">
                        <router-link :to="{name:'postDetail', params:{
                        ideaId:myIdea.id,
                        userId:myIdea.user_id
                        }}" class ="ic-a" href="#">
                        <h4 class ="f-h4">{{myIdea.title}}</h4>
                        <div class="ic-img">
                            <img :src="require(`../assets${myIdea.img}`)" alt="">
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
                        <div class="ic-button-two-container">

                            <div class="c-mini-button">
                                <router-link :to="{name:'postDetail',params:{
                                ideaId: myIdea.id,
                                userId: myIdea.user_id
                                }}">
                                    詳細</router-link>
                            </div>
                            <div class="c-mini-button">
                                <router-link :to="{name: 'postIdeaEdit',params:{
                                id: myIdea.id,
                                bought_flag: myIdea.bought_flag,
                                category_id: myIdea.category_id,
                                content: myIdea.content,
                                delete_flag:myIdea.delete_flag,
                                img:myIdea.img,
                                overflow:myIdea.overflow,
                                price:myIdea.price,
                                title:myIdea.title,
                                user_id:myIdea.user_id,

                                }}">編集</router-link>
                            </div>
<!--                            <input type="submit" class="c-mini-button" value="詳細">-->
<!--                            <input type="submit" class="c-mini-button" value="編集">-->
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
        name: "AllPostComponent",

        data:function(){
            return {
                myIdeaLists:[],
                paginate: ['paginate-log']

            }
        },

        created:function()
        {
            this.$emit('open-loading');
            this.myIdeas()
        },

        beforeUpdate() {
            this.$emit('close-loading');
        },

        methods:{
            clickCallback:function(pageNum){
                this.currrentPage = Number(pageNum);
            },

            myIdeas(){
                this.myIdeaLists = this.$store.state.ideas.myIdea;
            },
        },

        computed:{


            beforeUpdate() {
                this.$emit('close-loading');
            },



        },

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
