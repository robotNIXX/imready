import Vue from 'vue'
import VueRouter from 'vue-router'
import VueLayers from 'vuelayers'
import 'vuelayers/lib/style.css' // needs css-loader

Vue.use(VueLayers, {
    dataProjection: 'EPSG:4326',
})

Vue.use(VueRouter)

import App from './views/App/App'
import Hello from './views/Hello/Hello'
import Home from './views/Home/Home'


const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
        {
            path: '/hello',
            name: 'hello',
            component: Hello,
        },
    ],
});

const app = new Vue({
    el: '#app',
    components: { App },
    router,
});
