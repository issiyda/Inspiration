<template>
    <main>


        <div class="profile">


            <h2 class="f-h2">アカウント詳細</h2>
            <form class="profile-container">

                <div class="profile-container-input">
                    <div class="profile-container-img">
                        <div class="profile-container-img-left">
                            <label class ="c-label" for="img">プロフィール画像</label>
                        </div>
                        <div v-cloak class="profile-container-img-right">
                            <label>
                                <i aria-hidden="true" v-show="this.profileImg" class="fas fa-plus fa-7x"></i>
                                <img :src="profileImg"   v-show="!this.profileImg" alt="">
                                <input id="img" @change="onFileChange()" class ="c-input profile-container-img-none" type="file" />
                                <!-- hoverしたら画像をアップロードの文字が浮き上がって画像が薄暗く -->
                            </label>
                        </div>
                    </div>



                    <div class="profile-container-input">
                        <label class ="c-label profile-container-input-label" for="name">名前</label>
                        <div id="name" class="c-input" type="text">{{$store.state.users.name}}</div>
                    </div>

                    <div class="profile-container-input">
                        <label class ="c-label" for="mail">e-mail</label>
                        <div id="mail" class="c-input" type="text">{{$store.state.users.email}}</div>
                    </div>





                    <div class="profile-container-input">
                        <label class ="c-label" for="introduction">プロフィール文</label>
                        <!--                        <textarea name="" id="profile" class ="c-textarea" cols="30" rows="10" placeholder="自己紹介を記入してください"></textarea>-->
                        <div id="introduction" class="c-input profile-container-textarea" type="text">{{$store.state.users.introduction}}</div>
                    </div>




                </div>
            </form>
        </div>

    </main>
</template>

<script>
    export default {
        name: "ProfileDetailComponent",

        data: function () {
            return {
                isNameEdit: false,
                isEmailEdit: false,
                // isPasswordEdit: false,
                isIntroductionEdit: false,
                upLoadedImage: "",
                user: [],
                selectedImg: false,
                fileInfo: "",
                profileImg: false,


            }

        },

        created() {
            this.user = this.$store.dispatch('getUsers')
            // this.user = this.$store.state.users
            console.log('created');

            // this.img_src = require(this.profileImg);
            this.getImg()

        },

        mounted() {
            // this.profileImg = require(this.$store.state.users.img);
            // this.$store.state.users.password
            // がnullやったら白抜き
            // 値アレば$store.state.users.password
            console.log('mounted')


        },

        beforeUpdate() {
            this.$emit('close-loading');
        },

        computed:{

        },

        methods: {

            /**
             * DBから画像取得
             */
            getImg(){

            },

            onFileChange(event) {
                this.fileInfo = event.target.files[0];
                this.fileUpload()
                this.createImage();
            },


            createImage() {
                //画像をプレビュー表示するロジック
                let reader = new FileReader();
                reader.onload = (e) => {
                    this.profileImg = e.target.result
                };
                reader.readAsDataURL(this.fileInfo);
            },

            fileUpload() {
                const formData = new FormData();

                formData.append('file', this.fileInfo);

                axios.post('/api/fileUpload', formData)
                    .then((response) => {
                        console.log(response);
                        this.user = response.data;
                        if (response.data.img) this.selectedImg = true;
                    }).catch((error) => {
                    console.log(error);
                });

            },


            updateEmail: function (id, email) {
                axios.patch('/api/setting/' + id, {id: id, email: email})
                    .then((response) => {
                        this.isEmailEdit = false;
                        console.log(response);
                    }).catch((error) => {
                    console.log(error);
                });
            },

            updateName: function (id, name) {
                axios.patch('/api/setting/' + id, {id: id, name: name})
                    .then((response) => {
                        this.isNameEdit = false;
                        console.log(response)
                    }).catch((error) => {
                    console.log(error);
                })
            },

            // updatePass: function(id,password) {
            //     axios.patch('/api/setting/' + id, {id: id, password: password})
            //         .then((response) => {
            //         this.isPasswordnEdit = false;
            //         console.log(response);
            //     }).catch((error) => {
            //         console.log(error);
            //     });
            // },
            //
            updateIntroduction: function (id, introduction) {
                axios.patch('/api/setting/' + id, {id: id, introduction: introduction})
                    .then((response) => {
                        this.isIntroductionEdit = false;
                        console.log(response)
                    }).catch((error) => {
                    console.log(error);
                });
            }
        },



        // beforeUpdate() {
        //     this.profileImg this.$store.state.users.img;
        // }


    }
</script>




<style scoped>

</style>
