<script setup>
    import { ref, watch } from 'vue';
    import CustomSelect from '../custom/CustomSelect.vue';
    import { useProductStore } from '@/stores/product';

    const props = defineProps(['categories']);
    const category = ref();
    watch(() => category.value, (newValue) => {
        const filter = props.categories.find(c => c.value == newValue)?.text
        useProductStore().getProducts(filter);
    });
</script>


<template>
    <CustomSelect
        width="md"
        v-model="category"
        :items="[{text: 'All', value: null}, ...categories]"
        label="Filter by Category"
    ></CustomSelect>
</template>
