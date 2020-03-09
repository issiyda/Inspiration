import Router from 'vue-router'

// コンポーネントをインポート
import mypage from './components/MypageComponent';
import profile from './components/ProfileComponent';
import profileDetail from './components/ProfileDetailComponent'
import allBuy from './components/AllBuyComponent';
import allPost from './components/AllPostComponent'
import allFavorite from './components/AllFavoriteComponent';
import allReview from './components/AllReviewComponent';
import post from './components/PostIdeaComponent';
import postConfirm from './components/PostIdeaConfirmComponent';
import postIdeaEdit from './components/postIdeaEditComponent';
import postDetail from './components/PostDetailComponent';
import reviewCompleted from './components/reviewCompletedComponent'
import allIdea from './components/AllIdeaComponent';
import postComplete from './components/PostCompletedComponent';
import withdraw from "./components/withdrawComponent";
import passwordEdit from "./components/PasswordEdit";
import contact from "./components/ContactComponent";
import postIdeaDelete from "./components/PostIdeaDeleteComponent"

export default new Router({
    // モードの設定
    mode: 'history',

    /**
     * ページ遷移時にページトップに移動
     * @param to
     * @param from
     * @param savedPosition
     * @returns {{x: number, y: number}}
     */
    scrollBehavior (to, from, savedPosition) {
        if (savedPosition) {
            return savedPosition
        } else {
            return {x: 0, y: 0}
        }
    },
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
            path: '/profile',
            name: 'profile',
            component: profile
        },

        {
            path: '/profileDetail',
            name: 'profileDetail',
            component: profileDetail
        },

        {
            path: '/allBuy',
            name: 'allBuy',
            component: allBuy
        },

        {
            path: '/allPost',
            name: 'allPost',
            component: allPost
        },

        {
            path: '/allFavorite',
            name: 'allFavorite',
            component: allFavorite
        },

        {
            path: '/allReview',
            name: 'allReview',
            component: allReview
        },

        {
            path: '/post',
            name: 'post',
            component: post,
            props:true
        },

        {
            path: '/postConfirm',
            name: 'postConfirm',
            component: postConfirm,
            props:true
        },
        {
            path: '/postComplete',
            name: 'postComplete',
            component: postComplete
        },

        {
            path: '/postIdeaEdit',
            name: 'postIdeaEdit',
            component: postIdeaEdit
        },


        {
            path: '/postDetail',
            name: "postDetail",
            component: postDetail
        },

        {
            path: '/reviewComplete',
            name: "reviewCompleted",
            component: reviewCompleted
        },



        {
            path: '/allidea',
            name: 'allIdea',
            component: allIdea
        },

        {
            path: '/withdraw',
            name: 'withdraw',
            component: withdraw
        },

        {
            path: '/passEdit',
            name: 'passEdit',
            component: passwordEdit
        },

        {
            path: '/contact',
            name: 'contact',
            component: contact
        },

        {
            path: '/postIdeaDelete',
            name: 'postIdeaDelete',
            component: postIdeaDelete
        }
    ]
});
