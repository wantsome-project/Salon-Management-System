//store/modules/auth.js

import axios from 'axios';
const state = {
    user: null,
};
const getters = {
    isAuthenticated: state => !!state.user,
    StateUser: state => state.user,
};

const actions = {
    async Register({dispatch}, form) {
        await axios.post('/register', form)
        let UserForm = new FormData()
        UserForm.append('name', form.name)
        UserForm.append('password', form.password)
        await dispatch('LogIn', UserForm)
    },
    async LogIn({commit}, User) {
        await axios.post('/login', User)
        await commit('setUser', User.email)
    },
    async logOut({commit}){
        let user = null
        commit('logOut', user)
    }


};
const mutations = {
    setUser(state, username){
        state.user = username;
    },
    logOut(state){
        state.user = null;
    },
};
export default {
    state,
    getters,
    actions,
    mutations
};
