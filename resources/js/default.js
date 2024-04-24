import 'primevue/resources/themes/aura-light-amber/theme.css';
import 'primevue/resources/primevue.css';
import 'primeicons/primeicons.css';

import ToastService from 'primevue/toastservice';
import PrimeVue from "primevue/config";

import { createApp } from 'vue';
import App from './App.vue';
import router from './router';
import axios from "axios";

const app = createApp(App);

axios.defaults.withCredentials = true;
axios.defaults.withXSRFToken = true;
app.config.globalProperties.axios = axios;

app.use(router);
app.use(PrimeVue);
app.use(ToastService);

app.mount('#app');
