<script setup>
   import ProductCard from './ProductCard.vue';
   import CreateProduct from './CreateProduct.vue'
   import { useCategoryStore } from '@/stores/category';
   import { useProductStore } from '@/stores/product';
   import { storeToRefs } from 'pinia';

   const categoryStore = useCategoryStore();
   const productStore = useProductStore();
   const { itemsForSelect } = storeToRefs(categoryStore);
   const { products } = storeToRefs(productStore);

   // getting categories;
   categoryStore.getCategories()
   // getting products
   productStore.getProducts();
</script>
<template>
    <CreateProduct :categories="itemsForSelect"/>
    <div class="grid  xl:grid-cols-4 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1  gap-y-8">
        <ProductCard v-for="product in products"
            :name="product.name"
            :description="product.description"
            :categories="product.categories"
            :image='`Images/Products/${product.image}`'
            :price='product.price'/>
    </div>
</template>
