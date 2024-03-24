<template>
    <!--    ModalWindow-->
    <div class="modal fade" id="modal-danger" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Удаление стола</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span>Вы действительно хотите удалить данный стол?</span>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn" data-dismiss="modal">Закрыть</button>
                    <button type="button" class="btn btn-danger" @click="deleteSelected" data-dismiss="modal">Удалить</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!--    ModalWindow-->
    <div class="col-12">
        <div class="card p-3">
            <DataTable
                ref="dt"
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

                <Column field="type_tables.name" header="Тип стола" class="text-secondary" :sortable="true"></Column>
                <Column field="materials.name" header="Матеариал" class="text-secondary" :sortable="true"></Column>
                <Column field="furniture_dimensions.length" header="Габаритная длина" class="text-secondary" :sortable="true">
                    <template #body="slotProps">
                        <span class="text-secondary">{{ `${slotProps.data.furniture_dimensions.length} см` }}</span>
                    </template>
                </Column>
                <Column field="furniture_dimensions.width" header="Габаритная ширина" class="text-secondary" :sortable="true">
                    <template #body="slotProps">
                        <span class="text-secondary">{{ `${slotProps.data.furniture_dimensions.width} см` }}</span>
                    </template>
                </Column>
                <Column field="furniture_dimensions.height" header="Габаритная высота" class="text-secondary" :sortable="true">
                    <template #body="slotProps">
                        <span class="text-secondary">{{ `${slotProps.data.furniture_dimensions.height} см` }}</span>
                    </template>
                </Column>

                <Column>
                    <template #body="slotProps">
                        <div class="d-flex" style="gap: 20px">
                            <a :href='`/admin/table/edit/${slotProps.data.id}`'>
                                <i class="pi pi-pencil" style="font-size: 1rem; color: var(--primary-color);" ></i>
                            </a>
                            <span>
                                <i @click="chooseElement(slotProps.data)"
                                   class="pi pi-trash" style="font-size: 1rem; color: var(--primary-color);"
                                   data-toggle="modal" data-target="#modal-danger"></i>
                            </span>
                        </div>
                    </template>
                </Column>


                <template #paginatorstart>
                    <span class="text-secondary">Количество: {{ this.count }}</span>
                </template>

                <template #paginatorend>
                    <vue-button type="button" icon="pi pi-download" @click.prevent="exportCSV()" text/>
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
            count: 0,
            filters: {
                global: { value: null, matchMode: FilterMatchMode.CONTAINS },
            },
            loading: true,
            selectedElement: null
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
                this.count = resp.data.length;
                this.loading = false;
            });
        },
        chooseElement(slotElement){
            this.selectedElement = slotElement;
            console.log(this.selectedElement);
        },
        deleteSelected(){
            console.log(this.selectedElement);
            if(this.selectedElement != null){
                axios.post(`/api/table/delete/${this.selectedElement.id}`);
                this.selectedElement = null;
                this.refresh();
            }
        },
        exportCSV() {
            this.$refs.dt.exportCSV();
        },
    },
}
</script>

<style lang="scss" scoped>

</style>
