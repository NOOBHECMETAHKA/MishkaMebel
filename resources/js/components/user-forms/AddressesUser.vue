<template>
    <Toast />
    <div class="catalog-user-action">
        <p class="catalog-sub-title">Ваши адреса</p>
        <div v-if="!isEmpty(saveUserData.userData.addresses)" v-for="address in saveUserData.userData.addresses" class="__text_second-color">
            <div class="address-row">
                <span class="__text_main-color">#</span>
                {{`Город: ${address.City}; улица: ${address.Street}; дом: ${address.House}; подъезд: ${address.Entrance}; квартира: ${address.Apartment};` }}
                <span @click="deleteAddressUser(address.id)">Удалить</span>
            </div>
        </div>
        <div v-else class="empty-content-massage">
            <i class="pi pi-box" style="color: var(--primary-color)"></i>
            <h4>Похоже записей нет</h4>
            <p>Стоит добавить!</p>
        </div>
    </div>
</template>

<script>
import Toast from 'primevue/toast';
import { useToast } from 'primevue/usetoast';
import {saveUserData} from "@/store/index.js";
export default {
    setup() {
        useToast();
    },
    computed: {
        saveUserData(){
            return saveUserData;
        }
    },
    components: {
        Toast
    },
    methods: {
        deleteAddressUser(IDAddress){
            this.axios.post(`/api/addresses/delete/${IDAddress}`)
                .then(response =>  {
                    saveUserData.userData.addresses = saveUserData.userData.addresses.filter(address => address.id !== IDAddress);
                    this.$toast.add({ severity: 'success', summary: 'Успешно удаление', detail: 'Адрес успешно удалён!', life: 3000 });
                }).catch(error =>  {});
        },
        isEmpty(obj) {
            if (obj === null) {
                return true;
            }
            if (Array.isArray(obj)) {
                return obj.length === 0;
            }
            return Object.keys(obj).length === 0;
        }
    }
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
