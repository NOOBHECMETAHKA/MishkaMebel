<template>
    <form @submit.prevent="onSubmit()">
        <div class="form-group">
            <label class="text-secondary">Дата истечения</label>
            <div>
                <InputNumber v-model="this.percent" inputId="percent" suffix="%" :min="2" :max="99"/>
            </div>
        </div>
        <div class="form-group w-50">
            <label class="text-secondary">Дата истечения</label>
            <input v-model="this.expirationDiscountDate" class="form-control" type="date"
                   :class="v$.expirationDiscountDate.$errors.length > 0 ? 'is-invalid' : ''">
            <small class="text-secondary" v-if="(this.todayNow.getTime()) > (new Date(this.expirationDiscountDate).getTime())">Дата должна быть больше текущей!</small>
        </div>
        <div v-if="this.loading">
            <i class="pi pi-spin pi-cog fas" style="font-size: 2rem; color: var(--gray-500);"></i>
        </div>
        <div class="form-group" v-else>
            <div v-if="this.products.length > 0">
                <label class="text-secondary">Товар на которые будет действовать скидка</label>
                <select v-model="discountsProductId" class="form-control">
                    <option v-for="item in products" :value="item.id">Наименование: {{ item.name }}; текущая цена: {{ item.price }}</option>
                </select>
            </div>
            <div v-else>
                <div class="alert alert-warning">
                    <span>Товары в ассортименте отсуствуют!</span>
                </div>
            </div>
        </div>
        <div>
            <button type="submit" class="btn btn-success">Добавить</button>
        </div>
    </form>
</template>

<script>
import InputMask from "primevue/inputmask";
import axios from "axios";
import InputNumber from "primevue/inputnumber";
import { useVuelidate } from '@vuelidate/core';
import { required, minLength, minValue, maxLength } from '@vuelidate/validators';
import Textarea from "primevue/textarea";
import SelectButton from "primevue/selectbutton";

export default {
    setup(){
        return {
            v$: useVuelidate(),
        }
    },
    components: {
        Textarea,
        SelectButton,
        InputNumber,
        InputMask
    },
    validations () {
        return {
            percent: { required },
            expirationDiscountDate: { required },
            discountsProductId: { required },
        }
    },
    data() {
        return{
            percent: null,
            expirationDiscountDate: null,
            discountsProductId: null,
            products: null,
            loading: true,

            todayNow: new Date()
        }
    },
    mounted() {
        this.getProducts();
    },
    methods: {
        onSubmit(){
            if(this.v$.$invalid){
                this.v$.$touch();
                return;
            } else{
                this.addDiscount();
            }
        },
        addDiscount(){

        },
        getProducts(){
            axios.get('/api/products').then(resp => {
                console.log(resp);
                this.products = resp.data;
                this.loading = false;
            });
        }
    }
}
</script>

<style lang="scss" scoped>

</style>
