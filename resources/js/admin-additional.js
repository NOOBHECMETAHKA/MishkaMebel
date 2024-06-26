import { createApp } from 'vue';
import PrimeVue from 'primevue/config';
import 'primevue/resources/themes/aura-light-blue/theme.css';
import 'primeicons/primeicons.css';
import Tooltip from 'primevue/tooltip';

import StatusDataTableComponent from "./components/admin-additional/Status/StatusDataTableComponent.vue";
import ProductDataTableComponent from "./components/admin-additional/Product/ProductDataTableComponent.vue";
import ProductModalRedactor from "./components/admin-additional/Product/ProductModalRedactor.vue";
import ProductModalRedactorUpdate from "./components/admin-additional/Product/ProductModalRedactor-update.vue";
import PersonalInformationDataTableComponent from "./components/admin-additional/PersonalInformation/PersonalInformationDataTableComponent.vue";
import DiscountDataTableComponent from "./components/admin-additional/Discount/DiscountDataTableComponent.vue";
import DiscountModalRedactor from "./components/admin-additional/Discount/DiscountModalRedactor.vue";
import PhotoDataTableComponent from "./components/admin-additional/Photo/PhotoDataTableComponent.vue";
import ContactInfoDatableComponent from "./components/admin-additional/ContactInfo/ContactInfoDatableComponent.vue";
import OrderDataTableComponent from "./components/admin-additional/Order/OrderDataTableComponent.vue";
//statistic
import TypeProductCountChartStatistic from "./components/admin-additional/Statistic/TypeProductCountChartStatistic.vue";
import axios from "axios";

const app = createApp({
    components: {
        StatusDataTableComponent,
        ProductDataTableComponent,
        ProductModalRedactor,
        ProductModalRedactorUpdate,
        PersonalInformationDataTableComponent,
        DiscountDataTableComponent,
        DiscountModalRedactor,
        PhotoDataTableComponent,
        TypeProductCountChartStatistic,
        ContactInfoDatableComponent,
        OrderDataTableComponent,
        Tooltip,
    }
});

axios.defaults.withCredentials = true;
axios.defaults.withXSRFToken = true;
app.config.globalProperties.axios = axios;

app.use(PrimeVue, {
    zIndex: {
        modal: 1100,        //dialog, sidebar
        overlay: 1000,      //dropdown, overlaypanel
        menu: 1000,         //overlay menus
        tooltip: 1100       //tooltip
    }
});

app.directive('tooltip', Tooltip);

app.mount('#app-additional');
