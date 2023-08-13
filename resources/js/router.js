import { createRouter, createWebHistory } from 'vue-router'

import Home from './components/admin/Home.vue'
import Leads from './components/admin/Leads.vue'

const routes = [
    {
        path: '/admin',
        name: 'Home',
        component: Home
    },
    {
        path: '/admin/leads',
        name: 'Leads',
        component: Leads
    },
];

export default createRouter({
    history: createWebHistory(),
    routes
})