<template>
    <!--    ModalWindow-->
    <div class="modal fade" id="modal-danger" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Удаление ряда фотографий</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span>Вы действительно хотите удалить данный фотографии?</span>
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
    <!--    ModalWindow-->
    <div class="modal fade" id="modal-show" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Просмотр изображений</h4>
                    <button type="button" class="close" @click="chooseElement(null)" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div v-if="selectedElement != null">
                        <h5>Изображения объекта: "{{ this.selectedElement.name }}"</h5>
                        <Galleria :value="this.selectedElement.photos" :responsiveOptions="responsiveOptions" :numVisible="5" :circular="true" containerStyle="max-width: 640px"
                                  :showItemNavigators="true" :showThumbnails="false" :showItemNavigatorsOnHover="true" :showIndicators="true">
                            <template #item="slotProps">
                                <img :src="slotProps.item.link" alt="Фотография" style="width: 100%; display: block;" />
                            </template>
                            <template #thumbnail="slotProps">
                                <img :src="slotProps.item.link" alt="Фотография" style="display: block;" />
                            </template>
                        </Galleria>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" @click="chooseElement(null)" class="btn" data-dismiss="modal">Закрыть</button>
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

                <Column field="name" header="Наименование" class="text-secondary" :sortable="true"></Column>

                <Column field="price" header="Цена" class="text-secondary" :sortable="true">
                    <template #body="slotProps">
                        <span class="text-secondary">{{ `${slotProps.data.price} рублей` }}</span>
                    </template>
                </Column>

                <Column>
                    <template #body="slotProps">
                        <div class="d-flex" style="gap: 20px" v-if="slotProps.data.photos.length > 0">
                            <span>
                                <eye-bootstrap5-icon
                                    @click="chooseElement(slotProps.data)"
                                    data-toggle="modal" data-target="#modal-show"
                                    style="font-size: 2rem; color: var(--primary-color);"/>
                            </span>
                            <span>
                                <i @click="chooseElement(slotProps.data)"
                                   class="pi pi-trash" style="font-size: 1rem; color: var(--primary-color);"
                                   data-toggle="modal" data-target="#modal-danger"></i>
                            </span>
                        </div>
                        <div v-else>
                            <Tag><a :href="`/admin/photos/edit/${slotProps.data.id}`" >Изображения отсуствуют! Добавить?</a></Tag>
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

import Galleria from 'primevue/galleria';

import EyeBootstrap5Icon from "../../icons/Eye-Bootstrap5-Icon.vue";
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

            responsiveOptions: [
                {
                    breakpoint: '1300px',
                    numVisible: 4
                },
                {
                    breakpoint: '575px',
                    numVisible: 1
                }
            ]
        };
    },
    components:{
        DataTable,
        Column,
        InputText,
        VueButton: Button,
        PrimeIcons,
        Galleria,
        EyeBootstrap5Icon,
        Tag
    },
    mounted() {
        this.refresh();
    },
    methods: {
        refresh(){
            this.loading = true;
            axios.get('/api/photos').then(resp => {
                this.collectionInfo = resp.data.data;
                this.count = resp.data.data.length;
                this.loading = false;
            });
        },
        chooseElement(slotElement){
            this.selectedElement = slotElement;
        },
        deleteSelected(){
            if(this.selectedElement != null){
                axios.post(`/api/photos/delete/${this.selectedElement.id}`);
                this.selectedElement = null;
                this.refresh();
            }
        },
    }
}
</script>

<style lang="scss" scoped>

</style>
