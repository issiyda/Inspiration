import Vue from 'vue'

Vue.component('nav-bar-component',require('./components/common/NavBarComponent').default);
Vue.component('side-bar-component',require('./components/common/SideBarComponent').default);
Vue.component('footer-component',require('./components/common/FooterComponent').default);
Vue.component('guest-footer-component',require('./components/common/GuestFooterComponent').default);

Vue.component('informal-detail-component',require('./components/InformalDetailComponent').default);
