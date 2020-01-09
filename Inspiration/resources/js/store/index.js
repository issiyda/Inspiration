import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

Vue.use(Vuex);

export default new Vuex.Store({
    state: {

        users:{}

    },

    //getters:コンポーネントでいうcomputed的なもの
    getters:{
        //messageを使用するgetter
        users(state) {
            return state.users;
        }
    },

    mutations: {
        setUsers: function(state,users){
            state.users = users
        }
    },
    actions: {
        getUsers: function({commit}){
            return axios.get('/users')
                .then(response => {
                    commit('setUsers',response.data);
                    console.log(response);
                });
        }
    },
    modules: {
    }
})
