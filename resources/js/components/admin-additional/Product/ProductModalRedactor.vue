<template>
    <form @submit.prevent="onSubmit">
        <div class="form-group">
            <label class="text-secondary">Наименование товара</label>
            <input v-model.trim="nameProduct" type="text" class="form-control"
                   :class="v$.nameProduct.$errors.length > 0 ? 'is-invalid' : ''"
                   placeholder="Наименование товара">
            <small class="text-secondary" v-if="!v$.nameProduct.required.$response">Поле должно быть заполнено!</small>
            <small class="text-secondary" v-if="!v$.nameProduct.minLength.$response">Минимальный размер строки {{ v$.nameProduct.minLength.$params.min }}!</small>
            <small class="text-secondary" v-if="!v$.nameProduct.maxLength.$response">Максимальный размер строки {{ v$.nameProduct.maxLength.$params.max }}!</small>
        </div>

        <div class="form-group">
            <label class="text-secondary">Описание</label>
            <textarea v-model.trim="descriptionProduct"
                      :class="v$.descriptionProduct.$errors.length > 0 ? 'is-invalid' : ''"
                      class="form-control" rows="3"
                      placeholder="Описание..."
                      style="max-height: 100px; min-height: 50px;"></textarea>
            <small class="text-secondary" v-if="!v$.descriptionProduct.required.$response">Поле должно быть заполнено!</small>
            <small class="text-secondary" v-if="!v$.descriptionProduct.minLength.$response">Минимальный размер строки {{ v$.descriptionProduct.minLength.$params.min }}!</small>
            <small class="text-secondary" v-if="!v$.descriptionProduct.maxLength.$response">Максимальный размер строки {{ v$.descriptionProduct.maxLength.$params.max }}!!</small>
        </div>

        <div class="form-group">
            <label class="text-secondary">Гарантия: </label>
            <SelectButton v-model="guaranteeProduct" :options="guaranteesProduct" optionLabel="name" aria-labelledby="basic" />
            <small class="text-secondary" v-if="!v$.guaranteeProduct.required.$response">Поле должно быть выбрано!</small>
        </div>

        <div class="form-group">
            <label class="text-secondary">Категория</label>
            <SelectButton v-model="category" @change="setCategory()" :options="this.categories" optionLabel="name" aria-labelledby="basic" />
            <small class="text-secondary" v-if="!v$.category.required.$response">Поле должно быть выбрано!</small>
        </div>

        <div class="form-group">
            <label class="text-secondary">Цена</label>
            <div>
                <InputNumber v-model="priceProduct" mode="currency" currency="RUB" locale="ru-RU" :maxFractionDigits="2" :min="0" :max="10000000"/>
                <div>
                    <small class="text-secondary" v-if="!v$.priceProduct.required.$response">Поле должно быть заполнено!</small>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="text-secondary">Характеристика</label>
            <div v-if="category != null && !this.loading">
                <div v-if="category.category === 'mattresses'">
                    <div v-if="dataCategory.length > 0">
                        <select v-model="selectedObjectFromProductSelect" class="form-control">
                            <option v-for="item in dataCategory" :value="item.id">Тип: {{item.type}}, возростная категория: {{item.age_category}}, жёсткий: {{item.hardness}}, материал: {{item.materials.name}}, [{{item.furniture_sizes.length}} см., {{item.furniture_sizes.width}} см.]</option>
                        </select>
                    </div>
                    <div v-else>
                        <div class="alert alert-warning" role="alert">
                            Проверьте есть ли записи на странице матрасы?
                        </div>
                    </div>
                </div>
                <div v-if="category.category === 'mattress-covers'">
                    <div v-if="dataCategory.length > 0">
                        <select v-model="selectedObjectFromProductSelect" class="form-control">
                            <option v-for="item in dataCategory" :value="item.id">Функционал: {{ item.function }}, Вид: крепления: {{ item.mattress_fastenings.name }}, [{{item.furniture_sizes.length}} см., {{item.furniture_sizes.width}} см.]</option>
                        </select>
                    </div>
                    <div v-else>
                        <div class="alert alert-warning" role="alert">
                            Проверьте есть ли записи на странице матрасы?
                        </div>
                    </div>
                </div>
                <div v-if="category.category === 'beds'">
                    <div v-if="dataCategory.length > 0">
                        <select v-model="selectedObjectFromProductSelect" class="form-control">
                            <option v-for="item in dataCategory" :value="item.id">Тип: {{ item.type }}, наличие ящиков:
                                {{ item.have_boxes ? 'Есть' : 'Нету' }}, основание кровати: {{ item.bed_bases.name }}, материал:
                                {{ item.materials.name }}, размеры: [{{ item.furniture_sizes.length }} см.,
                                {{ item.furniture_sizes.width }} см.]</option>
                        </select>
                    </div>
                    <div v-else>
                        <div class="alert alert-warning" role="alert">
                            Проверьте есть ли записи на странице матрасы?
                        </div>
                    </div>
                </div>
                <div v-if="category.category === 'furniture-storage'">
                    <div v-if="dataCategory.length > 0" class="form-group">
                        <select v-model="selectedObjectFromProductSelect" class="form-control">
                            <option v-for="item in dataCategory" :value="item.id">Тип: {{ item.type }}, размеры: [{{ item.furniture_dimensions.length }} см.,
                                {{ item.furniture_dimensions.width }} см., {{ item.furniture_dimensions.height }} см.]</option>
                        </select>
                    </div>
                    <div v-else>
                        <div class="alert alert-warning" role="alert">
                            Проверьте есть ли записи на странице матрасы?
                        </div>
                    </div>
                </div>
                <div v-if="category.category === 'tables'">
                    <div v-if="dataCategory.length > 0">
                        <select v-model="selectedObjectFromProductSelect" class="form-control">
                            <option v-for="item in dataCategory" :value="item.id">Материал: {{ item.materials.name }}, размеры: [{{ item.furniture_dimensions.length }} см.,
                                {{ item.furniture_dimensions.width }} см., {{ item.furniture_dimensions.height }} см.]</option>
                        </select>
                    </div>
                    <div v-else>
                        <div class="alert alert-warning" role="alert">
                            Проверьте есть ли записи на странице матрасы?
                        </div>
                    </div>
                </div>
                <div>
                    <small class="text-secondary" v-if="!v$.selectedObjectFromProductSelect.required.$response">Значение характеристики должно быть выбрано!</small>
                </div>
            </div>

            <div>
                <i v-if="loading" class="pi pi-spin pi-cog fas" style="font-size: 2rem; color: var(--gray-500);"></i>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success mt-3" :class="this.loading ? 'disabled' : ''">Добавить</button>
            </div>
        </div>
    </form>
