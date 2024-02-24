<template>
    <!--    ModalWindow-->
    <div class="modal fade" id="modal-danger" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Удаление товара из ассортимента</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span>Вы действительно хотите удалить данный товар?</span>
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
                <template #empty><span class="text-secondary">Товары не найдены!</span></template>

                <Column header="Статус" class="text-secondary">
                    <template #body="slotProps">
                        <Tag :value="slotProps.data.is_deleted ? 'Скрыт' : 'В ассортименте'" :severity="slotProps.data.is_deleted ? 'danger' : 'success'" />
                    </template>
                </Column>

                <Column field="name" header="Наименование" class="text-secondary" :sortable="true"></Column>
                <Column field="description" header="Описание" class="text-secondary" :sortable="true"></Column>
                <Column field="guarantee" header="Гарантия" class="text-secondary" :sortable="true"></Column>
                <Column field="price" header="Price" :sortable="true">
                    <template #body="slotProps">
                        <span class="text-secondary">{{ `${slotProps.data.price} рублей` }}</span>
                    </template>
                </Column>
                <Column header="Категория" class="text-secondary" :sortable="true">
                    <template #body="slotProps">
                        <span class="text-secondary">{{ getCategory(slotProps.data.category) }}</span>
                    </template>
                </Column>

                <Column>
                    <template #body="slotProps">
                        <div class="d-flex" style="gap: 20px">
                            <span v-if="slotProps.data.is_deleted">
                                <fire-bootstrap5-icon style="font-size: 1rem; color: var(--primary-color);" @click="freezeSelected(slotProps.data.id, false)"></fire-bootstrap5-icon>
                            </span>
                            <span v-else>
                                <snow-bootstrap5-icon style="font-size: 1rem; color: var(--primary-color);" @click="freezeSelected(slotProps.data.id, true)"></snow-bootstrap5-icon>
                            </span>
                            <a :href='`/admin/products/edit/${slotProps.data.id}`'>
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
import SnowBootstrap5Icon from "@/svg/Snow-Bootstrap5-Icon.vue";
import FireBootstrap5Icon from "@/svg/Fire-Bootstrap5-Icon.vue";

export default {
    props: {
        translate: "translate",
    },
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
        Tag,
        SnowBootstrap5Icon,
        FireBootstrap5Icon
    },
    mounted() {
        this.refresh();
    },
    methods: {
        refresh(){
            this.loading = true;
            axios.get('/api/products').then(resp => {
                this.collectionInfo = resp.data;
                this.count = resp.data.length;
                this.loading = false;
            });
        },
        chooseElement(slotElement){
            this.selectedElement = slotElement;
        },
        freezeSelected(id_product, isFreeze){
            axios.post(`/api/products/${id_product}/freeze/${isFreeze ? 'frost' : 'defrost'}`).then(resp => {
                console.log(resp);
            });
            this.selectedElement = null;
            this.refresh();
        },
        deleteSelected(){
            if(this.selectedElement != null){
                axios.post(`/api/products/delete/${this.selectedElement.id}`).then(resp => {
                    console.log(resp);
                });
                this.selectedElement = null;
                this.refresh();
            }
        },
        getCategory(keyCategory){
            let json = JSON.parse(this.translate);
            return json[keyCategory];
        },
    }
}
</script>

<style lang="scss" scoped>

</style>
