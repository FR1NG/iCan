<script setup>
import { ref, reactive } from 'vue';
import CustomDailog from '../custom/CustomDailog.vue';
import CustomInput from '../custom/CustomInput.vue';
import CustomMultiSelect from '../custom/CustomMultiSelect.vue'
import CustomBtn from '../custom/CustomBtn.vue';
import CustomFileInput from '../custom/CustomFileInput.vue';
import { useProductStore } from '@/stores/product';
import { resetObject, assignErrors } from '@/composables/helpers';

defineProps(['categories']);

const productStore = useProductStore();
const modal = ref(false);
const loading = ref(false);
let formData = new FormData();

const showModal = () => {
    modal.value = true;
}

const hideModal = () => {
    modal.value = false;
}

const handleSubmit = async () => {
    appendInputs();
    loading.value = true;
    resetObject(errors);
    productStore.createProduct(formData).then(() => {
    loading.value = false;
    resetObject(form);
    formCategories.value = [];
    formData = new FormData();
    hideModal();
    }).catch((error) => {
        loading.value = false;
        assignErrors(error.errors, errors);
        });
}

const appendInputs = () => {
    for (const el of Object.keys(form)) {
        if(form[el])
            formData.append(el, form[el]);
    }
    formCategories.value?.at(0).forEach((val, key) => {
        formData.append(`categories[${key}]`, val);
    })
}

const form = reactive({
    name: '',
    price: null,
    discription: '',
    image: null,
});

const formCategories = ref([])

const errors = reactive({
    name: '',
    price: '',
    discription: '',
    image: '',
    description: '',
    categories: '',
})

const handleInput = (e) => {
    formData.append('image', e.target.files[0]);
}

</script>

<template>
    <div class="flex justify-end m-4">
        <CustomBtn color="info" @click="showModal">Create Product</CustomBtn>

        <CustomDailog v-model="modal" title="Create Category">

            <CustomInput
                :error-message="errors.name"
                v-model="form.name" width="full"
                color="" label="Product name"
                placeholder="product name" />

            <CustomInput
                :error-message="errors.price"
                v-model="form.price" width="full"
                color="info" label="Price"
                type="number"
                placeholder="product price" />

            <CustomInput
                :error-message="errors.description"
                v-model="form.description" width="full"
                color="info" label="description"
                type="text"
                placeholder="product description" />

            <CustomMultiSelect
                :error-message="errors.categories"
                v-model="formCategories"
                :items="categories"
                label="Product Categories"
                placeholder="Select Categories"
            ></CustomMultiSelect>

            <CustomFileInput
                @input="handleInput"
                >
            </CustomFileInput>

            <template v-slot:actions="">
                <CustomBtn color="ghost" @click="hideModal">Close</CustomBtn>
                <CustomBtn :loading="loading" :disabled="loading" color="primary" @click="handleSubmit">Save</CustomBtn>
            </template>

        </CustomDailog>
    </div>
</template>
