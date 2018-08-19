window.Vue = require('vue');
import Vue from 'vue'
import VueRouter from 'vue-router'
import VueMaterial from 'vue-material'
import 'vue-material/dist/vue-material.min.css'
import 'vue-material/dist/theme/default.css'
import VueClipboard from 'vue-clipboard2'


require('./bootstrap')

Vue.use(VueRouter)
Vue.use(VueMaterial)
VueClipboard.config.autoSetContainer = true // add this line
Vue.use(VueClipboard)

Vue.component('vue-header', require('./components/Layouts/Header.vue'))

const router = new VueRouter({
    mode: 'history',
    routes: [
        { path: '/', component: require('./components/Password/Index.vue') }
        ]
})

const app = new Vue({
    router,
    el: '#app'
})
