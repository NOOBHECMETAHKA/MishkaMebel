<template>
    <h3 class="catalog-title">Профиль пользователя</h3>
    <div v-if="authenticated">
        <div v-if="this.getPersonalInformationLoading">
            <h4 class="message-loading">Производим поиск информации по вашему профилю....</h4>
        </div>
        <div>
            <personal-info-redactor :profile="profile" :personal-information="personalInformation"></personal-info-redactor>
            <address-info-redactor :profile="profile"></address-info-redactor>
            <addresses-user :profile="profile" :personal-information="personalInformation"></addresses-user>
        </div>
    </div>
    <empty-content v-else :is-finished="true"></empty-content>
</template>
<script>
import AddressesUser from "../components/user-forms/AddressesUser.vue";
import PersonalInfoRedactor from "../components/user-forms/PersonalInfoRedactor.vue";
import AddressInfoRedactor from "../components/user-forms/AddressInfoRedactor.vue";
import Checkbox from 'primevue/checkbox';
import InputMask from 'primevue/inputmask';
import InputText from "primevue/inputtext";
import Button from 'primevue/button';
import EmptyContent from "../components/blocks/EmptyContent.vue";

export default {
    components: {
        EmptyContent,
        Checkbox,
        InputMask,
        InputText,
        "VuePrimeButton": Button,
        PersonalInfoRedactor,
        AddressInfoRedactor,
        AddressesUser
    },
    data(){
        return {
            profile: null,
            personalInformation: null,
            authenticated: false,

            getPersonalInformationLoading: true,
        };
    },
    mounted() {
        this.getUserPermissions();
    },
    methods: {
        getUserPermissions(){
            this.axios.get('/api/user')
                .then(response => {
                    this.profile = response.data;
                    this.authenticated = true;
                    this.getUserPersonalInformation(this.profile.id)
                }).catch(error => {
                console.log(error);
            });
        },
        getUserPersonalInformation(userID){
            this.axios.get(`/api/personal-information/${userID}`)
                .then(response => {
                    this.personalInformation = response.data;
                    this.getPersonalInformationLoading = false;
                }).catch(error => {
                console.log(error);
            });
        }
    }
}
</script>

<style>
.message-loading{
    color: var(--main-color);
    font-size: 30px;
    text-align: center;
}
</style>
