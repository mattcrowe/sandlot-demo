/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';

window.VueRouter = VueRouter;
Vue.use(VueRouter);
Vue.config.devtools = true;

import notes from './admin/notes/routes';

const router = new VueRouter({
    mode: 'history',
    base: '/admin',
    routes: []
});
router.addRoutes(notes);

const admin = new Vue({router}).$mount('#app');