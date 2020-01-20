<template>
    <main class ="main">

        <div class="p-mypage">

            <h2 class ="f-h2">購入アイデア</h2>



            <h3 class="f-h3">購入したアイデア</h3>

            <div class="ic">


                <div class="ic-card" v-for="buyingIdea in buyingIdeas">
                    <a class="ic-a" href="#">

                        <h4 class ="f-h4">{{buyingIdea.title}}</h4>
                        <div class="ic-img">
<!--                            <img src="../images/staff6.jpg" alt="idea" class="ic-img-item">-->
                        </div>
                        <div class="ic-review">
                            <span class ="ic-span">評価</span>
                            <div class="ic-star">
                                <i class="fas fa-star ic-star-item"></i>
                                <i class="fas fa-star ic-star-item"></i>
                                <i class="fas fa-star ic-star-item"></i>
                                <i class="fas fa-star ic-star-item"></i>
                                <i class="fas fa-star ic-star-item"></i>
                            </div>
                        </div>

                        <div class="ic-desc">
                            <div class ="ic-desc-heading">概要</div>
                            <div class ="ic-desc-overflow">
                                {{buyingIdea.overflow}}
                            </div>

                        </div>
                        <div class="ic-button-one-container">
                            <input type="submit" class="c-mini-button" value="詳細">
                        </div>
                    </a>
                </div>



            </div>







        </div>
    </main>

</template>

<script>
    export default {
        name: "AllBuyComponent",


        created(){
            console.log('AllBuyComponent mounted.');
            this.ideas = this.$store.dispatch('getUserIdeas');

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

</style>
