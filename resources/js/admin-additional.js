import { createApp } from 'vue';
import PrimeVue from 'primevue/config';
import 'primevue/resources/themes/aura-light-blue/theme.css';
// import 'primevue/resources/themes/lara-dark-blue/theme.css';
import 'primeicons/primeicons.css'


const app = createApp({
    components: {

    }
});

app.use(PrimeVue, {
    zIndex: {
        modal: 1100,        //dialog, sidebar
        overlay: 1000,      //dropdown, overlaypanel
        menu: 1000,         //overlay menus
        tooltip: 1100       //tooltip
    }
});
app.mount('#app-additional');
