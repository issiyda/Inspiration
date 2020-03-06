<template>
    <main>


        <div class="contact">


            <h2 class="f-h2">お問い合わせ</h2>
            <form class="contact-container" @submit.prevent="contactSubmit">

                <div class="contact-container-input">


                    <div class="contact-container-input">
                        <label class="c-label" for="subject">件名</label>
                        <input v-model="contactSubject" @blur="subjectValidation()" id="subject" class="c-input"
                               type="text" placeholder="（例）アカウントに関して">
                    </div>
                    <p><span :class="{'profile-container-validation':this.contactSubjectChangeColor}">{{contactSubject.length}}</span>/30文字
                    </p>

                    <div class="error" v-if="errorMessages.contactSubjectErrorMessage">
                        {{errorMessages.contactSubjectErrorMessage}}
                    </div>


                    <div class="contact-container-input">
                        <label class="c-label" for="contactTexts">内容</label>
                        <textarea v-model="contactText" @blur="textValidation()" id="contactTexts"
                                  class="c-input contact-textarea" type="text" placeholder="お問い合わせ内容記入"></textarea>
                    </div>
                    <p><span :class="{'profile-container-validation':this.contactTextChangeColor}">{{contactText.length}}</span>/500文字
                    </p>

                    <div class="error" v-if="errorMessages.contactTextErrorMessage">
                        {{errorMessages.contactTextErrorMessage}}
                    </div>


                    <div class="contact-resultMessage" v-if="resultMessage">
                        {{resultMessage}}
                    </div>

                    <button id="submit" class="c-button" :disabled="processing">
                        送信する
                    </button>
                </div>


            </form>
        </div>

    </main>
</template>

<script>
    export default {

        name: "ContactComponent",

        data: function () {
            return {
                contactSubject: "",
                contactText: "",
                resultMessage: false,
                processing: false,

                validations: {
                    contactSubjectValidation: "",
                    contactTextValidation: "",

                },

                errorMessages: {
                    contactSubjectErrorMessage: false,
                    contactTextErrorMessage: false,

                },
                contactSubjectChangeColor: false,
                contactTextChangeColor: false,
            }
        },

        mounted() {
            console.log('ContactComponent mounted');
            this.$emit('close-loading');
        },

        methods: {

            subjectValidation: function () {
                if (this.contactSubject === "") {

                    this.validations.contactSubjectValidation = false;
                    this.errorMessages.contactSubjectErrorMessage = "入力必須です"
                    this.contactSubjectChangeColor = true;

                } else if (this.contactSubject.length > 30) {
                    this.validations.contactsubjectValidation = false;
                    this.errorMessages.contactSubjectErrorMessage = "30文字以内で入力して下さい"
                    this.contactSubjectChangeColor = true;
                } else if (this.contactSubject !== "" && this.contactSubject.length <= 30) {
                    this.validations.contactSubjectValidation = true;
                    this.errorMessages.contactSubjectErrorMessage = false
                    this.contactSubjectChangeColor = false;

                }
            },

            textValidation: function () {
                if (this.contactText === "") {

                    this.validations.contactTextValidation = false;
                    this.errorMessages.contactTextErrorMessage = "入力必須です"
                    this.contactTextChangeColor = true;

                } else if (this.contactText.length > 500) {
                    this.validations.contactTextValidation = false;
                    this.errorMessages.contactTextErrorMessage = "500文字以内で入力して下さい"
                    this.contactTextChangeColor = true;
                } else if (this.contactText !== "" && this.contactText.length <= 500) {
                    this.validations.contactTextValidation = true;
                    this.errorMessages.contactTextErrorMessage = false
                    this.contactTextChangeColor = false;

                }
            },

            contactSubmit: function () {
                this.subjectValidation();
                this.textValidation();

                if (this.validations.contactSubjectValidation === true
                    &&
                    this.validations.contactTextValidation === true) {
                    this.processing = true;
                    this.$emit('open-loading');

                    //送信
                    axios.post('api/contactPost', {
                        userEmail: this.$store.state.users.email,
                        userName: this.$store.state.users.name,
                        subject: this.contactSubject,
                        contents: this.contactText
                    }).then((response) => {
                        this.$emit('close-loading');
                        console.log(response);
                        this.resultMessage = 'お問い合わせ完了しました'
                        this.processing = false;
                    }).catch((error) => {
                        this.$emit('close-loading');
                        this.resultMessage = "時間を置いてお試し下さい"
                        console.log(error);
                    })


                    setTimeout(() => {
                            this.$emit('close-loading');
                        }
                        , 5000
                    )
                }

            },
        }

    }
</script>

<style scoped>


</style>

