<template>
    <h3 class="catalog-title">Профиль пользователя</h3>
    <personal-info-redactor></personal-info-redactor>
    <addresses-user></addresses-user>
    <address-info-redactor></address-info-redactor>
    <orders-user></orders-user>
</template>
<script>
import AddressesUser from "../components/user-forms/AddressesUser.vue";
import PersonalInfoRedactor from "../components/user-forms/PersonalInfoRedactor.vue";
import AddressInfoRedactor from "../components/user-forms/AddressInfoRedactor.vue";
import OrdersUser from "../components/user-forms/OrdersUser.vue";
export default {
    components: {
        PersonalInfoRedactor,
        AddressInfoRedactor,
        AddressesUser,
        OrdersUser
    },
}
</script>

<style>

</style>
