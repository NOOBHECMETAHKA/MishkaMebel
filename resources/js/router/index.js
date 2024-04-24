import {createRouter, createWebHistory} from 'vue-router';
import axios from "axios";
import { saveUserData } from "@/store/index.js";

axios.defaults.withCredentials = true;
axios.defaults.withXSRFToken = true;

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: '/',
            name: 'home',
            component: () => import('../views/HomePage.vue')
        },
        {
            path: '/catalog/bed',
            name: 'bed',
            component: () => import('../views/Catalog/BedCatalog.vue')
        },
        {
            path: '/catalog/mattress',
            name: 'mattress',
            component: () => import('../views/Catalog/MattressCatalog.vue')
        },
        {
            path: '/catalog/mattress-cover',
            name: 'mattress-cover',
            component: () => import('../views/Catalog/MattressCoverCatalog.vue')
        },
        {
            path: '/catalog/furniture-storage',
            name: 'furniture-storage',
            component: () => import('../views/Catalog/FurnitureStorageCatalog.vue')
        },
        {
            path: '/catalog/table',
            name: 'table',
            component: () => import('../views/Catalog/TableCatalog.vue')
        },
        {
            path: '/catalog/profile-user',
            name: 'profile',
            component: () => import('../views/ProfilePage.vue')
        }
    ]
});

router.beforeEach((to, from, next) => {
    function setUpInfo(responseData) {
        saveUserData.authenticated = true;
        saveUserData.userData.uIDData = { id: responseData.id, email: responseData.email, role: responseData.role };
        saveUserData.userData.personalInformation = responseData.personal_information;
        saveUserData.userData.addresses = responseData.addresses;
    }

    if(!saveUserData.authenticated){
        axios.get('/api/user').then(response => {
            setUpInfo(response.data.data);
        }).catch(error => {
            console.log(error);
        });
    }

    next();
});

export default router
