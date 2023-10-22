import { createRouter, createWebHashHistory } from "vue-router";

const routes = [
    {
        path: '/',
        name: 'Home',
        component: () => import('@/components/Home.vue'),
    },
    {
        path: '/products',
        children: [
            {
                path: 'create',
                name: 'CreateProduct',
                component: () => import('@/components/products/CreateProduct.vue')
            },
            {
                path: 'list',
                name: 'ProductsList',
                component: () => import('@/components/products/ProductsList.vue')
            }
        ]
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
