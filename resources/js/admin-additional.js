import { createApp } from 'vue';
import PrimeVue from 'primevue/config';
import 'primevue/resources/themes/aura-light-blue/theme.css';
// import 'primevue/resources/themes/lara-dark-blue/theme.css';
import 'primeicons/primeicons.css'

import StatusDataTableComponent from "./components/admin-additional/Status/StatusDataTableComponent.vue";
import ProductDataTableComponent from "./components/admin-additional/Product/ProductDataTableComponent.vue";
import ProductModalRedactor from "./components/admin-additional/Product/ProductModalRedactor.vue";
import ProductModalRedactorUpdate from "./components/admin-additional/Product/ProductModalRedactor-update.vue";
import PersonalInformationDataTableComponent from "./components/admin-additional/PersonalInformation/PersonalInformationDataTableComponent.vue";
import DiscountDataTableComponent from "./components/admin-additional/Discount/DiscountDataTableComponent.vue";
import DiscountModalRedactor from "./components/admin-additional/Discount/DiscountModalRedactor.vue";


const app = createApp({
    components: {
        StatusDataTableComponent,
        ProductDataTableComponent,
        ProductModalRedactor,
        ProductModalRedactorUpdate,
        PersonalInformationDataTableComponent,
        DiscountDataTableComponent,

        DiscountModalRedactor
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
