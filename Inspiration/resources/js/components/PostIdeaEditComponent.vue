<template>
    <main>

        <div class="profile">
            <h2 class="f-h2">アイデア編集</h2>

            <form @submit.prevent="editIdeaSave()" class="profile-container">


                <div class="profile-container-input">



                    <div class="profile-container-img">
                        <div class="profile-container-img-left">
                            <label class ="c-label" for="img">アイデアイメージ画像</label>
                        </div>
                        <div class="profile-container-img-right">
                            <label>
                                <input id="img" @change="onFileChange" class ="c-input profile-container-img-none" type="file" />
                                <img :src="profileImg" v-show="!newImage" alt="">
                                <img :src="newImage" v-show="newImage" alt="profileImg">
                            </label>
                        </div>
                    </div>

                    <div class="profile-container-input">
                        <label class ="c-label" for="title">アイデア名</label>
                        <input id="title" v-model="title" class="c-input" type="text" placeholder="（例）だーいし">
                    </div>

                    <div class="profile-container-input">

                        <label class ="c-label" for="category">カテゴリー</label>
                        <div id="category" class="c-radio-container">

                            <input id="matching" v-model="category_id" type="radio" value="1" :checked="category.matching">
                            <label for="matching" class="c-radio" >マッチング</label>

                            <input id="board" v-model="category_id" class ="" type="radio" value="2" :checked="category.board">
                            <label for="board" class="c-radio">掲示板</label>

                            <input id="sns" v-model="category_id" class ="" type="radio" value="3" :checked="category.sns">
                            <label for="sns" class="c-radio">SNS</label>

                            <input id="EC" v-model="category_id" class ="" type="radio" value="4"  :checked="category.ecSite">
                            <label for="EC" class="c-radio">ECサイト</label>

                            <input id="infoplaner" v-model="category_id" class ="" type="radio" value="5" :checked="category.infoPlaner">
                            <label for="infoplaner" class="c-radio">情報発信</label>

                            <input id="other" v-model="category_id"  class ="" type="radio" value="6" :checked="category.other">
                            <label for="other" class="c-radio">その他</label>


                        </div>
                    </div>



                    <div class="profile-container-input">
                        <label class ="c-label" for="profile">概要</label>
                        <textarea name="" v-model="overflow" id="profile" class ="c-textarea" cols="30" rows="10" placeholder="自己紹介を記入してください">{{overflow}}
                        </textarea>
                        <p><span>{{overflowLength}}</span>/100文字</p>
                    </div>



                    <div class="profile-container-input">
                        <label class ="c-label" for="contents">内容</label>
                        <textarea v-model="content" id="contents" class ="c-textarea" cols="30" rows="10" placeholder="あなたのアイデアをお待ちしてます">{{content}}
                        </textarea>
                        <p><span>{{contentLength}}</span>/100文字</p>
                    </div>


                    <div class="profile-container-img-message" v-if="EditResultMessage">{{EditResultMessage}}</div>

                    <input type="submit" class="c-button" value="編集する">
                </div>
            </form>
        </div>

    </main>
</template>

<script>
    export default {
        name: "PostIdeaEditComponent",

        data:function(){
            return{
                id:"",
                bought_flag: "",
                category_id: "",
                content: "",
                isContentEdit:"",
                delete_flag:"",
                img:"",
                overflow:"",
                isOverflowEdit:"",
                price:"",
                isPriceEdit:"",
                title:"",
                isTitleEdit:true,
                user_id:"",
                category:{
                    matching:"",
                    board:"",
                    sns:"",
                    ecSite:"",
                    infoPlaner:"",
                    other:""
                },
                EditResultMessage:false,
                fileInfo:"",
                newImage:""
            }
        },

        computed:{
            overflowLength(){
                return this.overflow.length;
            },
            contentLength(){
                return this.content.length;
            }
        },

        created:function(){
            this.id = this.$route.params.id,
            this.bought_flag = this.$route.params.bought_flag,
                this.category_id =  this.$route.params.category_id,
                this.content =  this.$route.params.content,
                this.delete_flag = this.$route.params.delete_flag,
                this.img = this.$route.params.img,
                this.overflow = this.$route.params.overflow,
                this.price = this.$route.params.price,
                this.title = this.$route.params.title,
                this.user_id = this.$route.params.user_id,
                this.categoryCheck();
        },

        beforeUpdate() {
            this.$emit('close-loading');
        },

        methods:{
            categoryCheck:function(){
                if(this.category_id === 1){
                    this.category.matching = true
                }
                else if(this.category_id === 2){
                    this.category.board = true
                }
                if(this.category_id === 3){
                    this.category.sns = true
                }
                if(this.category_id === 4){
                    this.category.ecSite = true
                }
                if(this.category_id === 5){
                    this.category.infoPlaner = true
                }
                if(this.category_id === 6){
                    this.category.other = true
                }
            },

            onFileChange(event){
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

            editIdeaSave(){
                const formData = new FormData();
                formData.append('file',this.fileInfo);
                formData.append('idea_id',this.id);
                formData.append('category_id',this.category_id);
                formData.append('overflow',this.overflow);
                formData.append('content',this.content);
                formData.append('price',this.price);
                formData.append('title',this.title);

                axios.post('/api/ideaEdit',formData,{
                    headers: {
                        'content-type': 'multipart/form-data'
                    },
                }).then((response) => {
                    console.log(response);
                    this.ideas = this.$store.dispatch('getUserIdeas')
                    this.EditResultMessage = "編集に成功しました"
                }).catch((error) =>{
                    console.log(error)
                    this.EditResultMessage = "編集に失敗しました。\n" +
                        "時間を置いてお試し下さい"
                })


            }
        }
    }
</script>





<style scoped>

</style>

