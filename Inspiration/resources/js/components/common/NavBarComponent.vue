<template>
    <div>
    <div class ="nav">

        <div class="nav-title">
            Inspiration
        </div>

        <div class="nav-trigger js-toggle-sp-menu">
            <span></span>
            <span></span>
            <span></span>
        </div>

        <div class="nav-sp">

            <div class ="nav-heading">
                <h2 class ="f-h2">Menu</h2>
            </div>

            <ul class ="nav-container">
                <li class ="nav-item"><a href="home">Home</a></li>
                <li class ="nav-item"><router-link to="/mypage">Mypage</router-link></li>
                <li class ="nav-item"><router-link to="/post">Post</router-link></li>
                <li class ="nav-item"><router-link to="/profile">Profile</router-link></li>
<!--                <li class ="nav-item"><a href="{{route('logout')}}"></a></li>-->
            </ul>

<!--            <ul class ="nav-container">-->
<!--                <li class ="nav-item"><a href="">Top</a></li>-->
<!--                <li class ="nav-item"><a href="#">Mypage</a></li>-->
<!--                <li class ="nav-item"><a href="#">Post</a></li>-->
<!--                <li class ="nav-item"><a href="#">Profile</a></li>-->
<!--                <li class ="nav-item"><a href="#">Logout</a></li>-->
<!--            </ul>-->

        </div>



    </div>

    <div class="nav-height"></div>

    </div>

</template>

<script>
    export default {
        name: "NavBarComponent",

        mounted() {
            console.log('NavbarComponent mounted.')
            this.user = this.$store.dispatch('getUsers');
        }

    }
</script>

<style scoped>

</style>
