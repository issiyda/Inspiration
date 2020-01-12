<template>

    <main class ="main">

        <div class="p-mypage">

            <h2 class ="f-h2">自分の投稿アイデア</h2>


            <h3 class ="f-h3">投稿したアイデア</h3>

            <div class="ic" >


                <div class="ic-card" v-for="myIdea in myIdeas">
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
                        <div class="ic-button-two-container">

                            <div class="c-mini-button">
                                <router-link :to="{name:'postDetail',params:{
                                id: myIdea.id}}">
                                    詳細</router-link>
                            </div>
                            <div type="submit" class="c-mini-button" value="編集">
                                <router-link to="postEdit">編集</router-link>
                            </div>
<!--                            <input type="submit" class="c-mini-button" value="詳細">-->
<!--                            <input type="submit" class="c-mini-button" value="編集">-->
                        </div>
                    </a>
                </div>

            </div>









        </div>
    </main>


</template>

<script>
    export default {
        name: "AllPostComponent",

        computed:{

            myIdeas(){
                return this.$store.state.ideas.myIdea;
            },

        },

    }
</script>

<style scoped>

</style>
