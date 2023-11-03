import { createRouter, createWebHistory } from 'vue-router'

import Home from './components/admin/Home.vue'
import Leads from './components/admin/leads/Index.vue'
import Pages from './components/admin/pages/Index.vue'
import PageMaster from './components/admin/pages/Master.vue'
import HomePage from './components/admin/homepage/Edit.vue'
import AboutPage from './components/admin/about-page/Edit.vue'
import PricelistPage from './components/admin/pricelist-page/Edit.vue'
import Settings from './components/admin/settings/Edit.vue'

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
    {
        path: '/admin/homepage',
        name: 'HomePage',
        component: HomePage
    },
    {
        path: '/admin/about-page',
        name: 'AboutPage',
        component: AboutPage
    },
    {
        path: '/admin/pricelist-page',
        name: 'PricelistPage',
        component: PricelistPage
    },
    {
        path: '/admin/settings',
        name: 'Settings',
        component: Settings
    },
];

export default createRouter({
    history: createWebHistory(),
    routes
})