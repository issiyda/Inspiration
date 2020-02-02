/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

var PayjpCheckout = require('vue-payjp-checkout')
require('./components');
window.Vue = require('vue');
window.axios = require('axios');
import router from './router';
import VueRouter from 'vue-router'
import store from './store'
import VCalendar from 'v-calendar';

Vue.use(PayjpCheckout)
Vue.use(VueRouter);
Vue.use(window.vuelidate.default);
Vue.use(VCalendar);
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

const loadImg = new Vue();



const app = new Vue({
    el: '#app',
    router,
    store,

    data:function(){

        return{

            show: true,
            mode: 'single',
            formats: {
                input: ['YYYY-MM-DD'],
            },
            selectedDate: null,

        }

    },

    mounted: function(){
        console.log('loadingComponent mounted');
    },

    methods:{



        openMethod: function(){
            this.show = true
        },

        closeMethod: function(){
            this.show = false
        }
    },

    filters: {
        moment: function (date) {
            return moment(date).format('YYYY/MM/DD HH:mm');// eslint-disable-line
        }
    }

});
