<template>
    <main>

        <div class="confirm">
            <h2 class="f-h2">アイデア投稿確認画面</h2>

            <form class="confirm-container" enctype="multipart/form-data">



                <label for="ideaImg" class="c-label">アイデア画像</label>
                <div id="ideaImg" class="confirm-container-img">
                    <img :src="this.img"  alt="">
                </div>


                <label for="ideaName" class="c-label">アイデア名</label>
                <div id="ideaName"  class="confirm-text">{{$route.params.title}}</div>

                <label for="category" class="c-label">カテゴリー名</label>
                <div id="category" class="confirm-text">{{categoryName}}</div>

                <label for="category" class="c-label">お値段</label>
                <div id="prica" class="confirm-text">{{$route.params.price}} </div>

                <label for="description" class="c-label">概要</label>
                <div id="description" class="confirm-text">
                    {{$route.params.overflow}}
                </div>



                <label for="contents" class="c-label">内容</label>
                <div id="contents" class="confirm-text">
                    {{$route.params.content}}
                </div>
                <div class="confirm-attention">
                    <p>投稿を編集する場合は</p>
                    <br>
                    <p>下記の編集ボタンを押してください</p>
                </div>

                <div class ="c-button confirm-post" @click="editIdea()">
                <router-link :to="{name:'post',params:{
                     img: this.img,
                     title:this.title,
                     category_id:this.category_id,
                     overflow:this.overflow,
                     content:this.content,
                     price:this.price,
                     }}">編集する</router-link>
                </div>


                <div class="confirm-attention">
                    <p>上記の内容でよろしければ</p>
                    <br>
                    <p>下記の投稿ボタンを押してください</p>
                </div>

                <div class="arrow"></div>



                <div class ="c-button confirm-post" @click="saveIdea(userId)">
                <router-link :to="{name:'postComplete',params:{
                                    title:this.title}}">投稿する</router-link>
                </div>

            </form>
        </div>

    </main>

</template>

<script>
    export default {
        name: "PostConfirmComponent",

        data:function(){
            return{
                fileInfo:"",
                img:'',
                title:'',
                category_id:'',
                price:"",
                overflow:'',
                content:'',
            }
        },

        created() {
            console.log('ConfirmIdeaComponent created.');
            this.fileInfo = this.$route.params.fileInfo
            this.user = this.$store.dispatch('getUsers');
            this.title = this.$route.params.title;
            this.img = this.$route.params.img;
            this.category_id = this.$route.params.category_id;
            this.price = this.$route.params.price;
            this.overflow = this.$route.params.overflow;
            this.content = this.$route.params.content;
        },


        mounted() {

        },

        beforeUpdate() {
            this.$emit('close-loading');
        },

        methods: {

            editIdea: function(){

            },



            //投稿保存
            saveIdea: function(userId) {
                //画像を保存の形式に
                const formData = new FormData();
                formData.append('file',this.fileInfo);
                formData.append('title',this.title);
                formData.append('category_id',this.category_id);
                formData.append('overflow',this.overflow);
                formData.append('content',this.content);
                formData.append('price',this.price);
                formData.append('user_id',userId);

                axios.post('/api/saveIdea',formData,{
                    headers: {
                        'content-type': 'multipart/form-data'
                    },
                })
                    .then((response) => {
                        console.log(response);
                        //投稿した後は詳細に飛びたい
                    }).catch((error) => {
                    console.log(error);
                });
            },
        },





        computed: {
            userId() {
                return this.$store.state.users.id
            },

            /**
             * 数が増えたときにどうするか考えないと
             *
             * @returns {string}
             */
            categoryName(){
                if(this.$route.params.category_id == "1" ){
                    return 'マッチング'

                }else if(this.$route.params.category_id == "2") {
                    return '掲示板'
                }

                else if(this.$route.params.category_id == "3") {
                    return 'SNS'
                }else if(this.$route.params.category_id == "4") {
                    return 'ECサイト'

                } else if(this.$route.params.category_id == "5"){
                    return '情報発信'
                } else{
                    return 'その他'
                }
            },
        },
    }
</script>

<style scoped>

</style>
