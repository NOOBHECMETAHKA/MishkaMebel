<template>
    <div>
        <Toast />
        <h3 class="catalog-title">Корзина пользователя</h3>
        <div v-if="!isEmpty(store.personalBasket.cart)">
            <table class="basket-table">
                <tr>
                    <td class="row-info"><span>#</span> Наименование товара</td>
                    <td class="row-info"><span>#</span> Цена товара</td>
                    <td class="row-info"><span>#</span> Количество товара</td>
                    <td class="row-info"><span>#</span> Общяя стоимость</td>
                </tr>
                <tr v-for="product in products">
                    <td class="row-info">{{ product.name }}</td>
                    <td v-if="product.discounts" class="row-info"><span>{{ getPercent(product.price, product.discounts.percent) }}</span> рублей</td>
                    <td v-else class="row-info"><span>{{ Math.round(product.price) }}</span> рублей</td>
                    <td class="row-info">Количество: <span>{{ getCountProduct(product.id) }}</span></td>
                    <td v-if="product.discounts" class="row-info"><span>{{ getPercent(product.price, product.discounts.percent) * getCountProduct(product.id) }}</span> рублей</td>
                    <td v-else class="row-info"><span>{{ Math.round(product.price) * getCountProduct(product.id) }}</span> рублей</td>
                </tr>
            </table>
            <div class="basket-table">
                <p class="row-info">Общая стоимость: <span>{{ totalCost }}</span> рублей</p>
                <div class="catalog-user-action-form-input">
                    <label>Адрес доставки:</label>
                    <dropdown v-model="selectedAddress" empty-message="Адресов нету. Добавить адрес можно на вкладке профиль. Нажмите на свою учётую запись" :options="getFormAddress()" option-label="name" option-value="id" placeholder="Адрес доставки" style="color: var(--main-color);"/>
                    <small v-if="!selectedAddress"><span>#</span> Поле должно быть заполнено!</small>
                    <small><span>?</span> После создания заказа менеджер с вами свяжемся чтобы подтвердить заказ. Оплата заказа происходит строго на месте доставки</small>
                    <div>
                        <vue-prime-button label="Заказать!" @click="checkout()"></vue-prime-button>
                    </div>
                </div>
            </div>
        </div>
        <empty-content v-else :is-finished="!loading"
                       title-loading="Получения данных о товарах"
                       :sub-titles-loading="['Проводятся расчеты стоимости заказа']"
                       title-finished="Корзина пуста"
                       :sub-titles-finished="['Ваша корзина пуста!', 'Для пополнения корзины добавьте товар на страницах каталога']"
        ></empty-content>
    </div>
</template>

<script>
import Dropdown from 'primevue/dropdown';
import Button from "primevue/button";
import { saveUserData, store} from "../store/index.js";
import Toast from 'primevue/toast';
import { useToast } from 'primevue/usetoast';
import EmptyContent from "@/components/blocks/EmptyContent.vue";

export default {
    computed: {
        store(){
            return store;
        },
        saveUserData(){
            return saveUserData;
        }
    },
    components: {
        EmptyContent,
        Dropdown,
        "VuePrimeButton": Button,
        Toast
    },
    data(){
        return {
            products: [],
            totalCost: 0,
            selectedAddress: null,
            dataOrderList: null,
            loading: true,
        };
    },
    setup(){
        useToast();
    },
    mounted() {
        this.getProducts();
    },
    methods: {
        isEmpty(obj) {
            if (obj === null) {
                return true;
            }
            if (Array.isArray(obj)) {
                return obj.length === 0;
            }
            return Object.keys(obj).length === 0;
        },
        getProducts(){
            this.axios.get('/api/catalog/products').then(response => {
                this.loading = false;
                this.products = this.getFilterProduct(response.data.data);
                this.totalCost = this.getFullPrice(this.getFilterProduct(response.data.data));
            }).catch(error => { });
        },
        getFilterProduct(products){
            const keyData = Object.keys(store.personalBasket.cart);
            return products.filter(product => keyData.includes(product.id.toString()));
        },
        getFullPrice(products){
            let totalCost = 0;
            for (const product in products) {
                const productElement = products[product];
                if(productElement.discounts){
                    const price = Number.parseFloat(productElement.price);
                    const discount = Number.parseFloat(productElement.discounts.percent);
                    totalCost += this.getPercent(price, discount) * this.getCountProduct(productElement.id);
                } else {
                    totalCost += Number.parseFloat(productElement.price) * this.getCountProduct(productElement.id);
                }
            }
            return totalCost;
        },
        getOrderList(products){
            let orderList = [];
            for (const product in products) {
                const productElement = products[product];
                let additionalPrice = 0;
                if(productElement.discounts){
                    const price = Number.parseFloat(productElement.price);
                    const discount = Number.parseFloat(productElement.discounts.percent);
                    additionalPrice = this.getPercent(price, discount) * this.getCountProduct(productElement.id);
                } else {
                    additionalPrice = Number.parseFloat(productElement.price) * this.getCountProduct(productElement.id);
                }
                orderList.push({
                        price_sum_product: additionalPrice,
                        count_product: this.getCountProduct(productElement.id),
                        product_order_list_id: productElement.id,
                });
            }
            return orderList;
        },
        getPercent(value, percent){
            return value - (value * percent / 100);
        },
        getCountProduct(ID){
            return store.personalBasket.cart[ID.toString()];
        },
        getFormAddress(){
            const formData = [];
            const addresses = saveUserData.userData.addresses;
            for (const addressesKey in addresses) {
                const address = addresses[addressesKey];
                formData.push({ id: address.id, name: `Город: ${address.City}; улица: ${address.Street}; дом: ${address.House}; подъезд: ${address.Entrance}; квартира: ${address.Apartment};` });
            }
            return formData;
        },
        addProductInBasket(IDProduct){
            if(store.personalBasket.cartItemsCount < 10) {
                store.personalBasket.addToCart(IDProduct);
            }
        },
        checkout(){
            if(this.selectedAddress) {
                const data = {
                    total_cost: this.totalCost,
                    order_address_id: this.selectedAddress,
                    order_list: this.getOrderList(this.products),
                };
                this.axios.post('/api/orders/store', data).then(response => {
                    store.personalBasket.clearCart();
                    this.$toast.add({ severity: 'success', summary: `Заказа записан! Номер заказа: ${response.data.id}`, detail: 'Перейдите в профиль чтобы ознакомиться с ним', life: 10000 });
                });
            } else{
                this.$toast.add({ severity: 'warn', summary: `Для создания заказа требуется выбрать адрес!`, detail: 'Адрес можно добавить в профиле!', life: 10000 });
            }
        }
    }
}
</script>

<style lang="css" scoped>

.empty-content-massage{
    margin-top: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.empty-content-massage i{
    font-size: 4em;
}

.empty-content-massage p {
    padding: 0;
    color: var(--font-color);
    text-align: center;
}

.empty-content-massage h4 {
    padding: 0;
    margin-bottom: 0;
    font-size: 40px;
    text-align: center;
    color: var(--main-color);
}

@media (max-width: 500px) {
    .empty-content-massage h4{
        font-size: 30px;
    }

    .empty-content-massage i{
        font-size: 3em;
    }
}
</style>
