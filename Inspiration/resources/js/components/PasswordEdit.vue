<template>


    <main>


        <h2 class="f-h2">パスワード変更</h2>

        <div class="c-form">

            <form @submit.prevent="updatePass" class="c-form-container register">


                <div class="c-form-container-input register-input">
                    <label class ="c-label" for="mail">現在のpassword</label>
                    <input id="mail" v-model="currentPass" @input ="$v.currentPass.$touch()" @blur="checkPass()" class="c-input" type="text" placeholder="（例）info@.com">
                    <div v-if="$v.currentPass.$error" class ="error">
                        <span v-if="!$v.currentPass.required">入力必須です</span>
                    </div>
                    <span class ="error" v-if="isMatched">{{currentPassMessage}}</span>


                </div>

                <div class="c-form-container-input register-input">
                    <label class ="c-label" for="pass" >新規password</label>
                    <input id="pass" v-model="newPass" @input ="$v.newPass.$touch()" class ="c-input" type="password" placeholder="（例）Jkl439fu">
                    <div v-if="$v.newPass.$error" class ="error">
                        <span v-if="!$v.newPass.required">入力必須です</span>
                        <span v-if="!$v.newPass.minLength">8文字以上で記入してください</span>
<!--                        <span v-if="!$v.reNewPass.notSamePassword">現在のpassとは異なるpassを指定下さい</span>-->
                    </div>
                </div>

                <div class="c-form-container-input register-input">
                    <label class ="c-label" for="repass">確認用新規password</label>
                    <input id="repass" v-model="reNewPass" @input ="$v.reNewPass.$touch()" class ="c-input" type="password" placeholder="パスワード再入力">
                    <div v-if="$v.reNewPass.$error" class ="error">
                        <span v-if="!$v.reNewPass.required">入力必須です</span>
                        <span v-if="!$v.reNewPass.sameAsPassword">パスワードが一致しません</span>
                    </div>
                </div>

                <div class="error" v-if="posted">{{stateMessage}}</div>

                <input type="submit" class="c-button" :disabled ="$v.$invalid">
            </form>
        </div>

    </main>

</template>

<script>

    const { required , minLength, sameAs} = window.validators;


    export default {
        name: "passwordEdit",

        data: function()
        {
            return{
                currentPass: '',
                currentPassMessage: "",
                newPass:'',
                reNewPass:'',
                dbCurrentPass: this.$store.state.users.id,
                isMatched: false,
                posted:false,
            }
        },

        methods:{
            checkPass:function(){
                axios.get('/api/checkPass',{
                    params: {
                        user_id:this.$store.state.users.id,
                        inputPass: this.currentPass,
                    }
                })
                    .then((response) =>{
                        // 確認用
                        // console.log(response)
                        this.currentPassMessage = response.data.message;
                            this.isMatched = true;
                        if(this.currentPass == ""){
                            this.currentPassMessage = "";
                            this.isMatched = false
                        }
                    }).catch((error)=>{
                    console.log(error)
                    this.currentPassMessage = '時間をおいてお試し下さい';
                });
            },

            updatePass:function(){
                axios.post('/api/updatePass',{
                    user_id: this.$store.state.users.id,
                    // currentPass: this.currentPass,
                    newPass: this.newPass,
                    // reNewPass: this.reNewPass
                })
                    .then((response)=>{
                        console.log(response);
                        this.posted = true;
                        return this.stateMessage;
                    }).catch((error)=>{
                        console.log(error)
                });
                // this.currentPass = '';
                // this.currentPassMessage ="";
                // this.reNewPass='';
            },




        },

        computed:{
            stateMessage:function(){
                return 'Pass変更完了しました'
            },

        },

        mounted() {
            console.log('PostIdeaComponent mounted.');
            this.user = this.$store.dispatch('getUsers');
        },

        beforeUpdate() {
            this.$emit('close-loading');
        },

        // watch:{
        //     currentPass:{
        //         if(this.dbCurrentPass !== this.currentPass)
        //     {
        //         this.isMatched = true
        //     }
        //     }
        // }

        validations: {
            currentPass: {
                required: required
            },
            newPass: {
                required: required,
                minLength: minLength(8),
                // notSamePassword: !sameAs('currentPass')

            },

            reNewPass: {
                required: required,
                sameAsPassword: sameAs('newPass')
            }
        }
    }
</script>

<style scoped>

</style>
