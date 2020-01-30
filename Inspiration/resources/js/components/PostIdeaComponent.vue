<template>

    <main>

        <div class="profile">
            <h2 class="f-h2">アイデア投稿</h2>

            <form method="post" class="profile-container">


                <div class="profile-container-input">



                    <div class="profile-container-img">
                        <div class="profile-container-img-left">
                            <label class ="c-label" for="img">アイデアイメージ画像</label>
                        </div>
                        <div class="profile-container-img-right">
                            <label>
                                <input id="img" @change="onFileChange" v-bind="img" class ="c-input profile-container-img-none" type="file" />
                                <i aria-hidden="true" v-show="!ideaImage" class="fas fa-plus fa-7x"></i>
                                <img :src="ideaImage" v-show="ideaImage" alt="">
                            </label>
                        </div>
                    </div>

                    <div class="profile-container-input">
                        <label class ="c-label" for="title">アイデア名</label>
                        <input id="title" name="title" v-model="title" class ="c-input" type="text" placeholder="（例）info@.com">
                    </div>

                    <div class="profile-container-input">

                        <label class ="c-label" for="category">カテゴリー</label>
                        <div class="c-radio-container">

                            <input id="matching" v-model="category_id" name="category"  type="radio" value=1>
                            <label for="matching" class="c-radio">マッチング</label>

                            <input id="board" v-model="category_id" name="category" class ="" type="radio" value=2>
                            <label for="board" class="c-radio">掲示板</label>

                            <input id="sns" v-model="category_id" name="category" class ="" type="radio" value=3>
                            <label for="sns" class="c-radio">SNS</label>

                            <input id="EC" v-model="category_id" name="category" class ="" type="radio" value=4>
                            <label for="EC" class="c-radio">ECサイト</label>

                            <input id="infoplaner" v-model="category_id" name="category" class ="" type="radio" value=5>
                            <label for="infoplaner" class="c-radio">情報発信</label>

                            <input id="other" v-model="category_id" name="category" class ="" type="radio" value=6>
                            <label for="other" class="c-radio">その他</label>


                        </div>
                    </div>

                    <div class="profile-container-input">
                        <label class ="c-label" for="price">価格</label>
                        <input id="price" v-model="price" class ="c-input" type="text" placeholder="（例）1000">
                    </div>



                    <div class="profile-container-input">
                        <label class ="c-label" for="profile">概要</label>
                        <textarea name="" v-model="overflow"  id="profile" class ="c-textarea" cols="30" rows="10" placeholder="自己紹介を記入してください"></textarea>
                    </div>
                    <p><span>{{overflowLength}}</span>/100文字</p>

                    <div class="profile-container-input">
                        <label class ="c-label" for="contents">内容</label>
                        <textarea name="" v-model="content" id="contents" class ="c-textarea" cols="30" rows="10" placeholder="あなたのアイデアをお待ちしてます"></textarea>
                    </div>
                    <p><span>{{contentLength}}/100文字</span></p>


                    <div class="c-button">
<!--                         v-on:click="confirmIdea(userId)"-->
<!--                    >-->
                    <router-link  :to="{name:'postConfirm',params:{
                     fileInfo: this.fileInfo,
                     img: this.ideaImage,
                     title:this.title,
                     category_id:this.category_id,
                     price:this.price,
                     overflow:this.overflow,
                     content:this.content,
                     }}" >投稿確認</router-link>
                    </div>
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
                fileInfo:""
            }

        },

        mounted() {
            console.log('PostIdeaComponent mounted.');
            this.user = this.$store.dispatch('getUsers');
        },

        beforeUpdate() {
            this.$emit('close-loading');
        },

        methods: {







            onFileChange(event){
                this.fileInfo = event.target.files[0]
                this.saveImage()
                this.createImage();
            },

            createImage() {
                //画像をプレビュー表示するロジック
                let reader = new FileReader();
                reader.onload = (e) => {
                    this.ideaImage = e.target.result
                };
                reader.readAsDataURL(this.fileInfo);
            },


            //画像をDBに保存してパスを保存するロジック
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
            }
            },
        computed:{
           userId(){
               return this.$store.state.users.id
           },
            overflowLength(){
               return this.overflow.length;
            },
            contentLength(){
               return this.content.length;
            }
        },
    }
</script>

<style scoped>

</style>
