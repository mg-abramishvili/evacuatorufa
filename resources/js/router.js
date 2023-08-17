import { createRouter, createWebHistory } from 'vue-router'

import Home from './components/admin/Home.vue'
import Leads from './components/admin/leads/Index.vue'
import Pages from './components/admin/pages/Index.vue'
import PageMaster from './components/admin/pages/Master.vue'

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
    {
        path: '/admin/pages',
        name: 'Pages',
        component: Pages
    },
    {
        path: '/admin/page-master/:id?',
        name: 'PageMaster',
        component: PageMaster
    },
];

export default createRouter({
    history: createWebHistory(),
    routes
})