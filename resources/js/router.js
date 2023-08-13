import { createRouter, createWebHistory } from 'vue-router'

import Home from './components/admin/Home'

const routes = [
    {
        path: '/admin',
        name: 'Home',
        component: Home
    },
];

export default createRouter({
    history: createWebHistory(),
    routes
})