<template>
    <!--    ModalWindow-->
    <div class="modal fade" id="modal-redactor" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Заказ #{{ selectedElement !== null ? selectedElement.id : '?' }}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div v-if="this.selectedElement !== null && this.subCollectionInfo !== null">
                            <div v-if="!this.isSelectedElementToRedactorMode">
<!--                            All information about selected order-->
                                <h5>Состав заказа</h5>
                                <div class="p-1" style="max-height: 300px; overflow-y: scroll;">
                                    <div class="card" v-for="element in this.selectedElement.order_lists">
                                        <h6 class="card-header">{{ this.subCollectionInfo.filter(product => element.product_order_list_id === product.id)[0].name }}</h6>
                                        <div class="card-body">
                                            <p>Количество: {{ element.count_product }} штук</p>
                                            <p>Гарантия: {{ this.subCollectionInfo.filter(product => element.product_order_list_id === product.id)[0].guarantee }}</p>
                                            <p>Текущая цена: {{ this.subCollectionInfo.filter(product => element.product_order_list_id === product.id)[0].price }}</p>
                                            <p v-if="this.subCollectionInfo.discounts != null">Действующая ссылка: {{ this.subCollectionInfo.filter(product => element.product_order_list_id === product.id)[0].discounts.percent }}</p>
                                            <hr>
                                            <h6 class="fw-bold text-secondary">Сумма: {{ element.price_sum_product }} рублей</h6>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <h5>Описание</h5>
                                <p>Текущий статус: <Tag severity="info" :value="this.selectedElement.statuses.name" v-tooltip="`Описание: ${this.selectedElement.statuses.description}`"></Tag></p>
                                <p>Доставка: <span :class="this.selectedElement.enabling_deliveries === 0 ? 'text-danger' : 'text-success'">{{ this.selectedElement.enabling_deliveries === 0 ? 'не оплачена' : 'оплачена' }}</span></p>
                                <hr>
                                <p>Общая стоимость: {{ this.selectedElement.total_cost }} рублей</p>
                                <a class="text-primary" @click.prevent="this.isSelectedElementToRedactorMode = true">Редактировать</a>
                            </div>
<!--                            /All information about selected order-->
<!--                            Redactor form for selected order-->
                            <div v-else-if="this.isSelectedElementToRedactorMode">
                                <div class="form-group">
                                    <label class="text-secondary">Выбор статуса</label>
                                    <SelectButton v-model="this.statusOrderParam" :options="this.statuses" optionLabel="name" aria-labelledby="basic" />
                                    <small class="text-secondary" v-if="!v$.statusOrderParam.required.$response">Поле должно быть заполнено!</small>
                                </div>
                                <div class="form-group">
                                    <label class="text-secondary">Доставка</label>
                                    <div>
                                        <ToggleButton v-model="enablingDeliveriesParam" onLabel="Оплачена" offLabel="Не оплачена" />
                                        <small class="text-secondary" v-if="!v$.enablingDeliveriesParam.required.$response">Поле должно быть заполнено!</small>
                                    </div>
                                </div>
                                <a class="text-primary" @click.prevent="this.isSelectedElementToRedactorMode = false">Отменить</a>
                            </div>
