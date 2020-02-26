<template>

    <main>

        <div class="profile">
            <h2 class="f-h2">アイデア編集</h2>

            <form method="post" @submit.prevent="checkValidation()" class="profile-container">


                <div class="profile-container-input">



                    <div class="profile-container-img">
                        <div class="profile-container-img-left">
                            <label class ="c-label" for="img">アイデアイメージ画像</label>
                        </div>
                        <div class="profile-container-img-right">
                            <label>
                                <input id="img" @change="onFileChange" class ="c-input profile-container-img-none" type="file" />
                                <img :src="require(`../assets${img}`)" v-show="!newImage" alt="">
                                <img :src="newImage" v-show="newImage" alt="ideaImg">
                            </label>
                        </div>
                    </div>

                    <div class="profile-container-input">
                        <label class ="c-label" for="title">アイデア名</label>
                        <input id="title" @blur="titleValidation()" v-model="title" class="c-input" type="text" placeholder="（例）だーいし">

                        <div class="error" v-if="errorMessages.titleErrorMessage">{{errorMessages.titleErrorMessage}}</div>
                        <p><span :class="{'profile-container-validation':this.titleChangeColor}">{{titleLength}}</span>/24文字</p>
                    </div>

                    <div class="profile-container-input">

                        <label class ="c-label" for="category">カテゴリー</label>
                        <div id="category" class="c-radio-container">

                            <input id="matching" v-model="category_id" @change="categoryValidation" type="radio" value="1" :checked="category.matching">
                            <label for="matching" class="c-radio" >マッチング</label>

                            <input id="board" v-model="category_id" @change="categoryValidation" class="" type="radio" value="2" :checked="category.board">
                            <label for="board" class="c-radio">掲示板</label>

                            <input id="sns" v-model="category_id" @change="categoryValidation" class="" type="radio" value="3" :checked="category.sns">
                            <label for="sns" class="c-radio">SNS</label>

                            <input id="EC" v-model="category_id" @change="categoryValidation" class="" type="radio" value="4"  :checked="category.ecSite">
                            <label for="EC" class="c-radio">ECサイト</label>

                            <input id="infoplaner" v-model="category_id" @change="categoryValidation" class="" type="radio" value="5" :checked="category.infoPlaner">
                            <label for="infoplaner" class="c-radio">情報発信</label>

                            <input id="sharing" v-model="category_id" @change="categoryValidation" class="" type="radio" value="6" :checked="category.sharing">
                            <label for="infoplaner" class="c-radio">シェアリング</label>

                            <input id="other" v-model="category_id" @change="categoryValidation"  class="" type="radio" value="7" :checked="category.other">
                            <label for="other" class="c-radio">その他</label>

                        </div>

                        <div class="error" v-if="errorMessages.categoryErrorMessage">{{errorMessages.categoryErrorMessage}}</div>

                    </div>

                        <div class="profile-container-input">
                            <label class ="c-label" for="price">価格</label>
                            <input id="price" v-model.number="price" type="number" @blur="priceValidation()" class ="c-input" placeholder="1000000円以内で設定して下さい">
                            <div class="error" v-if="errorMessages.priceErrorMessage">{{errorMessages.priceErrorMessage}}</div>
                        </div>
                    </div>



                    <div class="profile-container-input">
                        <label class ="c-label">概要</label>
                        <textarea name="" v-model="overflow" @blur="overflowValidation()" id="profile" class ="c-textarea" cols="30" rows="10" placeholder="自己紹介を記入してください">{{overflow}}</textarea>
                        <div class="error" v-if="errorMessages.overflowErrorMessage">{{errorMessages.overflowErrorMessage}}</div>
                        <p><span :class="{'profile-container-validation':this.overflowChangeColor}">{{overflowLength}}</span>/100文字</p>
                    </div>



                    <div class="profile-container-input">
                        <label class ="c-label" for="contents">内容</label>
                        <textarea v-model="content" @blur="contentValidation()" id="contents" class ="c-textarea" cols="30" rows="10" placeholder="あなたのアイデアをお待ちしてます">{{content}}</textarea>
                        <div class="error" v-if="errorMessages.contentErrorMessage">{{errorMessages.contentErrorMessage}}</div>
                        <p><span :class="{'profile-container-validation':this.contentChangeColor}">{{contentLength}}</span>/10000文字</p>
                    </div>

                    <div class="error" v-if="errorMessages.submitErrorMessage">{{errorMessages.submitErrorMessage}}</div>

                <div class="profile-container-img-message" v-if="EditResultMessage">{{EditResultMessage}}</div>

                    <input type="submit" class="c-button" value="編集する">

            </form>
        </div>
    </main>
