require('./bootstrap');

window.Vue = require('vue').default;

import VueRouter from 'vue-router';
Vue.use(VueRouter);
import VueAxios from 'vue-axios';
import axios from 'axios';
Vue.use(VueAxios,axios);

import App from './App.vue';
import Home from '../js/components/Home.vue';
import ContactList from '../js/components/ContactList.vue';
import AddContact from '../js/components/AddContact.vue';
import EditContact from '../js/components/EditContact.vue';

const routes = [
    {
        name:'/',
        path:'/',
        component:Home
    },
    {
        name:'contacts',
        path:'/contacts',
        component:ContactList
    },
    {
        name:'addContact',
        path:'/addContact',
        component:AddContact
    },
    {
        name: 'edit',
        path: '/edit/:id',
        component: EditContact
    },
    
];

const router = new VueRouter({mode:'history',routes:routes});

const app = new Vue(Vue.util.extend({router},App)).$mount('#app');