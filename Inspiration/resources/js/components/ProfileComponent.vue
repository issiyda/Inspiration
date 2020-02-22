<template>
    <main>


        <div class="profile">


            <h2 class="f-h2">プロフィール編集</h2>
            <form class="profile-container">

                <div class="profile-container-input">
                    <div class="profile-container-img">
                        <div class="profile-container-img-left">
                            <label class="c-label" for="img">プロフィール<br>画像</label>
                        </div>
                        <div v-cloak class="profile-container-img-right">
                            <label>
                                <input id="img" @change="onFileChange" class ="c-input profile-container-img-none" type="file" />
                                <i aria-hidden="true" v-show="!profileImg" class="fas fa-plus fa-7x"></i>
                                <img :src="profileImg" v-show="profileImg" alt="profileImg">
                            </label>
                        </div>

                        <div class="error" v-if="errorMessages.imgErrorMessage">{{errorMessages.imgErrorMessage}}</div>



                    </div>

                    <div v-if="ImgChangeState" class="profile-container-img-message">
                        {{profImgChangeMessage}}
                    </div>

                    <div id="withdraw" @click="saveImage()" class="c-button profile-withdraw">
                        プロフ画像に設定
                    </div>





                    <div class="profile-container-input">
                        <label class ="c-label profile-container-input-label" for="name">名前</label>
                        <div v-if="!isNameEdit" @dblclick="isNameEdit = true" class="c-input">{{$store.state.users.name}}</div>
                        <input v-else id="name" @blur="updateName($store.state.users.id,$store.state.users.name)" v-model="$store.state.users.name" class="c-input" type="text" placeholder="（例）だーいし">
                    </div>

                    <div class="error" v-if="errorMessages.nameErrorMessage">{{errorMessages.nameErrorMessage}}</div>


                    <div class="profile-container-input">
                        <label class="c-label" for="mail">e-mail</label>
                        <div v-if="!isEmailEdit" @dblclick="isEmailEdit = true" class="c-input">{{$store.state.users.email}}</div>
                        <input v-else id="mail" @blur="updateEmail($store.state.users.id, $store.state.users.email)" v-model="$store.state.users.email" class="c-input" type="text" placeholder="（例）info@.com" value="{$store.state.users.email}">
                    </div>

                    <div class="error" v-if="errorMessages.emailErrorMessage">{{errorMessages.emailErrorMessage}}</div>




                    <div class="profile-container-input">
                        <label class="c-label" for="introduction">プロフィール文</label>
                        下枠をクリックして編集して下さい
