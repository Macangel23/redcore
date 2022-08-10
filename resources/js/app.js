
import './bootstrap';
import { createApp } from 'vue';
import app from './App.vue'
import router from './router';

const vueApp = createApp(app)
vueApp.use(router)
vueApp.mount('#app');