</template>

<script>
    export default {
        name: "PostIdeaEditComponent",

        data: function () {
            return {
                id: "",
                bought_flag: "",
                category_id: "",
                content: "",
                isContentEdit: "",
                delete_flag: "",
                img: "",
                overflow: "",
                isOverflowEdit: "",
                price: "",
                isPriceEdit: "",
                title: "",
                isTitleEdit: true,
                user_id: "",
                category: {
                    matching: "",
                    board: "",
                    sns: "",
                    ecSite: "",
                    infoPlaner: "",
                    sharing:"",
                    other: ""
                },
                EditResultMessage: false,
                fileInfo: "",
                newImage: "",

                //バリデーション部分

                validations: {
                    imgValidation:true,
                    titleValidation:true,
                    categoryValidation:true,
                    priceValidation:true,
                    overflowValidation:true,
                    contentValidation:true,
                },

                errorMessages: {
                    imgErrorMessage: false,
                    titleErrorMessage: false,
                    categoryErrorMessage: false,
                    priceErrorMessage: false,
                    overflowErrorMessage: false,
                    contentErrorMessage: false,
                    submitErrorMessage: false,

                },
                titleChangeColor: false,
                overflowChangeColor: false,
                contentChangeColor: false,

                validationOk: false,
            }
        },


        created: function () {
            this.$emit('open-loading');

            this.id = this.$route.params.id,
                this.bought_flag = this.$route.params.bought_flag,
                this.category_id = this.$route.params.category_id,
                this.content = this.$route.params.content,
                this.delete_flag = this.$route.params.delete_flag,
                this.img = this.$route.params.img,
                this.overflow = this.$route.params.overflow,
                this.price = this.$route.params.price,
                this.title = this.$route.params.title,
                this.user_id = this.$route.params.user_id,
                this.categoryCheck();
        },

        mounted: function () {
            this.$emit('close-loading');
        },


        methods: {
            categoryCheck: function () {
                if (this.category_id === 1) {
                    this.category.matching = true
                } else if (this.category_id === 2) {
                    this.category.board = true
                }
                if (this.category_id === 3) {
                    this.category.sns = true
                }
                if (this.category_id === 4) {
                    this.category.ecSite = true
                }
                if (this.category_id === 5) {
                    this.category.infoPlaner = true
                }
                if (this.category_id === 6) {
                    this.category.sharing = true
                }
                if (this.category_id === 7) {
                    this.category.other = true
                }
            },

            onFileChange(event) {
                this.fileInfo = event.target.files[0]
                this.createImage();
            },

            createImage() {
                //画像をプレビュー表示するロジック
                let reader = new FileReader();
                reader.onload = (e) => {
                    this.newImage = e.target.result
                };
                reader.readAsDataURL(this.fileInfo);
            },

            saveImage(){

                const formData = new FormData()
                console.log(this.fileInfo);
                formData.append('file',this.fileInfo);

                axios.post('/api/profileImgUpload',formData)
                    .then(response =>{
                        console.log(response)
                    }).catch((error)=>{
                    console.log(error)
                })
            },

            //画像バリデーション
            imgValidation: function () {
                if (this.ideaImage === "") {
                    this.validations.imgValidation = false;
                    this.errorMessages.imgErrorMessage = "＋をクリックして画像を選択して下さい"
                } else {
                    this.validations.imgValidation = true;
                    this.errorMessages.imgErrorMessage = false
                }
            },

            //
            titleValidation: function () {
                if (this.title === "") {
                    this.validations.titleValidation = false;
                    this.errorMessages.titleErrorMessage = "入力必須です"
                    this.titleChangeColor = true;

                } else if (this.titleLength > 24) {

                    this.validations.titleValidation = false;
                    this.errorMessages.titleErrorMessage = "24文字以下で記入して下さい";
                    this.titleChangeColor = true
                } else if (this.titleLength <= 24 && this.title !== "") {
                    this.validations.titleValidation = true;
                    this.errorMessages.titleErrorMessage = false;
                    this.titleChangeColor = false
                }
            },

            //カテゴリーのバリデーション
            categoryValidation: function () {
                if (this.category_id === "") {

                    this.validations.categoryValidation = false;
                    this.errorMessages.categoryErrorMessage = "入力必須です"

                } else {

                    this.validations.categoryValidation = true;
                    this.errorMessages.categoryErrorMessage = false;

                }
            },
            //価格のバリデーション
            priceValidation: function () {

                if (this.price === "") {
                    this.validations.priceValidation = false;
                    this.errorMessages.priceErrorMessage = "入力必須です"
                } else if (this.price > 1000000) {
                    this.validations.priceValidation = false;
                    this.errorMessages.priceErrorMessage = "100万円以下で設定して下さい"
                } else if (this.price <= 1000000 && this.price !== "") {
                    this.validations.priceValidation = true;
                    this.errorMessages.priceErrorMessage = false;

                }
            },
            //概要のバリデーション
            overflowValidation: function () {
                if (this.overflow === "") {
                    this.validations.overflowValidation = false;
                    this.errorMessages.overflowErrorMessage = "入力必須です"
                    this.overflowChangeColor = true;

                } else if (this.overflowLength > 100) {
                    this.validations.overflowValidation = false;
                    this.errorMessages.overflowErrorMessage = "100文字以下で入力して下さい"
                    this.overflowChangeColor = true;

                } else if (this.overflowLength <= 100 && this.overflow !== "") {
                    this.validations.overflowValidation = true;
                    this.errorMessages.overflowErrorMessage = false;
                    this.overflowChangeColor = false

                }
            },
            //内容のバリデーション
            contentValidation: function () {
                if (this.content === "") {
                    this.validations.contentValidation = false;
                    this.errorMessages.contentErrorMessage = "入力必須です"
                    this.contentChangeColor = true;

                } else if (this.contentLength > 10000) {
                    this.validations.contentValidation = false;
                    this.errorMessages.contentErrorMessage = "10000文字以下で入力して下さい"
                    this.contentChangeColor = true;
                } else if (this.contentLength <= 10000 && this.content !== "") {
                    this.validations.contentValidation = true;
                    this.errorMessages.contentErrorMessage = false;
                    this.contentChangeColor = false

                }
            },

            //確認用バリデーション
            checkValidation: function () {
                this.imgValidation();
                this.titleValidation();
                this.priceValidation();
                this.categoryValidation();
                this.overflowValidation();
                this.contentValidation();

                //submitOkメソッドでエラーがないか確認
                if (this.submitOk === true) {
                    this.editIdeaSave();

                    //エラーがあればメッセージ
                } else{
                    this.errorMessages.submitErrorMessage = "エラーがあります"
                }
            },


            editIdeaSave() {
                const formData = new FormData();
                formData.append('file', this.fileInfo);
                formData.append('idea_id', this.id);
                formData.append('category_id', this.category_id);
                formData.append('overflow', this.overflow);
                formData.append('content', this.content);
                formData.append('price', this.price);
                formData.append('title', this.title);

                axios.post('/api/ideaEdit', formData, {
                    headers: {
                        'content-type': 'multipart/form-data'
                    },
                }).then((response) => {
                    console.log(response);
                    this.ideas = this.$store.dispatch('getUserIdeas')
                    this.EditResultMessage = "編集に成功しました"
                }).catch((error) => {
                    console.log(error)
                    this.EditResultMessage = "編集に失敗しました。\n" +
                        "時間を置いてお試し下さい"
                })


            }
        },

        computed: {
            titleLength() {
                return this.title.length
            },
            overflowLength() {
                return this.overflow.length;
            },
            contentLength() {
                return this.content.length;
            },
            submitOk: function () {
                if (
                    this.validations.imgValidation === true &&
                    this.validations.categoryValidation === true &&
                    this.validations.contentValidation === true &&
                    this.validations.overflowValidation === true &&
                    this.validations.imgValidation === true &&
                    this.validations.contentValidation === true
                )
                    return true
            },
        },

        watch: {
            ideaImage: function () {
                if (this.ideaImages !== "") {
                    this.validations.imgValidation = true;
                    this.errorMessages.imgErrorMessage = ""
                }
            },
            submitOk:function(){
                if(this.submitOk === true)
                {
                    this.errorMessages.submitErrorMessage =false;
                }
            },
        }
    }
</script>





<style scoped>

</style>

