<template>
    <div class="card">
        <h5 class="card-header text-secondary">Изменение роли пользователя</h5>
        <form class="card-body" @submit.prevent="setUserRole">
            <div class="form-group">
                <label for="" class="text-secondary">Роль</label>
                <div>
                    <SelectButton v-model="roleUser" :options="this.getFormData()" option-label="name"/>
                    <small class="text-secondary" v-if="!v$.roleUser.required.$response">Поле должно быть заполнено!</small>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-warning" type="submit">Сохранить</button>
            </div>
        </form>
    </div>
</template>

<script>

import SelectButton from "primevue/selectbutton";
import {useVuelidate} from "@vuelidate/core";
import {maxLength, minLength, required} from "@vuelidate/validators";
import axios from "axios";
export default {
    setup(){
        return {
            v$: useVuelidate(),
        }
    },
    validations () {
        return {
            roleUser: { required, minLength: minLength(5), maxLength: maxLength(1000) }
        };
    },
    props: {
        objRole: String,
        objRoles: Object,
        objUser: Object
    },
    components: {
        SelectButton
    },
    data() {
        return {
            roleUser: null,
        };
    },
    mounted() {
        this.roleUser = this.getFormData().filter(roleData => this.objRole === roleData.value)[0];
    },
    methods: {
        onSubmit(){
            if(this.v$.$invalid){
                this.v$.$touch();
                return;
            } else{
                this.setUserRole();
            }
        },
        setUserRole(){
            const data = ({role: this.roleUser.value});
            axios.post(`/api/personal-information/update/${this.objUser.id}`, data).then(resp => {
                this.$emit('success-send-personal-info', data);
            }).catch(error => {
                this.message = error.response.data.message;
            });
        },
        getFormData(){
            let data = [];
            for (const role in this.objRoles) {
                data.push({ name: this.objRoles[role], value: role});
            }
            return data;
        }
    }

}
</script>

<style lang="scss" scoped>

</style>
