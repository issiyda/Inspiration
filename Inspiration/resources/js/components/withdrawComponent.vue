<template>


    <main>

        <h2 class ="f-h2">退会</h2>


        <div class="c-form">

            <div class="c-form-container">

                <div class="c-form-text-attention">

                    <p>一度退会すると</p>
                    <ul class ="withdraw-ul">
                        <li class ="withdraw-li">会員情報</li>
                        <li class ="withdraw-li">投稿したアイデア</li>
                    </ul>
                    <p>は残りません</p>

                    <p>それでもよろしいですか？？</p>

                </div>

            </div>

            <form method="get" action="/home" class ="c-form-submit withdraw-submit" @click="userWithdraw($store.state.users.id)">
                <input type="submit" class="c-button withdraw-submit-button" value="退会する">
            </form>
            {{$store.state.users.id}}
        </div>

    </main>

</template>

<script>
    export default {
        name: "headerBeforeComponent",


        mounted() {
            console.log('withdrawComponent mounted');
        },

        beforeUpdate() {
            this.$emit('close-loading');
        },

        methods: {
            userWithdraw: function (id) {
                axios.get('/api/withdraw/'+id,
                    {id: id})
                    .then((response) => {
                        console.log(response)
                    }).catch((error) => {
                    console.log(error);
                })
            }
        },
    }
</script>


<style scoped>

</style>
