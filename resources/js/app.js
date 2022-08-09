import './bootstrap';
import { createApp } from 'vue';
import router from './router';
import app from './App.vue'

const vueApp = createApp(app);
vueApp.use(router);
vueApp.mount("#app")
