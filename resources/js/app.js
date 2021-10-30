require('./bootstrap');

import { createApp } from 'vue';
import router from './router'

import HelloWorld from './components/HelloWorld.vue';

createApp({
    components: {
        HelloWorld
    }
}).use(router).mount('#app')
