import { createRouter, createWebHashHistory } from "vue-router";

const routes = [
    {
        path: '/',
        name: 'Home',
        component: () => import('@/components/Home.vue'),
    },
    {
        path: '/products',
        name: 'ProductsList',
        component: () => import('@/components/products/ProductsList.vue')
    },
    {
        path: '/categories',
        name: 'CategoriesList',
        component: () => import('@/components/categories/CategoriesList.vue')
    }
];

export const router = createRouter({
    mode: 'history',
    history: createWebHashHistory(),
    routes
})
