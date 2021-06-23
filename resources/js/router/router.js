import Vue from 'vue'
import VueRouter from 'vue-router'
import Login from "../components/Login";
import Pin from "../components/Pin";
import Results from "../components/Results";
import store from '../store';


Vue.use(VueRouter)
const routes = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: "/",
            name: 'Login',
            component: Login
        },
        {
            path: "/pin",
            name: 'Pin',
            component: Pin
        },
        {
            path: "/result",
            name: 'Result',
            component: Results,
            meta:{
                requiresAuth: true,
            }
        },

    ]
})
routes.beforeEach((to,from,next) =>{
    //Auth route check
    if(to.matched.some(rec=>rec.meta.requiresAuth)){
        //Check auth state

        console.log(store.dispatch('actionCheckAuthStatus'))
        if(store.state.user.auth){
            //passed
            next()
        }
        else{
            //Denied

            next({name: 'Login'})
        }
    }
    else{
        next()
    }
});

export default routes
