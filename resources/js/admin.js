import { createApp } from 'vue';
import PrimeVue from 'primevue/config';
import 'primevue/resources/themes/aura-light-blue/theme.css';
// import 'primevue/resources/themes/lara-dark-blue/theme.css';
import 'primeicons/primeicons.css'

//DataTables
import MaterialDataTableComponent from "./components/admin/Material/MaterialDataTableComponent.vue";
import BedDataTableComponent from "./components/admin/Bed/BedDataTableComponent.vue"
import BedBaseDataTableComponent from "./components/admin/BedBase/BedBaseDataTableComponent.vue"
import FurnitureDimensionsDataTableComponent from "./components/admin/FurnitureDimensions/FurnitureDimensionsDataTableComponent.vue"
import FurnitureSizeDataTableComponent from "./components/admin/FurnitureSize/FurnitureSizeDataTableComponent.vue"
import FurnitureStorageDataTableComponent from "./components/admin/FurnitureStorage/FurnitureStorageDataTableComponent.vue"
import MattressDataTableComponent from "./components/admin/Mattress/MattressDataTableComponent.vue"
import MattressCoverDataTableComponent from "./components/admin/MattressCover/MattressCoverDataTableComponent.vue"
import MattressFasteningDataTableComponent from "./components/admin/MattressFastening/MattressFasteningDataTableComponent.vue"
import TableDataTableComponent from "./components/admin/Table/TableDataTableComponent.vue"
import TypeTableDataTableComponent from "./components/admin/TypeTable/TypeTableDataTableComponent.vue"
// import PersonalInformationDataTableComponent from "./components/admin-page-content/PersonalInformation/PersonalInformationDataTableComponent.vue"

//AddForms
import FurnitureSizeModalRedactor from "./components/admin/FurnitureSize/FurnitureSizeModalRedactor.vue";
import FurnitureDimensionModalRedactor from "./components/admin/FurnitureDimensions/FurnitureDimensionModalRedactor.vue";
import MattressFasteningModalRedactor from "./components/admin/MattressFastening/MattressFasteningModalRedactor.vue";
import TypeTableModalRedactor from "./components/admin/TypeTable/TypeTableModalRedactor.vue";

//UpdateForms
import FurnitureSizeModalRedactorUpdate from "./components/admin/FurnitureSize/FurnitureSizeModalRedactor-update.vue";
import FurnitureDimensionModalRedactorUpdate from "./components/admin/FurnitureDimensions/FurnitureDimensionModalRedactor-update.vue";

const app = createApp({
    components: {
        //Модули вывода
        MaterialList: MaterialDataTableComponent,
        BedList: BedDataTableComponent,
        BedBaseList: BedBaseDataTableComponent,
        FurnitureDimensionsList: FurnitureDimensionsDataTableComponent,
        FurnitureSizeList: FurnitureSizeDataTableComponent,
        FurnitureStorageList: FurnitureStorageDataTableComponent,
        MattressList: MattressDataTableComponent,
        MattressCoverList: MattressCoverDataTableComponent,
        MattressFasteningList: MattressFasteningDataTableComponent,
        // PersonalInformationList: PersonalInformationDataTableComponent,
        TableList: TableDataTableComponent,
        TypeTableList: TypeTableDataTableComponent,

        //Формы добавления
        FurnitureSizeModalRedactor,
        FurnitureDimensionModalRedactor,
        MattressFasteningModalRedactor,
        TypeTableModalRedactor,

        //Формы обновления
        FurnitureSizeModalRedactorUpdate,
        FurnitureDimensionModalRedactorUpdate
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
app.mount('#app');
