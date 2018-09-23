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

Vue.component('filter-search', require('js/filters/search.vue'));
Vue.component('heading', require('js/base/heading.vue'));
Vue.component('pagination', require('js/base/pagination.vue'));

import players from './admin/players/routes';
import teams from './admin/teams/routes';

const router = new VueRouter({
    mode: 'history',
    base: '/admin',
    routes: []
});
router.addRoutes(players);
router.addRoutes(teams);

const admin = new Vue({router}).$mount('#app');