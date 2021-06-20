import Vue from 'vue'
import VueRouter from 'vue-router'
import Welcome from "../components/Welcome";
import Register from "../components/Register";
import Login from "../components/Login";

Vue.use(VueRouter)
const routes = new VueRouter({
    mode: 'history',
    routes:[
        {
            path: "/",
            name: 'Welcome',
            component: Welcome
        },
        {
            path: "/register",
            name: 'Register',
            component: Register
        },
        {
            path: "/login",
            name: "Login",
            component: Login
        }
    ]
})

export default routes
