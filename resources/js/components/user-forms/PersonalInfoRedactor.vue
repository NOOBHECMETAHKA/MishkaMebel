<template>
    <Toast />
    <Dialog v-model:visible="isPersonalInfoRedactorActive" modal header="Edit Profile" :style="{ width: '50rem' }">
        <template #header>
            <img class="min-logo" src="/image/Logo.png" alt="MishkaMebelLogo">
            <span class="__modal_card_title">Мишка мебель</span>
        </template>
        <div class="catalog-user-action-modal">
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
    </Dialog>
    <div class="catalog-user-action">
        <p class="catalog-sub-title">Персональная информация</p>
        <div v-if="saveUserData.userData.personalInformation">
            <table>
                <tr>
                    <td class="__text_second-color">Вас зовут<span>:</span></td>
                    <td class="__text_main-color">{{ saveUserData.userData.personalInformation.name }}</td>
                </tr>
                <tr>
                    <td class="__text_second-color">Ваш номер телефон<span>:</span></td>
                    <td class="__text_main-color">{{ saveUserData.userData.personalInformation.phone_number }}</td>
                </tr>
            </table>
            <vue-prime-button label="Отредактировать" @click="setPersonalInfo(true)"></vue-prime-button>
        </div>
        <div v-else>
            <p class="__text_second-color">Персональная информация отсутствует требуется её заполнить. Потому что могут возникнуть трудности с тем чтобы связаться с вами.</p>
            <vue-prime-button label="Отредактировать" @click="setPersonalInfo(true)"></vue-prime-button>
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
import {saveUserData} from "@/store/index.js";

import Dialog from 'primevue/dialog';

export default {
    computed: {
        saveUserData(){
            return saveUserData;
        }
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
        Toast,
        Dialog
    },
    data(){
        return {
            contactNameUser: null,
            contactPhoneNumber: null,
            isPersonalInfoRedactorActive: false,
        };
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
        setPersonalInfo(isSet){
            if(isSet){
                this.isPersonalInfoRedactorActive = true;
                if(saveUserData.authenticated && saveUserData.userData.personalInformation !== null){
                    this.contactNameUser = saveUserData.userData.personalInformation.name;
                    this.contactPhoneNumber = saveUserData.userData.personalInformation.phone_number;
                }
            } else {
                this.isPersonalInfoRedactorActive = false;
                saveUserData.userData.personalInformation =
                    {name: this.contactNameUser, phone_number: this.contactPhoneNumber, personal_information_user_id: saveUserData.userData.uIDData.id }
            }
        },

        addPersonalInformation(){
            const data = ({name: this.contactNameUser, phone_number: this.contactPhoneNumber, personal_information_user_id: saveUserData.userData.uIDData.id });
            this.axios.post('/api/personal-information/store', data).then(resp => {
                this.setPersonalInfo(false)
                this.$toast.add({ severity: 'success', summary: 'Данные успешно записаны', detail: 'Мы запомнили ваши данные', life: 3000 });
            }).catch(error => {
                this.$toast.add({ severity: 'error', summary: 'Данные не записаны', detail: error.response.data.message, life: 3000 });
            });
        }
    }
}
</script>

<style lang="css" scoped>

</style>
