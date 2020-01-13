<template>


    <main>


        <h2 class="f-h2">パスワード変更</h2>

        <div class="c-form">

            <form class="c-form-container register">


                <div class="c-form-container-input register-input">
                    <label class ="c-label" for="mail">現在のpassword</label>
                    <input id="mail" class ="c-input" type="text" placeholder="（例）info@.com">
                </div>

                <div class="c-form-container-input register-input">
                    <label class ="c-label" for="pass">新規password</label>
                    <input id="pass" class ="c-input" type="password" placeholder="（例）Jkl439fu">
                </div>

                <div class="c-form-container-input register-input">
                    <label class ="c-label" for="repass">確認用新規password</label>
                    <input id="repass" class ="c-input" type="password" placeholder="パスワード再入力">
                </div>

                <input type="submit" class="c-button">
            </form>
        </div>

    </main>

</template>

<script>
    export default {
        name: "passwordEdit"
    }
</script>

<style scoped>

</style>
