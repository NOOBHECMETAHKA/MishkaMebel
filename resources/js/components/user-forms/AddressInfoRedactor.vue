<template>
    <Toast />
    <div class="catalog-user-action">
        <p class="catalog-sub-title">Добавление адреса</p>
        <div class="catalog-user-action-form-input">
            <label>Какой у вас город?</label>
            <InputText v-model="city" style="color: var(--main-color);"/>
            <small v-if="city === ''"><span>#</span> Поле должно быть заполнено!</small>
        </div>
        <div class="catalog-user-action-form-input">
            <label>Какая у вас улица?</label>
            <InputText v-model="street" style="color: var(--main-color);"/>
            <small v-if="street === ''"><span>#</span> Поле должно быть заполнено!</small>
        </div>
        <div class="catalog-user-action-form-input">
            <label>Какой номер дома?</label>
            <InputText v-model="house" style="color: var(--main-color);"/>
            <small v-if="house === ''"><span>#</span> Поле должно быть заполнено!</small>
        </div>
        <div class="catalog-user-action-form-input">
            <label>Какой номер у подъезда?</label>
            <InputText v-model="entrance" style="color: var(--main-color);"/>
            <small v-if="entrance === ''"><span>#</span> Поле должно быть заполнено!</small>
        </div>
        <div class="catalog-user-action-form-input">
            <label>Какой номер у квартиры?</label>
            <InputText v-model="apartment" style="color: var(--main-color);"/>
            <small v-if="apartment === ''"><span>#</span> Поле должно быть заполнено!</small>
        </div>
        <div>
            <vue-prime-button label="Добавить ещё!" @click="addAddressInformation()"/>
        </div>
    </div>
</template>

<script>
import Checkbox from 'primevue/checkbox';
import InputMask from 'primevue/inputmask';
import InputText from "primevue/inputtext";
import Button from 'primevue/button';
import Toast from 'primevue/toast';
import { useToast } from 'primevue/usetoast';
export default {
    components: {
        Checkbox,
        InputMask,
        InputText,
        "VuePrimeButton": Button,
        Toast
    },
    data(){
        return {
            city: "",
            street: "",
            house: "",
            entrance: "",
            apartment: "",
        };
    },
    methods: {
        addAddressInformation(){
            if(this.profile){
                const data = (
                    {
                        City: this.city,
                        Street: this.street,
                        House: this.house,
                        Entrance: this.entrance,
                        Apartment: this.apartment,
                        addresses_user_id: this.profile.id
                    }
                );
                this.axios.post('/api/addresses/store', data).then(resp => {
                    this.$toast.add({ severity: 'success', summary: 'Данные успешно записаны', detail: 'Мы запомнили ваши данные', life: 3000 });
                    this.city = "";
                    this.street = "";
                    this.house = "";
                    this.entrance = "";
                    this.apartment = "";
                }).catch(error => {
                    console.log(error);
                });
            }
        }
    }
}
</script>

<style lang="css" scoped>

</style>
