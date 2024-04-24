<template>
    <!--    ModalWindow-->
    <div class="modal fade" id="modal-danger" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Удаление скидки</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <span>Вы действительно хотите удалить данную скидку?</span>
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
        <div class="alert alert-default-secondary">
            <h4 class="alert-heading">Предупреждение!</h4>
            <div>
                <alert-bootstrap5-icon></alert-bootstrap5-icon>
                <span>  Действует <b>последняя</b> установленная скидка!</span>
            </div>
        </div>
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
                <template #empty><span class="text-secondary">Скидки не найдены!</span></template>

                <Column field="percent" header="Процент" class="text-secondary" :sortable="true">
                    <template #body="slotProps">
                        <span>{{ slotProps.data.percent }}%</span>
                    </template>
                </Column>


                <Column field="expiration_discount" header="Срок окончания" class="text-secondary" :sortable="true">
                    <template #body="slotProps">
                        <span>{{  String(new Date(slotProps.data.expiration_discount).getDate()).padStart(2, '0') }}</span>.<span>{{ String(new Date(slotProps.data.expiration_discount).getMonth()).padStart(2, '0') }}</span>.<span>{{ new Date(slotProps.data.expiration_discount).getFullYear() }}</span>
                    </template>
                </Column>

                <Column field="products.name" header="Товар" class="text-secondary" :sortable="true"/>

                <Column header="Подробнее о цене" class="text-secondary">
                    <template #body="slotProps">
                        <span><s>{{ slotProps.data.products.price }}</s>| {{ this.getPercent(slotProps.data.products.price, slotProps.data.percent) }} рублей</span>
                    </template>
                </Column>

                <Column>
                    <template #body="slotProps">
                        <div class="d-flex" style="gap: 20px">
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

import AlertBootstrap5Icon from "../../icons/Alert-Bootstrap5-Icon.vue";
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
        AlertBootstrap5Icon
    },
    mounted() {
        this.refresh();
    },
    methods: {
        refresh(){
            this.loading = true;
            axios.get('/api/discounts').then(resp => {
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
                axios.post(`/api/discounts/delete/${this.selectedElement.id}`);
                this.selectedElement = null;
                this.refresh();
            }
        },
        getPercent(value, percent){
            return value - (value * percent / 100);
        }
    }
}
</script>

<style lang="scss" scoped>

</style>
