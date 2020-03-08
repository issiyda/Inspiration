import Vue from 'vue'
import Vuex from 'vuex'

import axios from 'axios'

Vue.use(Vuex);

export default new Vuex.Store({
    state: {

        users:{},
        ideas: {
            allIdea:{},
            buyingIdea: {},
            myIdea: {},
            favIdea :{} ,
            review : {}
        }

    },

    //getters:コンポーネントでいうcomputed的なもの
    getters:{
        //messageを使用するgetter
        users(state) {
            return state.users;
        },

        posts(state){
            return state.ideas;
        }
    },

    mutations: {
        setUsers: function(state,users){
            state.users = users
        },
        setIdeas: function(state,ideas){
            state.ideas = ideas
        },
    },
    actions: {
        /**
         * ユーザー情報取得
         * @param commit
         */
        getUsers: function({commit}) {
                return  axios.get('/users')
                .then(response => {
                    commit('setUsers',response.data);
                    console.log(response);
                })
                .catch((error) =>{
                    console.log(error);
                });

        },

        /**
         * 自分の投稿アイデア取得
         * @param commit
         * @param dispatch
         */
        getUserIdeas: async function({commit,dispatch}){
            await dispatch('getUsers')
            axios.get('/api/getIdeas/',{
                    params:{
                userId:this.state.users.id
                        }
            }).then(response => {
                    commit('setIdeas', response.data);
                    console.log(response);
                }).catch((error)=>{
                console.log(error);
            });
        },

        moveToTop() {

            const duration = 500;  // 移動速度（1秒で終了）
            const interval = 25;    // 0.025秒ごとに移動
            const step = -window.scrollY / Math.ceil(duration / interval); // 1回に移動する距離
            const timer = setInterval(() => {

                window.scrollBy(0, step);   // スクロール位置を移動

                if(window.scrollY <= 350) {

                    clearInterval(timer);

                }

            }, interval);

        },

        // getIdeaReviews: async function({commit,dispatch})
        // {
        //     await dispatch('getUserIdeas')
        //     axios.get
        // }


    },

    // actions: {
    //     /**
    //      * ユーザー情報取得
    //      * @param commit
    //      * @returns {Promise<AxiosResponse<T>>}
    //      */
    //     getUsers: async function({commit,dispatch}) {
    //         return axios.get('/users')
    //             .then(response => {
    //                 commit('setUsers', response.data);
    //                 console.log(response);
    //             }, await dispatch('getUserIdeas'));
    //     },
    //
    //     /**
    //      * 自分の投稿アイデア取得
    //      * @param commit
    //      * @returns {Promise<AxiosResponse<T>>}
    //      */
    //     getUserIdeas:function({commit}){
    //         return axios.get('/api/mypage/',{
    //             params:{
    //                 userId:this.state.users.id
    //             }
    //         })
    //             .then(response => {
    //                 commit('setIdeas', response.data);
    //                 console.log(response);
    //             }).catch((error)=>{
    //                 console.log(error);
    //             });
    //     },
    //
    //
    // },
    modules: {
    }
})
