import {createApp} from 'vue'
import App from '@/App.vue'
import routes from '@/routes';
import {createRouter, createWebHistory} from 'vue-router';
import { createStore } from 'vuex';
import store from '@/store.js';

const router = createRouter({
    history: createWebHistory(),
    routes,
})

const storeConfig = createStore({
    namespaced: true,
    modules: store
})

const app = createApp(App)
app.use(router)
app.use(storeConfig)
app.mount('#app')
