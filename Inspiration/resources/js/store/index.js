import Vue from 'vue'
import Vuex from 'vuex'

import axios from 'axios'

Vue.use(Vuex);

export default new Vuex.Store({
    state: {

        users:{},
        ideas: {
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
        }
    },
    actions: {
        getUsers: function({commit}) {
            return axios.get('/users')
                .then(response => {
                    commit('setUsers', response.data);
                    console.log(response);
                });
        },

        /**
         * 自分の投稿アイデア取得
         * @param commit
         * @returns {Promise<AxiosResponse<T>>}
         */
        getUserIdeas:function({commit}){
            return axios.get('/api/mypage/')
                .then(response => {
                    commit('setIdeas', response.data);
                    console.log(response);
                }).catch((error)=>{
                console.log(error);
            });
        },


    },
    modules: {
    }
})
