import { createRouter, createWebHistory } from 'vue-router'

import HelloWrold from '../components/HelloWorld.vue';

const routes = [
    {
        path: '/dashboard',
        name: 'HelloWorld',
        component: HelloWrold
    }
];

export default createRouter({
    history: createWebHistory(),
    routes
})
