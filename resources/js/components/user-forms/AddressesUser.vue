<template>
    <div class="catalog-user-action">
        <p class="catalog-sub-title">Ваши адреса</p>
        <div v-if="addresses !== null" v-for="address in addresses" class="__text_second-color">
            <span class="__text_main-color address-row">#</span> {{ `Город: ${address.City}; улица: ${address.Street}; дом: ${address.House}; подъезд: ${address.Entrance}; квартира: ${address.Apartment};` }}
            <vue-prime-button icon="pi pi-trash"></vue-prime-button>
        </div>
        <div v-else class="empty-content-massage">
            <i class="pi pi-box" style="color: var(--primary-color)"></i>
            <h4>Похоже записей нет</h4>
            <p>Стоит добавить!</p>
        </div>
    </div>
</template>

<script>
import Button from 'primevue/button';
export default {
    components: {
        "VuePrimeButton": Button,
    },
    data(){
        return {
            addresses: null,
        };
    },
    mounted() {
        if(this.personalInformation){
            console.log(this.personalInformation);
            this.addresses = this.personalInformation[0].addresses;
        }
    },
}
</script>

<style lang="css">
.empty-content-massage{
    margin-top: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.empty-content-massage i{
    font-size: 4em;
}

.empty-content-massage p {
    padding: 0;
    color: var(--font-color);
    text-align: center;
}

.empty-content-massage h4 {
    padding: 0;
    margin-bottom: 0;
    font-size: 40px;
    text-align: center;
    color: var(--main-color);
}

@media (max-width: 500px) {
    .empty-content-massage h4{
        font-size: 30px;
    }

    .empty-content-massage i{
        font-size: 3em;
    }
}
</style>
