<template>

    <main class ="main">

        <div class="p-mypage">

            <h2 class ="f-h2">お気に入りアイデア</h2>


            <h3 class ="f-h3">お気に入りしたアイデア</h3>

            <div class="ic">


                <paginate name="paginate-log" :list="favoriteIdeas" :per="15">
                    <div v-for="favoriteIdea in paginated('paginate-log')" class="ic-card">
                        <router-link :to="{name:'postDetail', params:{
                        ideaId:favoriteIdea.id,
                        userId:favoriteIdea.user_id
                        }}" class ="ic-a" href="#">
                            <h4 class ="f-h4">{{favoriteIdea.title}}</h4>
                            <div class="ic-img">
                                <img :src="require(`../assets${favoriteIdea.img}`)" alt="">

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
                                    {{favoriteIdea.overflow}}
                                </div>
                            </div>
                            <div class="ic-button-two-container">

                                <div class="c-mini-button">
                                    <router-link :to="{name:'postDetail',params:{
                                ideaId: favoriteIdea.idea_id,
                                userId: favoriteIdea.user_id
                                }}">
                                        詳細</router-link>
                                </div>

                                <div class="c-mini-button">
                                    <a href="#" @click.prevent="favDelete(favoriteIdea.user_id,favoriteIdea.idea_id)">解除</a>
                                </div>
                            </div>
                        </router-link>
                    </div>

                    <div class ="errorMessage">
                    {{errorMessage}}
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
        name: "AllFavoriteComponent",

        data:function()
        {
            return{
                ideas:{},
                errorMessage:"",
                paginate: ['paginate-log']

            }
        },

        created:function(){
            this.$emit('open-loading');
        },

        beforeUpdate() {
            this.$emit('close-loading');
        },

        methods:{

            favDelete:function(userId,ideaId){

                this.errorMessage ="";
                axios.post('/api/favDelete',{
                    userId:userId,
                    ideaId:ideaId
                }).then((response) =>{
                    console.log(response)
                    this.ideas = this.$store.dispatch('getUserIdeas')
                }).catch((error) =>{
                    console.log(error)
                    this.errorMessage = "お気に入り解除できませんでした" +
                        "時間を置いてお試し下さい"
            })

            }
        },

        computed:{

            favoriteIdeas(){
                return this.$store.state.ideas.favIdea;
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

    .errorMessage
    {
        color:#FFBEDA;
    }

    .ic-card >>> a {
        position:relative;
        z-index:1;
    }
</style>
