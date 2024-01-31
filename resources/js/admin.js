import './plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css';
import './plugins/icheck-bootstrap/icheck-bootstrap.min.css';
import './plugins/jqvmap/jqvmap.min.css';
import './dist/css/adminlte.min.css';
import './plugins/overlayScrollbars/css/OverlayScrollbars.min.css';
import './plugins/daterangepicker/daterangepicker.css';
import './plugins/summernote/summernote-bs4.min.css';

import { createApp } from 'vue';
import PrimeVue from "primevue/config";
import MaterialsDataTableComponent from "./components/admin/Materital/MaterialsDataTableComponent.vue";

const app = createApp({
    components: {
        MaterialList: MaterialsDataTableComponent
    }
});

app.use(PrimeVue);
app.mount('#app');
