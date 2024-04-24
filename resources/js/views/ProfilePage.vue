<template>
    <h3 class="catalog-title">Профиль пользователя</h3>
    <personal-info-redactor></personal-info-redactor>
    <addresses-user></addresses-user>
    <address-info-redactor></address-info-redactor>
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
}
</script>

<style>
.message-loading{
    color: var(--main-color);
    font-size: 30px;
    text-align: center;
}
</style>
