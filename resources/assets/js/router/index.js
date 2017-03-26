import Vue from 'vue'
import Router from 'vue-router'
import Users from '../components/Users.vue'
import Dashboard from '../components/Dashboard.vue'
import Buses from '../components/Buses.vue'
import EditUser from '../components/EditUser.vue'

Vue.use(Router)

export default new Router({
    mode: 'history',
    base: '/dashboard/',
    routes: [
        {
            path: '/',
            name: 'dashboard',
            component: Dashboard
        },
        {
            path: '/users',
            name: 'users',
            component: Users
        },
        {
            path: '/user/:action',
            name: 'user',
            component: EditUser
        },
        {
            path: '/buses',
            name: '/buses',
            component: Buses
        },
        {
            path: '*',
            redirect: '/dashboard'
        }
    ]
})