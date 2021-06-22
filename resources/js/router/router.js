import Vue from 'vue'
import VueRouter from 'vue-router'
import Login from "../components/Login";
import Pin from "../components/Pin";
import Results from "../components/Results";
import auth from "../store/modules/auth";

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

        if(auth.getters.GET_AUTH_STATUS){
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
