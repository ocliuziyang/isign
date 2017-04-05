import Vue from 'vue'
import Router from 'vue-router'
import Users from '../components/Users.vue'
import Dashboard from '../components/Dashboard.vue'
import Buses from '../components/Buses.vue'
import EditUser from '../components/EditUser.vue'
import Wineshop from '../components/Wineshop.vue'
import Meeting from '../components/Meeting.vue'
import SignBus from '../components/sign/SignBus.vue'
import SignMeeting from '../components/sign/SignMeeting.vue'
import SignWineshop from '../components/sign/SignWineshop.vue'
import EditBus from  '../components/EditBus.vue'

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
            path: '/bus/create',
            name: 'busCreate',
            component: EditBus
        },
        {
            path: '/buses/:id/edit',
            name: 'busEdit',
            component: EditBus
        },
        {
            path: '/wineshops',
            name: 'wineShops',
            component: Wineshop
        },
        {
            path: '/meetings',
            name: 'meetings',
            component: Meeting
        },
        {
            path: '/signBus',
            name: 'signBus',
            component: SignBus
        },
        {
            path: '/signMeeting',
            name: 'signMeeting',
            component: SignMeeting
        },
        {
            path: '/signWineshop',
            name: 'signWineshop',
            component: SignWineshop
        },
        {
            path: '*',
            redirect: '/dashboard'
        }
    ]
})