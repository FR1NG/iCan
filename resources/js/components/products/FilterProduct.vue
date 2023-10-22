<script setup>
    import { reactive, ref, watch } from 'vue';
    import CustomSelect from '../custom/CustomSelect.vue';
    import CustomInput from '../custom/CustomInput.vue';
    import { useProductStore } from '@/stores/product';

    const props = defineProps(['categories']);

    const category = ref();
    let categoryFilter = null;
    const price = reactive({
        from: null,
        to: null
    });

    watch(() => category.value, (newValue) => {
        categoryFilter = props.categories.find(c => c.value == newValue)?.text
        filterProduct();
    });

    watch(() => price, () => {
        console.log(price);
        handleTimeout();
    }, {deep: true});

    const filterProduct = () => {
        useProductStore().getProducts(getFilter());
    }

    let timeoute = null;
    const handleTimeout = () => {
        clearTimeout(timeoute);
        timeoute = setTimeout(() => {
            filterProduct()
        }, 500);
    }

    const getFilter = () => {
        return `category=${categoryFilter || ''}&priceFrom=${price.from || ''}&priceTo=${price.to || ''}`
    }

</script>


<template>
    <div class="flex">
    <CustomSelect
        width="1/2"
        v-model="category"
        :items="[{text: 'All', value: null}, ...categories]"
        label="Filter by Category"
    ></CustomSelect>

        <div class="mx-3 w-1/2">
            <CustomInput type="number"  v-model="price.from" label="Min price" placeholder="min price" />
        </div>
        <div class="mx-3 w-1/2">
            <CustomInput type="number" v-model="price.to" label="Max price" placeholder="max price" />
        </div>
    </div>
</template>
