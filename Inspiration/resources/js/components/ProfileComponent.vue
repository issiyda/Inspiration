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
                                <img v-if="selectedImg" :src="this.$store.state.users.img" alt="">
                                <img v-else src="../../../public/storage/ENNLkLbUcAAeqUc.jpeg" alt="">
                                <input id="img" @change="fileSelected" class ="c-input profile-container-img-none" type="file" />
                                <!-- hoverしたら画像をアップロードの文字が浮き上がって画像が薄暗く -->
                            </label>
                            <button @click="fileUpload($store.state.users.id)"></button>

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
                        <label class ="c-label" for="pass">パスワード</label>
<!--                        <input id="pass" class ="c-input" type="password" placeholder="（例）Jkl439fu">-->
                        <div v-if="!isPassEdit" @dblclick="isPassEdit = true" class="c-input" type="text" placeholder="AMdi78nv6" value="{$store.state.users.password}">{{$store.state.users.password}}</div>
                        <input v-else id="pass" @blur="updatePass($store.state.users.id, $store.state.users.password)" v-model="$store.state.users.password" class="c-input" type="text" placeholder="（例）Abdj78Kl" value="{$store.state.users.password}">
                    </div>

                    <div class="profile-container-input">
                        <label class ="c-label" for="introduction">プロフィール文</label>
<!--                        <textarea name="" id="profile" class ="c-textarea" cols="30" rows="10" placeholder="自己紹介を記入してください"></textarea>-->
                        <div v-if="!isIntroductionEdit" @dblclick="isIntroductionEdit = true" class="c-input profile-container-textarea" type="text" placeholder="（例）お取引よろしくお願いいたします" value="{$store.state.users.introduction}">{{$store.state.users.introduction}}</div>
                        <textarea v-else id="introduction" @blur="updateIntroduction($store.state.users.id, $store.state.users.introduction)" v-model="$store.state.users.introduction" class="c-input" type="text" placeholder="（例）お取引よろしくお願いいたします">{$store.state.users.introduction}</textarea>
                    </div>

                    <div class="c-button">
                        <router-link to="/profile">投稿</router-link>
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
                isPasswordEdit: false,
                isIntroductionEdit: false,
                selectedImg: true,
                fileInfo:"",
                img:"",
                user:"",


        }

        },

        methods:{
            /**
             * ページ読み込みできるメソッド
             */
            reset: function () {
                this.$router.go({path: this.$router.currentRoute.path, force: true});
            },

            uploadImg: function(){

            },

            selectImg(){
                if(this.$store.state.users.img === null){
                    this.selectedImg = false;
                }
            },


            fileSelected(event){
                    this.fileInfo = event.target.files[0];
                    console.log(event);
            },

            fileUpload(){
                const formData = new FormData();

                formData.append('file',this.fileInfo);

                axios.post('/api/fileupload',formData)
                    .then((response) =>{
                    console.log(response);
                        this.user = response.data;
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

        mounted() {
            this.$store.dispatch('getUsers');
            this.getImg();

            // this.$store.state.users.password
            // がnullやったら白抜き
            // 値アレば$store.state.users.password


        },

        created() {
            this.selectImg();
        },



    }
</script>

<style scoped>

</style>
