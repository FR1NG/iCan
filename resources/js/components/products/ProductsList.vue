<script setup>
   import ProductCard from './ProductCard.vue';
   import CreateProduct from './CreateProduct.vue'
</script>
<template>
    <CreateProduct/>
    <div class="grid  xl:grid-cols-4 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1  gap-y-8">
        <ProductCard v-for="n in 5" name="hello" description="this is product" :categories="[{name: 'one'}, {name: 'two'}]" image='/Images/Products/default.png' :price='n'/>
    </div>
</template>
