<template>
    <transition name="fade">
    <div class="sidebar">
        <div class="sidebar-container">

            <h2 class ="f-h2 sidebar-h2">~Menu~</h2>

            <div @click="closeMenu()">
            <router-link to="/mypage">
                <div class="sidebar-item">
                    <i class="far fa-smile fa-2x sidebar-item-logo"></i>
                    <div class="sidebar-item-text">Mypage</div>
                </div>
            </router-link>
            </div>

            <div @click="closeMenu()">
            <router-link to="/post">
                <div class="sidebar-item">
                    <i class="far fa-lightbulb fa-2x sidebar-item-logo"></i>
                    <div class="sidebar-item-text">Post</div>
                </div>
            </router-link>
            </div>

            <div @click="closeMenu()">
            <router-link to="/profile" @click="closeMenu()">
                <div class="sidebar-item">
                    <i class="far fa-address-card fa-2x sidebar-item-logo"></i>
                    <div class="sidebar-item-text">Profile</div>
                </div>
            </router-link>
            </div>

            <div @click="closeMenu()">
            <router-link to="/contact" @click="closeMenu()">
                <div class="sidebar-item">
                    <i class="fas fa-envelope fa-2x sidebar-item-logo"></i>
                    <div class="sidebar-item-text">Contact</div>
                </div>
            </router-link>
            </div>

            <a href="logout" @click="closeMenu">
                <div class="sidebar-item">
                    <i class="fas fa-sign-out-alt fa-2x sidebar-item-logo"></i>
                    <div class="sidebar-item-text">Logout</div>
                </div>
            </a>

        </div>
    </div>
    </transition>
</template>

<script>
    export default {
        name: "SideBarComponent",

        methods:
        {
          closeMenu:function(){
              this.$emit('call-sidebar-switch')
        },
        }
    }
</script>

<style scoped>
    .fade-enter-active, .fade-leave-active {
        transition: opacity 0.8s;
    }

    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
        transition: opacity 0.8s;
        opacity: 0;
    }
</style>
