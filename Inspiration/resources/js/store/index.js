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
            axios.get('/api/mypage/',{
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
