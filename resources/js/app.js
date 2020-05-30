require('./bootstrap');

window.Vue = require('vue');

import VueRouter from 'vue-router';
Vue.use(VueRouter);

import VueAxios from 'vue-axios';
import axios from 'axios';

import App from './App.vue';
Vue.use(VueAxios, axios);

import IndexComponent from './components/register.vue';
import Product from './components/product.vue';
import Transaction from './components/transaction.vue';
import Login from './components/login.vue';

const routes = [
    {
        name: 'home',
        path: '/',
        component: IndexComponent
    },
    {
        name: 'product',
        path: '/product',
        component: Product
    },
    {
        name: 'transaction',
        path: '/transaction',
        component: Transaction
    },
    {
        name: 'login',
        path: '/login',
        component: Login
    }
];

const router = new VueRouter({
    routes: routes
});

const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');