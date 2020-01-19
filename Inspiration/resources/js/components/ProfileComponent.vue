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
                        <div v-cloak class="profile-container-img-right">
                            <label>
                                <i aria-hidden="true" v-show="this.profileImg" class="fas fa-plus fa-7x"></i>
                                <img :src="this.profileImg"  v-show="this.profileImg" alt="">
                                <input id="img" @change="onFileChange()" class ="c-input profile-container-img-none" type="file" />
                                <!-- hoverしたら画像をアップロードの文字が浮き上がって画像が薄暗く -->
                            </label>
                        </div>
                    </div>


                    <div class="profile-container-input">
                        <label class ="c-label profile-container-input-label" for="name">名前</label>
                        <div v-if="!isNameEdit" @dblclick="isNameEdit = true" class="c-input" type="text" placeholder="（例）だーいし" value="{$store.state.users.name}">{{$store.state.users.name}}</div>
                        <input v-else id="name" @blur="updateName($store.state.users.id, $store.state.users.name)" v-model="$store.state.users.name" class="c-input" type="text" placeholder="（例）だーいし" value="{$store.state.users.name}">
                    </div>

                    <div class="profile-container-input">
                        <label class ="c-label" for="mail">e-mail</label>
                        <div v-if="!isEmailEdit" @dblclick="isEmailEdit = true" class="c-input" type="text" placeholder="（例）info@.com" value="{$store.state.users.email}">{{$store.state.users.email}}</div>
                        <input v-else id="mail" @blur="updateEmail($store.state.users.id, $store.state.users.email)" v-model="$store.state.users.email" class="c-input" type="text" placeholder="（例）info@.com" value="{$store.state.users.email}">
                    </div>





                    <div class="profile-container-input">
                        <label class ="c-label" for="introduction">プロフィール文</label>
<!--                        <textarea name="" id="profile" class ="c-textarea" cols="30" rows="10" placeholder="自己紹介を記入してください"></textarea>-->
                        <div v-if="!isIntroductionEdit" @dblclick="isIntroductionEdit = true" class="c-input profile-container-textarea" type="text" placeholder="（例）お取引よろしくお願いいたします" value="{$store.state.users.introduction}">{{$store.state.users.introduction}}</div>
                        <textarea v-else id="introduction" @blur="updateIntroduction($store.state.users.id, $store.state.users.introduction)" v-model="$store.state.users.introduction" class="c-input" type="text" placeholder="（例）お取引よろしくお願いいたします">{$store.state.users.introduction}</textarea>
                    </div>

                    <div class="profile-container-input">
                        <label class ="c-label" for="pass">パスワード</label>
                        <div id="pass" class="c-button profile-withdraw">
                            <router-link to="/passEdit">パスワード編集画面へ</router-link>
                        </div>
                    </div>

                    <div class="profile-container-input">
                        <label class ="c-label" for="withdraw">退会</label>
                        <div id="withdraw" class="c-button profile-withdraw">
                            <router-link to="/withdraw">退会画面へ</router-link>
                        </div>
                    </div>


                </div>
            </form>
        </div>

    </main>
</template>

<script>
    export default {
        name: "ProfileComponent",

        data: function(){
            return {
                isNameEdit: false,
                isEmailEdit: false,
                // isPasswordEdit: false,
                isIntroductionEdit: false,
                upLoadedImage:"",
                user:[],
                selectedImg: false,
                fileInfo:"",
                profileImg:''



            }

        },

        methods:{
            /**
             * ページ読み込みできるメソッド
             */

            load: function() {
                console.log('loaded');
            },




            onFileChange(event){
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

            fileUpload(){
                const formData = new FormData();

                formData.append('file',this.fileInfo);

                axios.post('/api/fileUpload',formData)
                    .then((response) =>{
                    console.log(response);
                        this.user = response.data;
                        if(response.data.img) this.selectedImg = true;
                    }).catch((error) =>{
                    console.log(error);
                });

            },


            updateEmail: function(id,email){
                axios.patch('/api/setting/' + id,{id:id ,email: email})
                    .then((response) =>{
                        this.isEmailEdit = false;
                        console.log(response);
                    }).catch((error) =>{
                        console.log(error);
                    });
            },

            updateName: function(id,name){
                axios.patch('/api/setting/' + id,{id:id ,name: name})
                    .then((response) =>{
                        this.isNameEdit = false;
                        console.log(response)
                    }).catch((error) =>{
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
            updateIntroduction: function(id,introduction){
                    axios.patch('/api/setting/' + id, {id: id, introduction: introduction})
                        .then((response) => {
                            this.isIntroductionEdit = false;
                            console.log(response)
                        }).catch((error) => {
                        console.log(error);
                    });
                }
        },

        created() {
            this.user = this.$store.dispatch('getUsers');
            this.user = this.$store.state.users;
            this.profileImg = this.$store.state.users.img;
            console.log('created')

        },

        mounted() {

            // this.$store.state.users.password
            // がnullやったら白抜き
            // 値アレば$store.state.users.password
            console.log('mounted')



        },

        computed: {
            userimg:function() {
                return this.$store.state.users
            }
        },

        beforeUpdate(){
            this.profileImg = this.$store.state.users.img;
    },





    }
</script>

<style scoped>

</style>
