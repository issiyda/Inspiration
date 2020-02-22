<template>
    <footer>

        <div class="l-footer">
            <h3 class="l-footer-subject">Inspiration</h3>
            <div class="l-footer-container">

                <div class="l-footer-content">
                    <div class="l-footer-content-items">
                        <h3>機能Menu</h3>
                        <p><router-link to="/mypage">Mypage</router-link></p>
                        <p><router-link to="/allIdea">Idea一覧</router-link></p>
                        <p><router-link to="/profile">プロフィール編集</router-link></p>
                    </div>
                </div>

                <div class="l-footer-content">
                    <div class="l-footer-content-items">
                        <h3>ページMenu</h3>
                        <p><a href="/">Topへ戻る</a></p>
                        <p><a href="logout">ログアウトする</a></p>
                    </div>
                </div>

            </div>

            <div class="l-footer-bottom">
                <div class="l-footer-copyRight">
                    Copyright © 2019 Inspiration. All rights reserved.
                </div>
            </div>

        </div>

    </footer>
</template>

<script>
    export default {
        name: "FooterComponent",
        mounted() {
            console.log('FooterComponent mounted.')
        }
    }
</script>

<style scoped>

</style>
