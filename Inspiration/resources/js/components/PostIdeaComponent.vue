<template>

    <main>

        <div class="profile">
            <h2 class="f-h2">アイデア投稿</h2>

            <form method="post" class="profile-container" @submit.prevent="checkValidation()">


                <div class="profile-container-input">


                    <div class="profile-container-img">
                        <div class="profile-container-img-left">
                            <label class ="c-label" for="img">アイデアイメージ画像</label>
                        </div>
                        <div class="profile-container-img-right">
                            <label>
                                <input id="img" @change="onFileChange" v-bind="img" class="c-input profile-container-img-none" type="file" />
                                <i aria-hidden="true" v-show="!ideaImage" class="fas fa-plus fa-7x"></i>
                                <img :src="ideaImage" v-show="ideaImage" alt="">
                            </label>
                        </div>
                    </div>

                    <div class="error" v-if="errorMessages.imgErrorMessage">{{errorMessages.imgErrorMessage}}</div>


                    <div class="profile-container-input">
                        <label class ="c-label" for="title">アイデア名</label>
                        <input id="title" name="title" @blur="titleValidation()" v-model="title" class ="c-input" type="text" placeholder="（例）黄金の1hを生み出す方法">

                        <div class="error" v-if="errorMessages.titleErrorMessage">{{errorMessages.titleErrorMessage}}</div>

                        <p><span :class="{'profile-container-validation':this.titleChangeColor}">{{titleLength}}</span>/24文字</p>
                    </div>




                    <div class="profile-container-input">

                        <label class ="c-label" for="category">カテゴリー</label>
                        <div class="c-radio-container">

                            <input id="matching" v-model="category_id" @change="categoryValidation"  name="category"  type="radio" value=1>
                            <label for="matching" class="c-radio">マッチング</label>

                            <input id="board" v-model="category_id" @change="categoryValidation"  name="category" class ="" type="radio" value=2>
                            <label for="board" class="c-radio">掲示板</label>

                            <input id="sns" v-model="category_id" @change="categoryValidation" name="category" class ="" type="radio" value=3>
                            <label for="sns" class="c-radio">SNS</label>

                            <input id="EC" v-model="category_id" @change="categoryValidation"  name="category" class ="" type="radio" value=4>
                            <label for="EC" class="c-radio">ECサイト</label>

                            <input id="infoplaner" v-model="category_id" @change="categoryValidation"  name="category" class="" type="radio" value=5>
                            <label for="infoplaner" class="c-radio">情報発信</label>

                            <input id="sharing" v-model="category_id" @change="categoryValidation"  name="category" class="" type="radio" value=6>
                            <label for="sharing" class="c-radio">シェアリング</label>

                            <input id="other" v-model="category_id" @change="categoryValidation"  name="category" class="" type="radio" value=7>
                            <label for="other" class="c-radio">その他</label>


                        </div>

                        <div class="error" v-if="errorMessages.categoryErrorMessage">{{errorMessages.categoryErrorMessage}}</div>

                    </div>

                    <div class="profile-container-input">
                        <label class ="c-label" for="price">価格</label>
                        <input id="price" v-model.number="price" type="number" @blur="priceValidation()" class ="c-input" placeholder="1000000円以内で設定して下さい">円

                        <div class="error" v-if="errorMessages.priceErrorMessage">{{errorMessages.priceErrorMessage}}</div>

                    </div>



                    <div class="profile-container-input">
                        <label class ="c-label" for="profile">概要</label>
                        <textarea name="" v-model="overflow" @blur="overflowValidation()"id="profile" class ="c-textarea" cols="30" rows="10" placeholder="自己紹介を記入してください"></textarea>
                        <div class="error" v-if="errorMessages.overflowErrorMessage">{{errorMessages.overflowErrorMessage}}</div>
                        <p><span :class="{'profile-container-validation':this.overflowChangeColor}">{{overflowLength}}</span>/100文字</p>
                    </div>


                    <div class="profile-container-input">
                        <label class ="c-label" for="contents">内容</label>
                        <textarea name="" v-model="content" @blur="contentValidation()" id="contents" class ="c-textarea" cols="30" rows="10" placeholder="あなたのアイデアをお待ちしてます"></textarea>
                        <div class="error" v-if="errorMessages.contentErrorMessage">{{errorMessages.contentErrorMessage}}</div>
                        <p><span :class="{'profile-container-validation':this.contentChangeColor}">{{contentLength}}</span>/10000文字</p>

                    </div>

                    <div class="error" v-if="errorMessages.submitErrorMessage">{{errorMessages.submitErrorMessage}}</div>


                        <input type="submit" class ="c-button" value="確認する">

                </div>
            </form>
        </div>

    </main>

