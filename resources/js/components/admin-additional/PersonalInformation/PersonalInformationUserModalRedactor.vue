<template>
    <div class="card">
        <h5 class="card-header text-secondary">Добавление персональной инфомации</h5>
        <form class="card-body" @submit.prevent="onSubmit">
            <div class="form-group">
                <label for="" class="text-secondary">Как обращаться?</label>
                <div>
                    <InputText class="w-100" type="text" v-model="fullNameUser" placeholder="Как обращаться?"/>
                    <small class="text-secondary" v-if="!v$.fullNameUser.required.$response">Поле должно быть заполнено!</small>
                    <small class="text-secondary" v-if="!v$.fullNameUser.minLength.$response">Минимальный размер строки {{ v$.fullNameUser.minLength.$params.min }}!</small>
                    <small class="text-secondary" v-if="!v$.fullNameUser.maxLength.$response">Максимальный размер строки {{ v$.fullNameUser.maxLength.$params.max }}!</small>
                </div>
            </div>
            <div class="form-group">
                <label for="" class="text-secondary">Номер телефона</label>
                <div>
                    <InputMask class="w-100" id="phone" v-model="phoneNumber" mask="+7(999) 999-9999" placeholder="Номер телефона"/>
                    <div>
                        <small class="text-danger">{{ this.message }}</small>
                    </div>
                    <small class="text-secondary" v-if="!v$.phoneNumber.required.$response">Поле должно быть заполнено!</small>
                    <small class="text-secondary" v-if="!v$.phoneNumber.minLength.$response">Минимальный размер строки {{ v$.phoneNumber.minLength.$params.min }}!</small>
                    <small class="text-secondary" v-if="!v$.phoneNumber.maxLength.$response">Максимальный размер строки {{ v$.phoneNumber.maxLength.$params.max }}!</small>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-warning" type="submit">Сохранить</button>
            </div>
        </form>
    </div>
</template>

<script>
import InputText from "primevue/inputtext";
import InputMask from "primevue/inputmask";
import axios from "axios";
import {useVuelidate} from "@vuelidate/core";
import {maxLength, minLength, required} from "@vuelidate/validators";
export default {
    setup(){
        return {
            v$: useVuelidate(),
        }
    },
    props: {
        objUser: Object
    },
    components: {
        InputText,
        InputMask
    },
    validations () {
        return {
            fullNameUser: { required, minLength: minLength(5), maxLength: maxLength(1000) },
            phoneNumber: { required, minLength: minLength(16), maxLength: maxLength(20) },
        };
    },
    data() {
        return {
            fullNameUser: null,
            phoneNumber: null,
            message: null
        };
    },
    mounted() {

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
        addPersonalInformation(){
            const data = ({name: this.fullNameUser, phone_number: this.phoneNumber, personal_information_user_id: this.objUser.id});
            axios.post('api/personal-information/store', data).then(resp => {
                this.$emit('success-send-personal-info', data);
            }).catch(error => {
                this.message = error.response.data.message;
            });
        }
    }
}
</script>

