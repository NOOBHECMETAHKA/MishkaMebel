<template>
    <!--    ModalWindow-->
    <div class="modal fade" id="modal-danger" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Удаление размера</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span>Вы действительно хотите удалить данный чехол?</span>
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
                :value="mattress_cover"
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
                            <InputText v-model="filters['global'].value" placeholder="Найти" class="text-secondary"/>
                        </span>
                    </div>
                </template>
                <template #empty><span class="text-secondary">Чехлы не найдены!</span></template>

                <Column field="function" header="Функциональное назначение" class="text-secondary" :sortable="true"></Column>
                <Column field="mattress_fastenings.name" header="Крепление" class="text-secondary" :sortable="true"></Column>
                <Column field="furniture_sizes.length" header="Длина" class="text-secondary" :sortable="true">
                    <template #body="slotProps">
                        <span class="text-secondary">{{ `${slotProps.data.furniture_sizes.length} см` }}</span>
                    </template>
                </Column>
                <Column field="furniture_sizes.width" header="Ширина" class="text-secondary" :sortable="true">
                    <template #body="slotProps">
                        <span class="text-secondary">{{ `${slotProps.data.furniture_sizes.width} см` }}</span>
                    </template>
                </Column>

                <Column>
                    <template #body="slotProps">
                        <div class="d-flex" style="gap: 20px">
                            <a :href='`/admin/mattress-cover/edit/${slotProps.data.id}`'>
                                <i class="pi pi-pencil" style="font-size: 1rem; color: var(--primary-color);" ></i>
                            </a>
                            <i @click="chooseElement(slotProps.data)"
                               class="pi pi-trash" style="font-size: 1rem; color: var(--primary-color);"
                               data-toggle="modal" data-target="#modal-danger"></i>
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
            mattress_cover: null,
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
            axios.get('/api/mattress-covers').then(resp => {
                this.mattress_cover = resp.data;
                this.count = resp.data.length;
                this.loading = false;
            });
        },
        chooseElement(slotElement){
            this.selectedElement = slotElement;
        },
        deleteSelected(){
            if(this.selectedElement != null){
                axios.post(`/api/mattress-cover/delete/${this.selectedElement.id}`);
                this.selectedElement = null;
                this.refresh();
            }
        },
        exportCSV() {
            this.$refs.dt.exportCSV();
        },
    }
}
</script>

<style lang="scss" scoped>

</style>
