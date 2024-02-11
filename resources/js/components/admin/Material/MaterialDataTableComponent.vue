<template>
    <div class="col-12">
        <div class="card p-3">
            <DataTable
                selectionMode="single"
                dataKey="id"
                :metaKeySelection="false"
                removableSort
                v-model:selection="selectedMaterial"
                v-model:filters="filters"
                :loading="loading"
                :value="this.materials"
                paginator
                :rows="5"
                :rowsPerPageOptions="[5, 10, 20, 50]"
                :size="'small'"
                tableStyle="min-width: 50rem"
                data-key="id"
                @row-select="onRowSelect"
                @row-unselect="onRowUnselect">
                <template #header>
                    <div class="d-flex justify-content-between">
                        <span class="p-input-icon-left">
                            <i class="pi pi-search" />
                            <InputText v-model="filters['global'].value" placeholder="Найти" class="text-secondary"/>
                        </span>
                    </div>
                </template>
                <template #empty><span class="text-secondary">Материалы не найдены!</span></template>

                <Column field="name" header="Наименование" class="text-secondary" :sortable="true"></Column>
                <Column field="appointment" header="Назначение" class="text-secondary" :sortable="true"></Column>

                <template #paginatorstart>
                    <span class="text-secondary">Статус выполнения: 0</span>
                </template>

                <template #paginatorend>
                    <vue-button type="button" icon="pi pi-refresh" @click.prevent="refresh()" text/>
                </template>
            </DataTable>
        </div>
    </div>
</template>

<script>
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import InputText from "primevue/inputtext";
import Button from "primevue/button";
import axios from "axios";
import {FilterMatchMode} from "primevue/api";
import { PrimeIcons } from 'primevue/api';

import MaterialModalRedactor from "./MaterialModalRedactor.vue";

export default {
    props: {
        //Массив в формате json - назначения материалов
        appointment: String
    },
    data() {
        return {
            materials: null,
            filters: {
                global: { value: null, matchMode: FilterMatchMode.CONTAINS },
            },
            loading: true,
            selectedMaterial: null,
        };
    },
    components:{
        DataTable,
        Column,
        InputText,
        VueButton: Button,
        PrimeIcons,
        MaterialModalRedactor
    },
    mounted() {
        this.refresh();
    },
    methods: {
        refresh(){
            this.loading = true;
            axios.get('/api/materials').then(resp => {
                this.materials = resp.data;
                this.loading = false;
            });
        },
        onRowSelect(event) {
            this.selectedMaterial = event.data.valueOf();
        },
        onRowUnselect(event) {
            this.selectedMaterial = null;
        }
    }
}
</script>

<style lang="scss" scoped>

</style>
