<template>
    <Toast />
    <div class="catalog-user-action">
        <p class="catalog-sub-title">Персональная информация</p>
        <div class="catalog-user-action-form-input">
            <label>Как к вам обращаться?</label>
            <InputText v-model="contactNameUser" style="color: var(--main-color);"/>
            <small v-if="!v$.contactNameUser.required.$response"><span>#</span> Поле должно быть заполнено!</small>
            <small v-if="!v$.contactNameUser.minLength.$response"><span>#</span> Минимальный размер строки {{ v$.contactNameUser.minLength.$params.min }}!</small>
            <small v-if="!v$.contactNameUser.maxLength.$response"><span>#</span> Максимальный размер строки {{ v$.contactNameUser.maxLength.$params.max }}!</small>
        </div>
        <div class="catalog-user-action-form-input">
            <label>Ваш номер телефона?</label>
            <InputMask v-model="contactPhoneNumber" mask="+7(999) 999-9999" style="color: var(--main-color);"/>
            <small v-if="!v$.contactPhoneNumber.required.$response"><span>#</span> Поле должно быть заполнено!</small>
            <small v-if="!v$.contactPhoneNumber.minLength.$response"><span>#</span> Минимальный размер строки {{ v$.contactPhoneNumber.minLength.$params.min }}!</small>
            <small v-if="!v$.contactPhoneNumber.maxLength.$response"><span>#</span> Максимальный размер строки {{ v$.contactPhoneNumber.maxLength.$params.max }}!</small>
        </div>
        <div>
            <vue-prime-button label="Сохранить" @click="addPersonalInformation()"/>
        </div>
    </div>
</template>

<script>
import Checkbox from 'primevue/checkbox';
import InputMask from 'primevue/inputmask';
import InputText from "primevue/inputtext";
import Button from 'primevue/button';
import {useVuelidate} from "@vuelidate/core";
import {maxLength, minLength, required} from "@vuelidate/validators";
import Toast from 'primevue/toast';
import { useToast } from 'primevue/usetoast';
export default {
    props: {
        profile: Object,
        personalInformation: Object
    },
    setup(){
        useToast();
        return {
            v$: useVuelidate(),
        }
    },
    validations () {
        return {
            contactNameUser: { required, minLength: minLength(4), maxLength: maxLength(1000) },
            contactPhoneNumber: { required, minLength: minLength(16), maxLength: maxLength(20) },
        };
    },
    components: {
        Checkbox,
        InputMask,
        InputText,
        "VuePrimeButton": Button,
        Toast
    },
    data(){
        return {
            contactNameUser: null,
            contactPhoneNumber: null,
        };
    },
    mounted() {
        this.setPersonalInfo();
    },
    methods: {
        onSubmit(){
            if(this.v$.$invalid){
                this.v$.$touch();
                return;
            } else{
                this.addPersonalInformation();
            }
        },
        setPersonalInfo(){
            if(this.personalInformation){
                console.log(this.personalInformation);
                this.contactNameUser = this.personalInformation[0].personal_information.name;
                this.contactPhoneNumber = this.personalInformation[0].personal_information.phone_number;
            }
        },
        addPersonalInformation(){
            console.log(this.profile);
            if(this.profile){
                const data = ({name: this.contactNameUser, phone_number: this.contactPhoneNumber, personal_information_user_id: this.profile.id});
                this.axios.post('/api/personal-information/store', data).then(resp => {
                    this.$toast.add({ severity: 'success', summary: 'Данные успешно записаны', detail: 'Мы запомнили ваши данные', life: 3000 });
                }).catch(error => {
                    console.log(error);
                });
            }
        }
    }
}
</script>

<style lang="scss" scoped>

</style>
