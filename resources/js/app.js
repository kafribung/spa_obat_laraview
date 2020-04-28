/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';

import App from './App.vue';
Vue.use(VueAxios, axios);

import Home from './components/Home.vue';
import Create from './components/Create.vue';
import Edit from './components/Edit.vue';


const routes = [{
        name: 'home',
        path: '/page',
        component: Home
    },
    {
        name: 'create',
        path: '/create',
        component: Create
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: Edit
    }
];

const router = new VueRouter({
    mode: 'history',
    routes: routes
});



const app = new Vue(Vue.util.extend({
    router
}, App)).$mount('#app');