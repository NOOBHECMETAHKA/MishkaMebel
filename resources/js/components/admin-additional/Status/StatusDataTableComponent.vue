<template>
    <!--    ModalWindow-->
    <div class="modal fade" id="modal-danger" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Блокировка статуса</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span>Вы действительно хотите заблокировать данный статус?</span>
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
                selectionMode="single"
                dataKey="id"
                :metaKeySelection="false"
                removableSort
                v-model:filters="filters"
                :loading="loading"
                :value="this.collectionInfo"
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
                <template #empty><span class="text-secondary">Статусы не найдены!</span></template>

                <Column header="Статус" class="text-secondary">
                    <template #body="slotProps">
                        <Tag :value="slotProps.data.is_deleted ? 'Заблокирован' : 'Активен'" :severity="slotProps.data.is_deleted ? 'danger' : 'success'" />
                    </template>
                </Column>

                <Column field="name" header="Наименование" class="text-secondary" :sortable="true"></Column>
                <Column field="description" header="Описание" class="text-secondary"></Column>

                <Column>
                    <template #body="slotProps">
                        <div class="d-flex" style="gap: 20px">
                            <a :href='`/admin/statuses/edit/${slotProps.data.id}`'>
                                <i class="pi pi-pencil" style="font-size: 1rem; color: var(--primary-color);" ></i>
                            </a>
                        </div>
                    </template>
                </Column>

                <template #paginatorstart>
                    <span class="text-secondary">Количество записей: {{ this.count }}</span>
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

import Tag from "primevue/tag";

export default {
    data() {
        return {
            collectionInfo: null,
            count: 0,
            filters: {
                global: { value: null, matchMode: FilterMatchMode.CONTAINS },
            },
            loading: true,
            selectedElement: null,
        };
    },
    components:{
        DataTable,
        Column,
        InputText,
        VueButton: Button,
        PrimeIcons,

        Tag
    },
    mounted() {
        this.refresh();
    },
    methods: {
        refresh(){
            this.loading = true;
            axios.get('/api/statuses').then(resp => {
                this.collectionInfo = resp.data;
                this.count = resp.data.length;
                this.loading = false;
            });
        },
        chooseElement(slotElement){
            this.selectedElement = slotElement;
        },
        deleteSelected(){
            if(this.selectedElement != null){
                axios.post(`/api/statuses/delete/${this.selectedElement.id}`);
                this.selectedElement = null;
                this.refresh();
            }
        }
    }
}
</script>

<style lang="scss" scoped>

</style>
