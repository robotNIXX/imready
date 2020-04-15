import Vue from 'vue'

import VueRouter from 'vue-router'
import VueMaterial from 'vue-material'

import 'vuelayers/lib/style.css'

// Pages
import Home from '../views/pages/Home/Home'
import Profile from '../views/pages/Profile/Profile'
import Dashboard from '../views/pages/Dashboard/Dashboard'
const linkActiveClass = 'my-link-active-class'


Vue.use(VueMaterial)

// Routes
const routes = [
    {
        path: '/',
        name: 'home',
        component: Home,
        meta: {
            auth: undefined
        }
    },
    {
        path: '/profile',
        name: 'profile',
        component: Profile,
        meta: {
            auth: true
        }
    },
    {
        path: '/dashboard',
        name: 'dashboard',
        component: Dashboard,
        meta: {
            auth: true
        }
    }
]

const router = new VueRouter({
    history: true,
    mode: 'history',
    routes,
    linkActiveClass
})

Vue.material.router.linkActiveClass = linkActiveClass

export default router
