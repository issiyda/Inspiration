import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);

// コンポーネントをインポート
import mypage from './components/MypageComponent';
import post from './components/PostIdeaComponent';
import profile from './components/ProfileComponent';



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

        {
            // routeのパス設定
            path: '/post',
            // 名前付きルートを設定したい場合付与
            name: post,
            // コンポーネントの指定
            component: post
        },

        {
            // routeのパス設定
            path: '/profile',
            // 名前付きルートを設定したい場合付与
            name: profile,
            // コンポーネントの指定
            component: profile
        },


    ]
});
