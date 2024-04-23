import { createRouter, createWebHistory } from 'vue-router'

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
    }
  ]
})

export default router
