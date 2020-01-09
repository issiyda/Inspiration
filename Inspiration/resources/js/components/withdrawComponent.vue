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

            <form action="post" class ="c-form-submit withdraw-submit">
                <input type="submit" class="c-button withdraw-submit-button" value="退会する">
            </form>
        </div>

    </main>

</template>

<script>
    export default {
        name: "headerBeforeComponent"
    }
</script>

<style scoped>

</style>
