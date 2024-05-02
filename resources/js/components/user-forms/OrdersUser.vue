<template>
    <Dialog v-model:visible="isOrderDescriptionActive" modal header="Меню навигации" :style="{ width: '35rem' }">
        <template #header>
            <img class="min-logo" src="/image/Logo.png" alt="MishkaMebelLogo">
            <span class="__modal_card_title">Мишка мебель</span>
        </template>
        <p class="row-info"><span>Адрес:</span> {{ `Город: ${selectOrder.addresses.City}; улица: ${selectOrder.addresses.Street}; дом: ${selectOrder.addresses.House}; подъезд: ${selectOrder.addresses.Entrance}; квартира: ${selectOrder.addresses.Apartment};` }}</p>
        <table>
            <tr>
                <td class="row-info"><span>#</span> Наименование товара</td>
                <td class="row-info"><span>#</span> Цена товара</td>
                <td class="row-info"><span>#</span> Количество товара</td>
                <td class="row-info"><span>#</span> Общяя стоимость</td>
            </tr>
            <tr v-for="product in selectOrder.order_lists">
                <td class="row-info">{{ product.products.name }}</td>
                <td class="row-info"><span>{{ product.price_sum_product / product.count_product }}</span> рублей</td>
                <td class="row-info">Количество: <span>{{ product.count_product }}</span></td>
                <td class="row-info"><span>{{ product.price_sum_product }}</span> рублей</td>
            </tr>
        </table>
    </Dialog>
    <div class="catalog-user-action">
        <p class="catalog-sub-title">Ваши заказы</p>
        <div v-if="!isEmpty(orders)">
            <table class="order-table">
                <tr>
                    <td class="row-info"><span>#</span> Номер заказа</td>
                    <td class="row-info"><span>#</span> Статус заказа</td>
                    <td class="row-info"><span>#</span> Дата и время оформеления</td>
                    <td class="row-info"><span>#</span> Полная стоимость заказа</td>
                </tr>
                <tr v-for="order in orders">
                    <td class="row-info">#{{ order.id }}</td>
                    <td><Tag severity="info" :value="order.statuses.name" v-tooltip="order.statuses.description"></Tag></td>
                    <td class="row-info">{{ String(new Date(order.ordered_in).getHours()).padStart(2, '0') }}:{{  String(new Date(order.ordered_in).getMinutes()).padStart(2, '0') }}  {{  String(new Date(order.ordered_in).getDate()).padStart(2, '0') }}.{{ String(new Date(order.ordered_in).getMonth()).padStart(2, '0') }}.{{ new Date(order.ordered_in).getFullYear() }}</td>
                    <td class="row-info"><span>{{ order.total_cost }}</span> рублей</td>
                    <td>
                        <vue-prime-button icon="pi pi-info" @click="getOrderInfo(order.id)"></vue-prime-button>
                    </td>
                </tr>
            </table>
        </div>
        <empty-content v-else :is-finished="!loading"
                       title-loading="Поиск ваших заказов"
                       :sub-titles-loading="['Это быстро, подождём!']"
                       title-finished="Данные о заказах отсуствует"
                       :sub-titles-finished="['Для совершения заказа добавте адрес.',
                        'После можно собирать корзину и оформлять заказ.']"/>
    </div>
</template>

<script>
import { saveUserData } from "../../store/index.js";
import Button from "primevue/button";
import EmptyContent from "../blocks/EmptyContent.vue";
import Tag from 'primevue/tag';
import Tooltip from 'primevue/tooltip';
import Dialog from 'primevue/dialog';
export default {
    components: {EmptyContent, Tag, Tooltip, "VuePrimeButton": Button, Dialog},
    computed:{
        saveUserData(){
            return saveUserData;
        }
    },
    data(){
        return {
            orders: [],
            loading: true,
            isOrderDescriptionActive: false,
            selectOrder: null,
        };
    },
    mounted() {
        this.getOrders();
    },
    methods: {
        getOrders(){
            this.axios.get('/api/orders').then(response => {
                const responseData = response.data.data;
                this.loading = false;
                if(!this.isEmpty(responseData)){
                    this.orders = responseData.filter(order => saveUserData.userData.uIDData.id === order.addresses.addresses_user_id);
                }
            });
        },
        isEmpty(obj) {
            if (obj === null) {
                return true;
            }
            if (Array.isArray(obj)) {
                return obj.length === 0;
            }
            return Object.keys(obj).length === 0;
        },
        getOrderInfo(IDOrder){
            this.selectOrder = this.orders.find(order => order.id === IDOrder);
            if(this.selectOrder){
                this.isOrderDescriptionActive = true;
            }
        }
    }
}
</script>

<style lang="css" scoped>

</style>
