require('./bootstrap');

window.Vue = require('vue').default;

import Vue from 'vue'
import App from "./App.vue";
import Spinner from 'vue-simple-spinner'
import Welcome from "./components/Welcome";
import routes from "./router/router"



new Vue({
    router:routes,
    components:{
        Welcome: Welcome,
        App: App,
        Spinner: Spinner
    },
    render: h =>h(App)
}).$mount('#app');
