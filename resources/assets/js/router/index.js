import Vue from 'vue'
import Router from 'vue-router'
import Users from '../components/Users.vue'
import Dashboard from '../components/Dashboard.vue'

Vue.use(Router)

export default new Router({
    mode: 'history',
    base: '/dashboard/',
    routes: [
        {
            path: '/Dashboard',
            name: 'Dashboard',
            component: Dashboard
        },
        {
            path: '/Users',
            name: 'Users',
            component: Users
        },
        {
            path: '*',
            redirect: '/Dashboard'
        }
    ]
})