</template>

<script>
    import {mapState} from "vuex";

    export default {
        name: "PostIdeaComponent",

        data:function () {
            return{
                img:'',
                title:'',
                category_id:'',
                price:"",
                overflow:'',
                content:'',
                ideaImage:"",
                fileInfo:"",

                validations:{
                    imgValidation:"",
                    titleValidation:"",
                    categoryValidation:"",
                    priceValidation:"",
                    overflowValidation:"",
                    contentValidation:"",
                },

                errorMessages:{
                    imgErrorMessage:false,
                    titleErrorMessage:false,
                    categoryErrorMessage:false,
                    priceErrorMessage:false,
                    overflowErrorMessage:false,
                    contentErrorMessage:false,
                    submitErrorMessage:"",
                },
                titleChangeColor:false,
                overflowChangeColor:false,
                contentChangeColor:false,

                validationOk:false,
            }

        },

        created:function()
        {
            this.$emit('open-loading');
            this.fileInfo = this.$route.params.fileInfo
            this.user = this.$store.dispatch('getUsers');
            this.title = this.$route.params.title;
            this.category_id = this.$route.params.category_id;
            this.price = this.$route.params.price;
            this.overflow = this.$route.params.overflow;
            this.content = this.$route.params.content;
            this.ideaImage = this.$route.params.img;
        },

        mounted() {
            console.log('PostIdeaComponent mounted.');
            this.user = this.$store.dispatch('getUsers');
            this.$emit('close-loading');
        },

        beforeUpdate() {
        },

        methods: {


            onFileChange(event){
                this.$emit('open-loading');
                this.fileInfo = event.target.files[0]
                this.createImage()
            },

            createImage() {
                //画像をプレビュー表示するロジック
                let reader = new FileReader();
                reader.onload = (e) => {
                    this.ideaImage = e.target.result
                };
                reader.readAsDataURL(this.fileInfo);
                this.$emit('close-loading');
            },

            //画像バリデーション
            imgValidation:function(){
                var here = this
                this.errorMessages.imgErrorMessage = false
                if(this.ideaImage === undefined || this.ideaImage ==="" ) {
                    this.validations.imgValidation = false;
                    this.errorMessages.imgErrorMessage ="＋をクリックして画像を選択して下さい"
                }else {
                    this.validations.imgValidation = true;
                    this.errorMessages.imgErrorMessage = false
                }
            },

            //
            titleValidation:function(){
                this.errorMessages.titleErrorMessage = false;
                if(this.title === undefined || this.title ===""){
                    this.validations.titleValidation = false;
                    this.errorMessages.titleErrorMessage ="入力必須です"
                    this.titleChangeColor = true;

                }else if(this.titleLength > 24){

                    this.validations.titleValidation = false;
                    this.errorMessages.titleErrorMessage ="24文字以下で記入して下さい";
                    this.titleChangeColor = true
                }

                else if(this.titleLength <= 24 && this.title !== "") {
                    this.validations.titleValidation = true;
                    this.errorMessages.titleErrorMessage = false;
                    this.titleChangeColor = false
                }
            },

            //カテゴリーのバリデーション
            categoryValidation:function() {

                this.errorMessages.categoryErrorMessage =false

                if (this.category_id === undefined || this.category_id ==="") {
                    this.validations.categoryValidation = false;
                    this.errorMessages.categoryErrorMessage ="入力必須です"
                } else {
                    this.validations.categoryValidation = true;
                    this.errorMessages.categoryErrorMessage = false;
                }
            },
            //価格のバリデーション
            priceValidation:function(){

                this.errorMessages.priceErrorMessage = false;

                if(this.price === undefined || this.price ==="") {
                    this.validations.priceValidation = false;
                    this.errorMessages.priceErrorMessage ="数値を入力して下さい"
                }else if(this.price > 1000000){
                    this.validations.priceValidation = false;
                    this.errorMessages.priceErrorMessage ="100万円以下で設定して下さい"
                }
                else if(this.price <=  1000000 && this.price !== "") {
                    this.validations.priceValidation = true;
                    this.errorMessages.priceErrorMessage = false;

                }
            },
            //概要のバリデーション
            overflowValidation:function(){

                if(this.overflow === undefined || this.overflow ==="") {
                    this.validations.overflowValidation =false;
                    this.errorMessages.overflowErrorMessage ="入力必須です"
                    this.overflowChangeColor = true;

                }else if(this.overflowLength > 100){
                    this.validations.overflowValidation = false;
                    this.errorMessages.overflowErrorMessage ="100文字以下で入力して下さい"
                    this.overflowChangeColor = true;

                }

                else if(this.overflowLength <= 100 && this.overflow !== "") {
                    this.validations.overflowValidation = true;
                    this.errorMessages.overflowErrorMessage =false;
                    this.overflowChangeColor = false

                }
            },
            //内容のバリデーション
            contentValidation:function(){
                if(this.content === undefined || this.content ==="") {
                    this.validations.contentValidation =false;
                    this.errorMessages.contentErrorMessage ="入力必須です"
                    this.contentChangeColor = true;

                }else if(this.contentLength > 10000){
                    this.validations.contentValidation = false;
                    this.errorMessages.contentErrorMessage ="10000文字以下で入力して下さい"
                    this.contentChangeColor = true;
                }

                else if(this.contentLength <= 10000 && this.content !== "") {
                    this.validations.contentValidation = true;
                    this.errorMessages.contentErrorMessage =false;
                    this.contentChangeColor = false

                }
            },

            //確認用バリデーション
            checkValidation:function()
            {
                this.errorMessages.submitErrorMessage = "";

                this.imgValidation();
                this.titleValidation();
                this.priceValidation();
                this.categoryValidation();
                this.overflowValidation();
                this.contentValidation();

                //submitOkメソッドでエラーがないか確認
                if(this.submitOk === true)
                {
                    this.formSubmit();

                //エラーがあればメッセージ
                }else if(this.submitOk === false){
                    this.errorMessages.submitErrorMessage = "エラーがあります"
                }

            },



            //Form送信のためのメソッド
            formSubmit:function() {
                this.$router.push({name:'postConfirm',params:{
                fileInfo: this.fileInfo,
                img: this.ideaImage,
                title:this.title,
                category_id:this.category_id,
                price:this.price,
                overflow:this.overflow,
                content:this.content,
            }})
            }
        },

        computed:{
           userId(){
               return this.$store.state.users.id
           },

            titleLength(){
               if(this.title !==undefined)
               return this.title.length
            },
            overflowLength(){
                if(this.overflow !==undefined)
               return this.overflow.length;
            },
            contentLength(){
                if(this.content !==undefined)
               return this.content.length;
            },

            submitOk:function(){
                if(
                    this.validations.imgValidation === true &&
                    this.validations.categoryValidation === true &&
                    this.validations.contentValidation === true &&
                    this.validations.overflowValidation === true &&
                    this.validations.imgValidation ===true &&
                    this.validations.contentValidation === true
                ) {
                    return true
                }else{
                    return false
                }
            },
        },

        watch:{
            ideaImage:function()
            {
                if(this.ideaImages !== "")
                {
                    this.validations.imgValidation = true;
                    this.errorMessages.imgErrorMessage = ""
                }
            },
    }
    }
</script>

<style scoped>

</style>