<!--                        <textarea name="" id="profile" class ="c-textarea" cols="30" rows="10" placeholder="自己紹介を記入してください"></textarea>-->
                        <div v-if="!isIntroductionEdit" @dblclick="isIntroductionEdit = true" class="c-input profile-container-textarea">{{$store.state.users.introduction}}</div>
                        <textarea v-else id="introduction" @blur="updateIntroduction($store.state.users.id, $store.state.users.introduction)" v-model="$store.state.users.introduction" class="c-input" type="text" placeholder="（例）お取引よろしくお願いいたします"></textarea>
                    </div>

                    <div class="error" v-if="errorMessages.introductionErrorMessage">{{errorMessages.introductionErrorMessage}}</div>

                    <p><span :class="{'profile-container-validation':this.introductionChangeColor}">{{introductionLength}}</span>/300文字</p>


                    <div class="profile-container-input">
                        <label class="c-label" for="profileDetail">プロフィール詳細</label>
                        <div id="profileDetail" class="c-button profile-withdraw">
                            <router-link :to="{name:'profileDetail',params:{
                            userId:this.$store.state.users.id
                            }}">詳細画面へ</router-link>
                        </div>
                    </div>

                    <div class="profile-container-input">
                        <label class="c-label" for="pass">パスワード変更</label>
                        <div id="pass" class="c-button profile-withdraw">
                            <router-link to="/passEdit">編集する</router-link>
                        </div>
                    </div>

                    <div class="profile-container-input">
                        <label class="c-label" for="withdraw">退会</label>
                        <div id="withdraw" class="c-button profile-withdraw">
                            <router-link to="/withdraw">退会する</router-link>
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

        data: function () {
            return {
                isNameEdit: false,
                isEmailEdit: false,
                // isPasswordEdit: false,
                isIntroductionEdit: false,
                upLoadedImage: "",
                user: {},
                selectedImg: false,
                fileInfo: "",
                profileImg: false,
                profImgChangeMessage: "変更完了しました",
                ImgChangeState: false,

                name: "",
                email: "",
                introduction: "",

                validations: {
                    imgValidation: "",
                    nameValidation: "",
                    emailValidation: "",
                    introductionValidation: "",
                },

                errorMessages: {
                    imgErrorMessage: false,
                    nameErrorMessage: false,
                    emailErrorMessage: false,
                    introductionErrorMessage: false,
                },

                introductionChangeColor:false,



            }

        },

        created() {
            this.$emit('open-loading');
            this.user = this.$store.dispatch('getUsers')
                .then(this.user = this.$store.state.users)
                .then(this.getImg())
            console.log('created');

            // this.img_src = require(this.profileImg);

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

        computed: {},

        methods: {

            /**
             * DBから画像取得
             */
            getImg() {
                if (this.user.img !== null) {
                    this.profileImg = require(`../assets${this.user.img}`)
                }
            },

            onFileChange(event) {
                this.fileInfo = event.target.files[0];
                this.previewImage();
                console.log('onFileChangeFinished')
            },


            previewImage() {
                //画像をプレビュー表示するロジック
                let reader = new FileReader();
                reader.onload = (e) => {
                    this.profileImg = e.target.result
                };
                reader.readAsDataURL(this.fileInfo);
            },

            saveImage() {
                this.errorMessages.imgErrorMessage = ""
                this.$emit('open-loading');

                this.imgValidation();

                if (this.validations.imgValidation === true) {

                    const formData = new FormData();
                    console.log(this.fileInfo);
                    formData.append('file', this.fileInfo);
                    formData.append('user_id', this.$store.state.users.id);

                    axios.post('/api/profileImgUpload', formData)
                        .then((response) => {
                            console.log(response);
                            this.user = response.data;
                            this.user = this.$store.dispatch('getUsers');
                            this.ImgChangeState = true;
                            this.$emit('close-loading');
                        }).catch((error) => {
                        console.log(error);
                    });
                }
            },

            //画像バリデーション
            imgValidation: function () {
                if (this.profileImg === "") {
                    this.validations.imgValidation = false;
                    this.errorMessages.imgErrorMessage = "画像を選択して下さい"
                } else {
                    this.validations.imgValidation = true;
                    this.errorMessages.imgErrorMessage = false
                }
            },

            nameMessage:function()
            {
                this.errorMessages.nameErrorMessage = ""
            },

            updateName: function (id, name) {
                this.$emit('open-loading');
                this.nameValidation();

                //名前のバリデーションが通ってれば保存処理
                if (this.validations.nameValidation === true) {

                    axios.patch('/api/setting/' + id, {id: id, name: name})
                        .then((response) => {
                            this.isNameEdit = false;
                            console.log(response)
                        }).catch((error) => {
                        console.log(error);
                    })
                }
            },

            //名前のバリデーション
            nameValidation: function () {


                if (this.$store.state.users.name === "") {
                    this.validations.nameValidation = false;
                    this.errorMessages.nameErrorMessage = "入力必須です";
                    this.overflowChangeColor = true;

                } else if (this.$store.state.users.name.length > 20) {
                    this.validations.nameValidation = false;
                    this.errorMessages.nameErrorMessage = "20文字以下で入力して下さい"

                } else if (this.$store.state.users.name !== "" && this.$store.state.users.name.length <= 20) {
                    this.validations.nameValidation = true;
                    this.errorMessages.nameErrorMessage = false;
                    this.errorMessages.nameErrorMessage = "変更に成功しました"
                }
                this.$emit('open-loading');
            },


            updateEmail: function (id, email) {
                this.$emit('open-loading');
                this.emailValidation();

                if (this.validations.emailValidation === true) {

                    axios.patch('/api/setting/' + id, {id: id, email: email})
                        .then((response) => {
                            this.isEmailEdit = false;
                            console.log(response);
                        }).catch((error) => {
                        console.log(error);
                    });
                }
                this.$emit('close-loading');
            },

            emailValidation: function () {
                if (this.$store.state.users.email === "") {
                    this.validations.nameValidation = false;
                    this.errorMessages.nameErrorMessage = "入力必須です";
                } else if (this.$store.state.users.email.length > 50) {
                    this.validations.emailValidation = false;
                    this.errorMessages.emailErrorMessage = "50文字以下で入力して下さい"

                } else if (this.$store.state.users.email.match(/.+@.+\..+/) == null) {
                    this.validations.emailValidation = false;
                    this.errorMessages.emailErrorMessage = "Emailの形式で入力して下さい"

                } else if (this.$store.state.users.email !== "" && this.$store.state.users.email.length <= 50 && this.$store.state.users.email.match(/.+@.+\..+/) !== null) {
                    this.validations.emailValidation = true;
                    this.errorMessages.emailErrorMessage = false;
                    this.errorMessages.emailErrorMessage = "変更に成功しました"

                }

            },


            updateIntroduction: function (id, introduction) {
                this.$emit('open-loading');

                this.introductionValidation();

                if (this.validations.introductionValidation === true) {

                    axios.patch('/api/setting/' + id, {id: id, introduction: introduction})
                        .then((response) => {
                            this.isIntroductionEdit = false;
                            console.log(response)
                        }).catch((error) => {
                        console.log(error);
                    });
                }
                this.$emit('close-loading');

            },

            //自己紹介のバリデーション
            introductionValidation() {
                if (this.$store.state.users.introduction === "") {
                    this.validations.introductionValidation = false;
                    this.errorMessages.introductionErrorMessage = "入力必須です";
                    this.introductionChangeColor = true


                } else if(this.$store.state.users.introduction.length > 300) {
                    this.validations.introductionValidation = false;
                    this.errorMessages.introductionErrorMessage = "300文字以下で入力して下さい"
                    this.introductionChangeColor = true

                } else if (this.$store.state.users.introduction !== "" && this.$store.state.users.introduction.length <= 300) {
                    this.validations.introductionValidation = true;
                    this.errorMessages.introductionErrorMessage = false;
                    this.errorMessages.introductionErrorMessage = "変更に成功しました"
                    this.introductionChangeColor = false


                }
            },


            // beforeUpdate() {
            //     this.profileImg this.$store.state.users.img;
            // }


        },

        computed: {


            titleLength() {
                return this.title.length
            },
            overflowLength() {
                return this.overflow.length;
            },
            introductionLength() {
                if(this.$store.state.users.introduction == null) {
                    return 0;
                }else if(this.$store.state.users.introduction){
                    return this.$store.state.users.introduction.length;
                }
            },

        }

    }
</script>

<style scoped>

</style>
