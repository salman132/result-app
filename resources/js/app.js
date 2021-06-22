require('./bootstrap');

window.Vue = require('vue').default;
window.Vue = require('vue');


import Vue from 'vue'
import store from './store';
import App from "./App.vue";
import Spinner from 'vue-simple-spinner'
import Login from "./components/Login";
import routes from "./router/router"





new Vue({
    router:routes,
    store,
    components:{
        Welcome: Login,
        Spinner: Spinner,

        components: { App },
    },
    render: h =>h(App)
}).$mount('#app');


