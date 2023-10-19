<script setup>
    import { useProductStore } from '@/stores/product';
    useProductStore().test();

</script>

<template>
    <div>
        <router-link :to="{name: 'CreateProduct'}">create | </router-link>

        <router-link :to="{name: 'ProductsList'}">list</router-link>
        <router-view></router-view>
    </div>
</template>
