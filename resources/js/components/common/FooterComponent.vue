<template>
    <footer>

        <div class="l-footer">
            <h3 class="l-footer-subject">Menu</h3>
            <div class="l-footer-container">

                <div class="l-footer-content">
                    <div class="l-footer-content-items">
                        <p><router-link to="/mypage">
                            <i class="far fa-smile fa-2x sidebar-item-logo"></i>
                            Mypage</router-link></p>
                        <p><router-link to="/allIdea">
                            <i class="far fa-address-card fa-2x sidebar-item-logo"></i>
                            Idea一覧</router-link></p>
                        <p><router-link to="/profile">
                            <i class="far fa-address-card fa-2x sidebar-item-logo"></i>
                            Profile</router-link></p>
                    </div>
                </div>

                <div class="l-footer-content">
                    <div class="l-footer-content-items">
                        <p><a href="/">
                            <i class="fas fa-home fa-2x sidebar-item-logo"></i>
                            Home</a></p>
                        <p><a href="logout">
                            <i class="fas fa-sign-out-alt fa-2x sidebar-item-logo"></i>
                            Logout</a></p>
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
