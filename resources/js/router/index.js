import { createRouter, createWebHistory } from 'vue-router'

import HelloWrold from '../components/HelloWorld.vue';

const routes = [
    {
        path: '/dashboard',
        name: 'HelloWorld',
        component: HelloWrold
    },

    {
        path: '/',
        name: 'Index',
        component: () => import("../components/Index"),

    },

    {
        path: '/home',
        name: 'Home',
        component: () => import("../components/Home")
    },

    {
        path: '/test',
        name: 'Test',
        component: () => import("../components/Test")
    },

    {
        path: '/continents',
        name: 'IndexContinent',
        component: () => import("../components/Continent/IndexContinent")
    },

    {
        path: '/continents/create',
        name: 'CreateContinent',
        component: () => import("../components/Continent/CreateContinent")

    },

    {
       path: '/continents/:id',
       name: 'EditContinent',
       component: () => import("../components/Continent/EditContinent")

    },

    {
        path: '/countries',
        name: 'IndexCountrie',
        component: () => import("../components/Country/IndexCountry")
    },

    {
        path: '/countries/create',
        name: 'CreateCountry',
        component: () => import("../components/Country/CreateCountry")

    },

    {
        path: '/countries/:id',
        name: 'EditCountry',
        component: () => import("../components/Country/EditCountry")

    },

    {
        path: '/provinces',
        name: 'IndexProvince',
        component: () => import("../components/Province/IndexProvince")
    },

    {
        path: '/provinces/create',
        name: 'CreateProvince',
        component: () => import("../components/Province/CreateProvince")

    },

    {

        path: '/provinces/:id',
        name: 'EditProvince',
        component: () => import("../components/Province/EditProvince")
    },


    {
        path: '/moves',
        name: 'IndexMove',
        component: () => import("../components/Move/IndexMove")
    },

    {
        path: '/users',
        name: 'IndexUser',
        component: () => import("../components/User/IndexUser")
    },


];

export default createRouter({
    history: createWebHistory(),
    routes
})