<!--                            /Redactor form for selected order-->
                        <div v-else>
                            <i class="pi pi-spin pi-cog fas" style="font-size: 2rem; color: var(--gray-500);"></i>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn" data-dismiss="modal">Закрыть</button>
                    <button type="button" class="btn btn-warning" @click.prevent="onSubmit" data-dismiss="modal">Сохранить</button>
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
                <template #empty><span class="text-secondary">Заказы не найдены!</span></template>

                <Column field="id" header="Номер заказа" class="text-secondary" :sortable="true"></Column>
                <Column field="statuses.name" header="Статус" class="text-secondary" :sortable="true">
                    <template #body="slotProps">
                        <Tag severity="info" :value="slotProps.data.statuses.name" v-tooltip="`Описание: ${slotProps.data.statuses.description}`"></Tag>
                    </template>
                </Column>
                <Column field="ordered_in" header="Время оформления" class="text-secondary" :sortable="true">
                    <template #body="slotProps">
                        <span>{{  String(new Date(slotProps.data.ordered_in).getHours()).padStart(2, '0') }}</span>:<span>{{  String(new Date(slotProps.data.ordered_in).getMinutes()).padStart(2, '0') }}</span>  <span>{{  String(new Date(slotProps.data.ordered_in).getDate()).padStart(2, '0') }}</span>.<span>{{ String(new Date(slotProps.data.ordered_in).getMonth()).padStart(2, '0') }}</span>.<span>{{ new Date(slotProps.data.ordered_in).getFullYear() }}</span>
                    </template>
                </Column>
                <Column field="total_cost" header="Общая сумма" class="text-secondary" :sortable="true">
                    <template #body="slotProps">
                        <span class="text-secondary">{{ slotProps.data.total_cost }} рублей</span>
                    </template>
                </Column>


                <Column>
                    <template #body="slotProps">
                        <div class="d-flex" style="gap: 20px">
                            <span>
                                <i @click="chooseElement(slotProps.data)"
                                   class="pi pi-pencil" style="font-size: 1rem; color: var(--primary-color);"
                                   data-toggle="modal" data-target="#modal-redactor"></i>
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
import Tag from "primevue/tag";
import Accordion from "primevue/accordion";
import AccordionTab from "primevue/accordiontab";
import SelectButton from "primevue/selectbutton";
import ToggleButton from 'primevue/togglebutton';
import axios from "axios";
import {FilterMatchMode} from "primevue/api";
import { PrimeIcons } from 'primevue/api';
import {useVuelidate} from "@vuelidate/core";
import { required} from "@vuelidate/validators";

export default {
    setup(){
        return {
            v$: useVuelidate(),
        }
    },
    validations () {
        return {
            statusOrderParam: { required },
            enablingDeliveriesParam: { required },
        }
    },
    data() {
        return {
            collectionInfo: null,
            subCollectionInfo: null,
            statuses: null,
            count: 0,
            filters: {
                global: { value: null, matchMode: FilterMatchMode.CONTAINS },
            },
            loading: true,
            selectedElement: null,
            isSelectedElementToRedactorMode: false,
            //params
            statusOrderParam: null,
            enablingDeliveriesParam: null
        };
    },
    components:{
        DataTable,
        Column,
        InputText,
        VueButton: Button,
        PrimeIcons,
        Tag,
        Accordion,
        AccordionTab,
        SelectButton,
        ToggleButton
    },
    mounted() {
        this.refresh();
    },
    methods: {
        onSubmit(){
            if(this.v$.$invalid){
                this.v$.$touch();
                return;
            } else{
                this.updateOrder();
            }
        },
        updateOrder(){
            const data = ({ order_status_id: this.statusOrderParam.id, enabling_deliveries: this.enablingDeliveriesParam });
            if(this.selectedElement != null){
                axios.post(`/api/orders/update/${this.selectedElement.id}`, data).then(resp => this.refresh());
            }
        },
        refresh(){
            this.loading = true;
            axios.get('/api/orders').then(resp => {
                this.collectionInfo = resp.data.data;
                this.count = resp.data.data.length;
            });
            axios.get('/api/products').then(
                resp => {
                    this.subCollectionInfo = resp.data.data;
                    this.loading = false;
                }
            );
            axios.get('/api/statuses').then(
                resp => {
                    this.statuses = resp.data;
                }
            );
        },
        chooseElement(slotElement){
            this.selectedElement = slotElement;
            this.statusOrderParam = this.selectedElement != null ? this.statuses.filter(statusElement => statusElement.id === this.selectedElement.order_status_id)[0] : null;
            this.enablingDeliveriesParam = this.selectedElement != null ? !this.selectedElement.enablingDeliveriesParam : false;
        },
        deleteSelected(){
            if(this.selectedElement != null){
                axios.post(`/api/orders/delete/${this.selectedElement.id}`);
                this.selectedElement = null;
                this.refresh();
            }
        },
    }
}
</script>

<style lang="scss" scoped>

</style>
