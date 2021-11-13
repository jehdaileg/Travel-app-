require('./bootstrap');

import { createApp } from 'vue';
import router from './router'

//import Vue from "vue";

//import common from "./common";

//import ViewUI from 'view-design';

import HelloWorld from './components/HelloWorld.vue';

//createApp.use(ViewUI);

//createApp.mixin(common);

createApp({
    components: {
        HelloWorld
    }
}).use(router)
  
  
  .mount('#app')
