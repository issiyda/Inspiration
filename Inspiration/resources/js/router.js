import Vue from 'vue'
import VueRouter from 'vue-router'
import Footer from './components/common/FooterComponent'

Vue.use(VueRouter);

// コンポーネントをインポート
import mypage from './components/MypageComponent';



export default new VueRouter({
    // モードの設定
    mode: 'history',
    routes: [
        {
            // routeのパス設定
            path: '/mypage',
            // 名前付きルートを設定したい場合付与
            name: mypage,
            // コンポーネントの指定
            component: mypage
        },

       

    ]
});
