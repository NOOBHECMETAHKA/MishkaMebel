import { createApp } from 'vue';

import MaterialsDataTableComponent from "./components/admin/Materital/MaterialsDataTableComponent.vue";

const app = createApp({
    components: {
        MaterialList: MaterialsDataTableComponent
    }
});

app.mount('#app');
