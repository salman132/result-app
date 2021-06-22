import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex)

import examType from "./modules/examType";
import auth from "./modules/auth";

export default new Vuex.Store({

    state: {

    },
    getters: {

    },

    mutations: {

    },
    actions: {},


    modules: {
        examType: examType,
        auth: auth,

    }


})




