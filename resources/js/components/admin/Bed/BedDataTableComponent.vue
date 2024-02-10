<template>
    <div class="col-12">
        <div class="card p-3">
            <DataTable
                :value="beds"
                :filters="filters"
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

                <template #empty><span class="text-secondary">Кровати не найдены!</span></template>

                <Column field="type" header="Вид кровати" class="text-secondary" :sortable="true"></Column>
                <Column field="have_boxes" header="Наличие ящиков" class="text-secondary" :sortable="true"></Column>
                <Column field="bed_bases.name" header="Вид лежачих оснований" class="text-secondary" :sortable="true"></Column>
                <Column field="materials.name" header="Материал" class="text-secondary" :sortable="true"></Column>
                <Column field="furniture_sizes.length" header="Длина" class="text-secondary" :sortable="true"></Column>
                <Column field="furniture_sizes.width" header="Ширина" class="text-secondary" :sortable="true"></Column>

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
            beds: null,
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
            axios.get('/api/beds').then(resp => {
                this.beds = resp.data;
                this.beds = this.beds.map(obj => ({ ...obj, have_boxes: obj.have_boxes === 0 ? 'Отсутствует' : 'Есть'}));
                this.loading = false;
            });
        }
    }
}
</script>

<style lang="scss" scoped>

</style>
