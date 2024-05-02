<template>
    <div>
        <Dialog v-model:visible="visible" modal header="Меню навигации" :style="{ width: '30rem' }">
            <template #header>
                <img class="min-logo" src="/image/Logo.png" alt="MishkaMebelLogo">
                <span class="__modal_card_title">Мишка мебель</span>
            </template>
            <ul class="nav-mobile-menu">
                <li class="nav-mobile-menu-item">
                    <router-link to="/" class="nav-mobile-link"><span>#</span> Главная</router-link>
                </li>
                <li class="nav-mobile-menu-item">
                    <router-link to="/catalog/mattress" class="nav-mobile-link"><span>#</span> Матрасы</router-link>
                </li>
                <li class="nav-mobile-menu-item">
                    <router-link to="/catalog/mattress-cover" class="nav-mobile-link"><span>#</span> Чехлы</router-link>
                </li>
                <li class="nav-mobile-menu-item">
                    <router-link to="/catalog/bed" class="nav-mobile-link"><span>#</span> Кровати</router-link>
                </li>
                <li class="nav-mobile-menu-item">
                    <router-link to="/catalog/table" class="nav-mobile-link"><span>#</span> Столы</router-link>
                </li>
                <li class="nav-mobile-menu-item">
                    <router-link to="/catalog/furniture-storage" class="nav-mobile-link"><span>#</span> Хранилища вещей
                    </router-link>
                </li>
                <li>
                    <div class="header__user_info">
                        <router-link v-if="store.user.authenticated" to="/catalog/profile-user" class="header__user_info">
                            <icon-user></icon-user>
                            {{ store.user.userData.uIDData.email }}
                        </router-link>
                        <a href="/login" v-else class="header__user_info">
                            <icon-user></icon-user>
                            Личный кабинет
                        </a>
                        <prime-vue-button
                            @click="this.$router.push({name: 'basket'})"
                            v-if="store.personalBasket.cartItemsCount"
                            :badge="store.personalBasket.cartItemsCount.toString()"
                            icon="pi pi-shopping-cart"/>
                        <prime-vue-button
                            v-else
                            icon="pi pi-shopping-cart"/>
                        <prime-vue-button v-if="store.personalBasket.cartItemsCount" icon="pi pi-trash"
                                          @click.prevent="store.personalBasket.clearCart()"/>
                        <prime-vue-button v-if="store.user.authenticated" @click="logout()" icon="pi pi-sign-out"/>
                    </div>
                </li>
                <li v-if="getAccess()">
                    <a  href="/admin/additional/products" class="header__user_info">
                        <i class="pi pi-spin pi-cog" style="font-size: 2rem; color: var(--primary-color)"></i>
                        Панель управления
                    </a>
                </li>
            </ul>
        </Dialog>
        <!--    EndDialog-->
        <header class="header __header_bottom_line">
            <div class="header__tool_kit">
                <!--        MenuButton for mobile phones-->
                <icon-menu-header @click="visible = true" class="header__nav--open--mobile"></icon-menu-header>
                <!--        End MenuButton for mobile phones-->
                <img class="logo" src="/image/Logo.png" alt="MishkaMebelLogo">
                <!--        Auth functions-->
                <div class="header__tool_kit-user header__nav--open">
                    <router-link v-if="store.user.authenticated" to="/catalog/profile-user" class="header__user_info">
                        <icon-user></icon-user>
                        {{ store.user.userData.uIDData.email }}
                    </router-link>
                    <a href="/login" v-else class="header__user_info">
                        <icon-user></icon-user>
                        Личный кабинет
                    </a>
                    <prime-vue-button
                        v-if="store.personalBasket.cartItemsCount"
                        :badge="store.personalBasket.cartItemsCount.toString()"
                        icon="pi pi-shopping-cart" @click="this.$router.push({name: 'basket'})"/>
                    <prime-vue-button
                        v-else
                        icon="pi pi-shopping-cart"/>
                    <prime-vue-button v-if="store.personalBasket.cartItemsCount" icon="pi pi-trash"
                                      @click.prevent="store.personalBasket.clearCart()"/>
                    <prime-vue-button v-if="store.user.authenticated" @click="logout()" icon="pi pi-sign-out"/>
                </div>
                <!--        End Auth functions-->
                <!--        Admin function-->
                        <div v-if="getAccess()" class="header__tool_kit-user header__nav--open">
                          <a href="/admin/additional/products" class="header__user_info">
                            <i class="pi pi-spin pi-cog" style="font-size: 2rem; color: var(--primary-color)"></i>
                            Панель управления
                          </a>
                        </div>
                <!--        End admin functions-->
            </div>
            <!--      Computer menu-->
            <div class="header__nav header__nav--open">
                <ul class="header_nav-menu">
                    <li class="nav-menu__item">
                        <router-link to="/" class="nav-menu__link">Главная</router-link>
                    </li>
                    <li class="nav-menu__item">
                        <router-link to="/catalog/mattress" class="nav-menu__link">Матрасы</router-link>
                    </li>
                    <li class="nav-menu__item">
                        <router-link to="/catalog/mattress-cover" class="nav-menu__link">Чехлы</router-link>
                    </li>
                    <li class="nav-menu__item">
                        <router-link to="/catalog/bed" class="nav-menu__link">Кровати</router-link>
                    </li>
                    <li class="nav-menu__item">
                        <router-link to="/catalog/table" class="nav-menu__link">Столы</router-link>
                    </li>
                    <li class="nav-menu__item">
                        <router-link to="/catalog/furniture-storage" class="nav-menu__link">Шкаф и комоды</router-link>
                    </li>
                </ul>
            </div>
            <!--      End computer menu-->
        </header>
    </div>
</template>
<script>
import IconUser from "../icons/IconUser.vue";
import IconSearch from "../icons/IconSearch.vue";
import IconBasket from "../icons/IconBasket.vue";
import IconMenuHeader from "../icons/IconMenuHeader.vue";
//Components
import Button from 'primevue/button';
import Listbox from "primevue/listbox";
import Dialog from 'primevue/dialog';
//Functions
import { store } from "../../store/index.js";

export default {
    computed: {
        store() {
            return store;
        },
    },
    components: {
        IconUser,
        IconSearch,
        IconBasket,
        IconMenuHeader,
        "PrimeVueButton": Button,
        Dialog,
        Listbox,
    },
    data() {
        return {
            profile: null,
            authenticated: null,
            visible: false,
        };
    },
    methods: {
        getAccess() {
            return store.user.authenticated ? store.user.getUIDData().role === "admin" : false;
        },
        logout(){
            this.axios.post('/logout').then(response => {
                store.personalBasket.clearCart();
                store.user.reset();
                this.$router.push({name: 'home'});
            });
        }
    }
}
</script>

