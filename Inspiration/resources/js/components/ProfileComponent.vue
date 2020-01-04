<template>
    <main>

        <div class="profile">
            <h2 class="f-h2">プロフィール編集</h2>

            <form class="profile-container">


                <div class="profile-container-input">
                    <div class="profile-container-img">
                        <div class="profile-container-img-left">
                            <label class ="c-label" for="img">プロフィール画像</label>
                        </div>
                        <div class="profile-container-img-right">
                            <label>
<!--                                <img src="../images/staff6.jpg" alt="">-->
                                <input id="img" class ="c-input profile-container-img-none" type="file" />
                                <!-- hoverしたら画像をアップロードの文字が浮き上がって画像が薄暗く -->
                            </label>
                        </div>
                    </div>


                    <div class="profile-container-input">
                        <label class ="c-label profile-container-input-label" for="name">名前</label>
                        <input id="name" class ="c-input" type="text" placeholder="（例）info@.com">
                    </div>

                    <div class="profile-container-input">
                        <label class ="c-label" for="mail">e-mail</label>
                        <input id="mail" class ="c-input" type="text" placeholder="（例）info@.com">
                    </div>

                    <div class="profile-container-input">
                        <label class ="c-label" for="pass">パスワード</label>
                        <input id="pass" class ="c-input" type="password" placeholder="（例）Jkl439fu">
                    </div>

                    <div class="profile-container-input">
                        <label class ="c-label" for="profile">プロフィール文</label>
                        <textarea name="" id="profile" class ="c-textarea" cols="30" rows="10" placeholder="自己紹介を記入してください"></textarea>
                    </div>

                    <input type="submit" class="c-button">
                </div>
            </form>
        </div>

    </main>
</template>

<script>
    export default {
        name: "ProfileComponent"
    }
</script>

<style scoped>

</style>
