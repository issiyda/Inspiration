<template>
    <main>

        <div class="c-container">

            <h2 class="f-h2">アイデア削除</h2>


            <div class="c-form">

                <div class="c-form-container">

                    <div class="c-form-text-attention">

                        <p>一度削除すると</p>
                        <ul class="withdraw-ul">
                            <li class="withdraw-li">投稿したアイデア</li>
                            <li class="withdraw-li">{{ideaTitle}}</li>
                        </ul>
                        <p>は残りません</p>

                        <p>それでもよろしいですか？？</p>

                    </div>

                    <button class="c-button withdraw-submit-button" @click="ideaDelete(ideaId,userId)">削除する</button>

                </div>

            </div>

        </div>
    </main>

</template>

<script>
    export default {
        name: "PostIdeaDeleteComponent",

        data: function () {
            return {

                ideaId: "",
                userId: "",
                ideaTitle: "",
                user: ""
            }
        },

        created: function () {
            this.$emit('open-loading');


            this.ideaId = this.$route.params.ideaId,
                this.userId = this.$route.params.userId,
                this.ideaTitle = this.$route.params.ideaTitle

        },

        mounted: function () {
            this.$emit('close-loading');
            this.user = this.$store.dispatch('getUsers');
        },

        methods: {

            //投稿削除
            ideaDelete: function (ideaId, userId) {
                console.log("method")
                console.log(this.$store.state.users.id)
                console.log(userId)


                if (this.$store.state.users.id === userId) {

                    axios.delete('api/ideaDelete', {
                        params: {
                            ideaId: this.ideaId
                        }
                    })
                        .then((response) => {
                            console.log(response)
                            alert("削除完了しました");
                        }).catch((error) => {
                        console.log(error)
                            alert("削除失敗しました");
                    })
                }
            }
        }
    }
</script>

<style scoped>

</style>