</template>

<script>
import Textarea from "primevue/textarea"
import SelectButton from 'primevue/selectbutton';
import axios from "axios";

import InputNumber from "primevue/inputnumber";

import { useVuelidate } from '@vuelidate/core';
import { required, minLength, minValue, maxLength } from '@vuelidate/validators';

export default {
    setup(){
        return {
            v$: useVuelidate(),
        }
    },
    props: {
        objCategories: String,
        objGuarantee: String
    },
    components: {
        Textarea,
        SelectButton,
        InputNumber
    },
    validations () {
        return {
            nameProduct: { required, minLength: minLength(5), maxLength: maxLength(200) }, //name
            descriptionProduct: { required, minLength: minLength(5), maxLength: maxLength(1000)  }, //description
            priceProduct: { required },
            guaranteeProduct: { required }, //guarantee
            category: { required }, //category.category -> category
            selectedObjectFromProductSelect: { required }, // products_product_id
        }
    },
    data() {
        return {
            nameProduct: null, //name
            descriptionProduct: null, //description
            priceProduct: null,
            guaranteeProduct: null, //guarantee
            category: null, //category.category -> category
            selectedObjectFromProductSelect: null, // products_product_id

            guaranteesProduct: null, //Коллекция гарантий
            categories: null, //Коллекция категорий

            is_delete: null,

            loading: true,
            dataCategory: null,
        }
    },
    mounted() {
        this.categories = JSON.parse(this.objCategories)
        this.guaranteesProduct = JSON.parse(this.objGuarantee);

        this.guaranteesProduct = this.formatGuarantees(this.guaranteesProduct);
        this.categories = this.formatCategories(this.categories);
    },
    methods: {
        onSubmit(){
            if(this.v$.$invalid){
                this.v$.$touch();
                return;
            } else{
                this.addProduct();
            }
        },
        addProduct(){
            this.loading = true;
            axios.post('/api/products/store', {
                name: this.nameProduct,
                description: this.descriptionProduct,
                price: this.priceProduct,
                guarantee: this.guaranteeProduct.name,
                category: this.category.category,
                products_product_id: this.selectedObjectFromProductSelect
            }).then(resp => {
                window.location.href = '/admin/additional/products';
                this.loading = false;
            });
        },
        formatCategories(dict){
            let format = []
            for (const key in dict) {
                format.push({'category': key, 'name': this.categories[key]})
            }
            return format;
        },
        formatGuarantees(dict){
          let format = [];
          for(const key in dict){
              format.push({'name': this.guaranteesProduct[key]});
          }
          return format;
        },
        setCategory(){
            this.loading = true;
            this.selectedObjectFromProductSelect = null;
            if(this.category != null){
                axios.get(`/api/${this.category.category}`).then(resp => {
                    this.dataCategory = resp.data;
                    this.loading = false;
                });
            }
        },
    },

}
</script>

<style lang="scss" scoped>

</style>
