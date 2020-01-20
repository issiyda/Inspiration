<template>

        <main class ="main">

            <div class="p-mypage">

                <h2 class ="f-h2">全アイデア</h2>



                <h3 class ="f-h3">全アイデア</h3>

                <input type="text" v-model="keyword">

                <div class="ic" >


                    <div class="ic-card" v-for="allIdea in filteredIdeas">
                        <router-link :to="{name:'postDetail', params:{
                        id:allIdea.id,
                        ideaUserId:allIdea.userId
                        }}" class ="ic-a" href="#">

                            <h4 class ="f-h4">{{allIdea.title}}</h4>
                            <div class="ic-img">
                                <!--                            <img src="../images/staff6.jpg" alt="idea" class="ic-img-item">-->
                            </div>

                            <label>カテゴリ</label>
                            <div>{{categoryName(allIdea.category_id)}}</div>

                            <label>価格</label>
                            <div>{{allIdea.price}}</div>
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
                                    {{allIdea.overflow}}
                                </div>
                            </div>

                            <label>投稿日</label>
                            <div>{{allIdea.created_at}}</div>
                        </router-link>
                    </div>
                </div>









            </div>
        </main>

</template>

<script>
    export default {
        name: "AllIdeaComponent",

        data:function(){
            return{
                ideas:{}
            }
        },

        mounted(){
                this.ideas = this.$store.state.ideas.allIdea;
        },

        created(){
            this.ideas = this.$store.dispatch('getUserIdeas');

        },


        beforeUpdate() {
            this.$emit('close-loading');
        },

        methods:{
            categoryName:function(id){
                if(id === 1 ){
                    return 'マッチング'

                }else if(id === 2) {
                    return '掲示板'
                }

                else if(id === 3) {
                    return 'SNS'
                }else if(id === 4) {
                    return 'ECサイト'

                } else if(id === 5){
                    return '情報発信'
                } else{
                    return 'その他'
                }
            },
        },

        computed: {

            filteredIdeas: function(){

                
            }


            /**
             * 数が増えたときにどうするか考えないと
             *
             * @returns {string}
             */
            // categoryName(id){
            //     if(id === 1 ){
            //         return 'マッチング'
            //
            //     }else if(id === 2) {
            //         return '掲示板'
            //     }
            //
            //     else if(id === 3) {
            //         return 'SNS'
            //     }else if(id === 4) {
            //         return 'ECサイト'
            //
            //     } else if(id === 5){
            //         return '情報発信'
            //     } else{
            //         return 'その他'
            //     }
            // },
        }
    }
</script>

<style scoped>

</style>
