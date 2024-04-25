<template>
    <div>
        <h3 class="catalog-title">Корзина пользователя</h3>
        <div v-if="!isEmpty(store.personalBasket.cart)">
            <table>
                <tr v-for="product in products">
                    <td>{{ product.name }}</td>
                    <td v-if="product.discounts">{{ getPercent(product.price, product.discounts.percent) * getCountProduct(product.id) }} рублей</td>
                    <td v-else>{{ Math.round(product.price) * getCountProduct(product.id) }} рублей</td>
                    <td>Количество: {{ getCountProduct(product.id) }}</td>
                </tr>
            </table>
            <p>Общая стоимость: {{ totalCost }}</p>
            <div>
                <label>Адрес доставки:</label>
                <dropdown v-model="selectedAddress" :options="getFormAddress()" option-label="name" option-value="id" placeholder="Адрес доставки"/>
            </div>
        </div>
        <div v-else class="empty-content-massage">
            <i class="pi pi-box" style="color: var(--primary-color)"></i>
            <h4>Корзина пуста!</h4>
            <p>Добавте товаров</p>
        </div>
    </div>
</template>

<script>
import Dropdown from 'primevue/dropdown';
import { saveUserData, store} from "@/store/index.js";

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
        Dropdown
    },
    data(){
        return {
            products: [],
            totalCost: 0,
            selectedAddress: null,
        };
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
