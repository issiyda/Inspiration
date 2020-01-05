import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

Vue.use(Vuex);

export default new Vuex.Store({
    state: {

        users:{}

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
