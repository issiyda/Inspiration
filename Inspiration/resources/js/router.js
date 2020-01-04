import Router from 'vue-router'


// コンポーネントをインポート
import notfound from './components/NotFoundComponent';
import mypage from './components/MypageComponent';
import post from './components/PostIdeaComponent';
import profile from './components/ProfileComponent';
import postConfirm from './components/PostIdeaConfirmComponent';
import postComplete from './components/PostCompletedComponent';
import postDetail from './components/PostDetailComponent';
import postEdit from './components/EditIdeaComponent';
import withdraw from './components/withdrawComponent';
import passReminder from './components/passReminderComponent';

export default new Router({
    // モードの設定
    mode: 'history',
    routes: [

        // {
        //     path: '*',
        //     name: notfound,
        //     component: notfound
        // },




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

        {
            // routeのパス設定
            path: '/postConfirm',
            // 名前付きルートを設定したい場合付与
            name: postConfirm,
            // コンポーネントの指定
            component: postConfirm
        },
        {
            // routeのパス設定
            path: '/postComplete',
            // 名前付きルートを設定したい場合付与
            name: postComplete,
            // コンポーネントの指定
            component: postComplete
        },

        {
            // routeのパス設定
            path: '/postDetail',
            // 名前付きルートを設定したい場合付与
            name: postDetail,
            // コンポーネントの指定
            component: postDetail
        },
        {
            // routeのパス設定
            path: '/postEdit',
            // 名前付きルートを設定したい場合付与
            name: postEdit,
            // コンポーネントの指定
            component: postEdit
        },

        {
            // routeのパス設定
            path: '/withdraw',
            // 名前付きルートを設定したい場合付与
            name: withdraw,
            // コンポーネントの指定
            component: withdraw
        },

        {
            // routeのパス設定
            path: '/passReminder',
            // 名前付きルートを設定したい場合付与
            name: passReminder,
            // コンポーネントの指定
            component: passReminder
        },



    ]
});
