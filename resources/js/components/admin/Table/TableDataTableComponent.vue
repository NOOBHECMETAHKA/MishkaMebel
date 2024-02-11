<template>
    <div class="col-12">
        <div class="card p-3">
            <DataTable
                :filters="filters"
                :value="tables"
                selectionMode="single"
                dataKey="id"
                :metaKeySelection="false"
                removableSort
                :loading="loading"
                paginator
                :rows="5"
                :rowsPerPageOptions="[5, 10, 20, 50]"
                :size="'small'"
                tableStyle="min-width: 50rem"
                data-key="id">
                <template #header>
                    <div class="d-flex justify-content-between">
                        <span class="p-input-icon-left">
                            <i class="pi pi-search" />
                            <InputText v-model="filters['global'].value" placeholder="Найти"/>
                        </span>
                    </div>
                </template>

                <template #empty><span class="text-secondary">Столы не найдены!</span></template>

                <Column field="materials.name" header="Матеариал" class="text-secondary" :sortable="true"></Column>
                <Column field="furniture_dimensions.length" header="Габаритная длина" class="text-secondary" :sortable="true"></Column>
                <Column field="furniture_dimensions.width" header="Габаритная ширина" class="text-secondary" :sortable="true"></Column>
                <Column field="furniture_dimensions.height" header="Габаритная высота" class="text-secondary" :sortable="true"></Column>


                <template #paginatorstart>
                    <span class="text-secondary">Статус: 0</span>
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

export default {
    data() {
        return {
            tables: null,
            filters: {
                global: { value: null, matchMode: FilterMatchMode.CONTAINS },
            },
            loading: true,
        };
    },
    components:{
        DataTable,
        Column,
        InputText,
        VueButton: Button,
        PrimeIcons,
    },
    mounted() {
        this.refresh();
    },
    methods: {
        refresh(){
            this.loading = true;
            axios.get('/api/tables').then(resp => {
                this.tables = resp.data;
                this.loading = false;
            });
        }
    }
}
</script>

<style lang="scss" scoped>

</style>
