<template>
    <main>


        <div class="profile">


            <h2 class="f-h2">アカウント詳細</h2>
            <form class="profile-container">

                <div class="profile-container-input">
                    <div class="profile-container-img">
                        <div class="profile-container-img-left">
                            <label class ="c-label">プロフィール画像</label>
                        </div>
                        <div v-cloak class="profile-container-img-right">
                            <label>
                                <img v-if="profileImg !== './imgnull'" :src="profileImg" alt="profileImg">
                                <img v-cloak v-else :src="`./img/images/account.jpeg`" alt="profileImgNull">
                            </label>
                        </div>
                    </div>



                    <div class="profile-container-input">
                        <label class ="c-label profile-container-input-label" for="name">名前</label>
                        <div id="name" class="c-input" type="text">{{profile.name}}</div>
                    </div>


                    <div class="profile-container-input">
                        <label class ="c-label" for="introduction">プロフィール文</label>
                        <div id="introduction" class="c-input profile-container-textarea" type="text">{{profile.introduction}}</div>
                    </div>




                </div>
            </form>
        </div>

    </main>
</template>

<script>
    export default {
        name: "ProfileDetailComponent",

        title: "プロフィール詳細",

        data: function () {
            return {

                profile:{},
                profileImg:null,
            }


        },

        created() {
            this.$emit('open-loading');
            this.user = this.$store.dispatch('getUsers')
            // this.user = this.$store.state.users
            console.log('created');



        },

        mounted() {
            axios.get('/api/profileDetail', {
                params: {
                    userId: this.$route.params.userId
                }
            })
                .then((response) => {
                    console.log(response);
                    this.profile = response.data.profile;
                }).catch((error) => {
                console.log(error)
            });
            console.log('mounted')

        },

        beforeUpdate() {
            this.$emit('close-loading');
        },

        computed:{


        },

        methods: {

        },

        watch:{

            profile:function(){

                this.profileImg = `./img${this.profile.img}`
            }
        },

    }
</script>




<style scoped>

</style>
