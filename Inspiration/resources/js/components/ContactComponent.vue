<template>
    <main>


        <div class="contact">


            <h2 class="f-h2">お問い合わせ</h2>
            <form class="contact-container">

                <div class="contact-container-input">


                    <div class="contact-container-input">
                        <label class="c-label" for="subject">件名</label>
                        <input v-model="contactSubject" id="subject" class="c-input" type="text" placeholder="（例）アカウントに関して">
                    </div>

                    <div class="contact-container-input">
                        <label class="c-label" for="contactTexts">内容</label>
                        <textarea v-model="contactTexts" id="contactTexts" class="c-input contact-textarea" type="text" placeholder="お問い合わせ内容記入"></textarea>
                    </div>

                    <div class ="contact-resultMessage" v-if="resultMessage">
                        {{resultMessage}}
                    </div>

                        <div id="submit" class="c-button" @click="contactSubmit">
                            <div>送信する</div>
                        </div>
                </div>


            </form>
        </div>

    </main>
</template>

<script>
    export default {
        name: "ContactComponent",

        data:function()
        {
            return{
                contactSubject:"",
                contactTexts:"",
                resultMessage:false,
            }
        },

        mounted() {
            console.log('ContactComponent mounted');
            this.$emit('close-loading');
        },

        methods:{
            contactSubmit:function()
            {
                //送信わたし
                axios.post('api/contactPost',{
                        userEmail:this.$store.state.users.email,
                        userName:this.$store.state.users.name,
                        subject:this.contactSubject,
                        contents:this.contactTexts
                }).then((response) =>{
                    console.log(response);
                    this.resultMessage = 'お問い合わせ完了しました'
                }).catch((error) => {
                    this.resultMessage = "時間を置いてお試し下さい"
                    console.log(error);
                })
            }
        }

    }
</script>

<style scoped>

</style>
