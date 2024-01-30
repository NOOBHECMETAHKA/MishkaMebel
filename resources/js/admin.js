import { createApp } from 'vue';

import MaterialsDataTableComponent from "./components/admin/Materital/MaterialsDataTableComponent.vue";
//import test from "./components/admin/test.vue";

const app = createApp({
    components: {
        MaterialList: MaterialsDataTableComponent
    }
});

app.mount('#app');
