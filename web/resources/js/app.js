// Set Vue globally
window.Vue = Vue

import 'es6-promise/auto'
import axios from 'axios'
import './bootstrap'
import Vue from 'vue'
import VueAuth from '@websanova/vue-auth'
import VueAxios from 'vue-axios'
import VueRouter from 'vue-router'
import auth from './config/auth.js'
import router from './config/routes.js'
import VueLayers from 'vuelayers'
import VueMaterial from 'vue-material'
import 'vue-material/dist/vue-material.min.css'
import store from './stores/index';
import vueMoment from 'vue-moment';

import App from './views/App/App';

const moment = require('moment')
require('moment/locale/ru')

// Set Vue router
Vue.router = router
Vue.use(VueRouter)
// Set Vue authentication
Vue.use(VueAxios, axios)
axios.defaults.baseURL = '/api'
Vue.use(VueAuth, auth)
Vue.use(VueMaterial)
Vue.material.locale.dateFormat = 'dd.MM.yyyy'
Vue.use(vueMoment, {
    moment
});

Vue.use(VueLayers, {
    dataProjection: 'EPSG:4326',
})


// Load Index
Vue.component('app', App)
const app = new Vue({
    el: '#app',
    router,
    store
});
// new Vue(App).$mount('#app');

// import Vue from 'vue';
// import VueRouter from 'vue-router';
// import axios from 'axios';
// import VueAxios from 'vue-axios';
// import VueLayers from 'vuelayers'
// import VueMaterial from 'vue-material'
// import 'vuelayers/lib/style.css'
// import 'vue-material/dist/vue-material.min.css'
//
//
// import App from './views/App/App';
// import Dashboard from './views/pages/Dashboard/Dashboard';
// import Home from './views/pages/Home/Home';
// import Profile from './views/pages/Profile/Profile';
//
//
// Vue.use(VueRouter);
// Vue.use(VueAxios, axios);
// Vue.use(VueMaterial)
//
// Vue.use(VueLayers, {
//     dataProjection: 'EPSG:4326',
// })
//
// axios.defaults.baseURL = 'http://localhost:3000/api/v1';
// Vue.material.locale.dateFormat = 'dd.MM.yyyy'
//
//
// const router = new VueRouter({
//     mode: 'history',
//     routes: [
//         {
//             path: '/',
//             name: 'home',
//             component: Home,
//             meta: {
//                 auth: false
//             }
//         },
//         {
//             path: '/profile',
//             name: 'profile',
//             component: Profile,
//             meta: {
//                 auth: true
//             }
//         },
//         {
//             path: '/dashboard',
//             name: 'dashboard',
//             component: Dashboard,
//             meta: {
//                 auth: true
//             }
//         }
//     ],
//     linkActiveClass
// });
// const linkActiveClass = 'my-link-active-class'
//
// Vue.router = router
// Vue.use(require('@websanova/vue-auth'), {
//     auth: require('@websanova/vue-auth/drivers/auth/bearer.js'),
//     http: require('@websanova/vue-auth/drivers/http/axios.1.x.js'),
//     router: require('@websanova/vue-auth/drivers/router/vue-router.2.x.js'),
// });
// App.router = Vue.router
// Vue.material.router.linkActiveClass = linkActiveClass
//
// new Vue(App).$mount('#app');
//
// // import Vue from 'vue'
// // import VueRouter from 'vue-router'
// // import VueLayers from 'vuelayers'
// // import VueMaterial from 'vue-material'
// // import axios from 'axios';
// // import VueAxios from 'vue-axios';
// //
// // import 'vuelayers/lib/style.css'
// // import 'vue-material/dist/vue-material.min.css'
// //
// // Vue.use(VueLayers, {
// //     dataProjection: 'EPSG:4326',
// // })
// //
// // Vue.use(require('@websanova/vue-auth'), {
// //     auth: require('@websanova/vue-auth/drivers/auth/bearer.js'),
// //     http: require('@websanova/vue-auth/drivers/http/axios.1.x.js'),
// //     router: require('@websanova/vue-auth/drivers/router/vue-router.2.x.js'),
// // });
// //
// //
// // import App from './views/App/App'
// // import Home from './views/pages/Home/Home'
// // import Profile from './views/pages/Profile/Profile'
// // import Dashboard from './views/pages/Dashboard/Dashboard'
// //
// // const linkActiveClass = 'my-link-active-class'
// //
// // Vue.use(VueRouter)
// // Vue.use(VueMaterial)
// // Vue.use(VueAxios, axios);
// // Vue.material.locale.dateFormat = 'dd.MM.yyyy'
// //
// //
// // const router = new VueRouter({
// //     mode: 'history',
// //     routes: [
// //         {
// //             path: '/',
// //             name: 'home',
// //             component: Home,
// //             meta: {
// //                 auth: false
// //             }
// //         },
// //         {
// //             path: '/profile',
// //             name: 'profile',
// //             component: Profile,
// //             meta: {
// //                 auth: true
// //             }
// //         },
// //         {
// //             path: '/dashboard',
// //             name: 'dashboard',
// //             component: Dashboard,
// //             meta: {
// //                 auth: true
// //             }
// //         }
// //     ],
// //     linkActiveClass
// // });
// //
// // Vue.router = router
// //
// // App.router = Vue.router
// //
// // Vue.material.router.linkActiveClass = linkActiveClass
// //
// // axios.defaults.baseURL = 'http://localhost:3000/api/v1';
// //
// // // const app = new Vue({
// // //     el: '#app',
// // //     components: {App},
// // //     router,
// // // });
// // new Vue(App).$mount('#app');
