/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


window.Vue = require('vue');
import Vue from 'vue';
import router from './router';
import VueRouter from 'vue-router'


require('./components');

new Vue({
    el: '#app',
    router: router
});

Vue.use(VueRouter);



/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('mypage-component',require('./components/MypageComponent.vue').default);
Vue.component('NavBarComponent',require('./components/common/NavBarComponent').default);
Vue.component('SideBarComponent',require('./components/common/SideBarComponent').default);



const app = new Vue({
    el: '#app',
    router
});
