<script setup>
import { ref, reactive } from 'vue';
import CustomDailog from '../custom/CustomDailog.vue';
import CustomInput from '../custom/CustomInput.vue';
import CustomSelect from '../custom/CustomSelect.vue'
import CustomBtn from '../custom/CustomBtn.vue';
import { useCategoryStore } from '@/stores/category'
import { resetObject, assignErrors } from '@/composables/helpers'

defineProps(['categories']);

const categoryStore = useCategoryStore();
const modal = ref(false);
const loading = ref(false);

const showModal = () => {
    modal.value = true;
}

const hideModal = () => {
    modal.value = false;
}

const handleSubmit = async () => {
    loading.value = true;
    resetObject(errors);
    categoryStore.createCategory(form).then(() => {
        loading.value = false;
        hideModal();
        resetObject(form);
    }).catch((error) => {
        assignErrors(error.errors, errors);
        loading.value = false;
    });
}

const form = reactive({
    name: '',
    parent_id: null,
});

const errors = reactive({
    name: '',
    parent_id: '',
})

</script>

<template>
    <div class="flex justify-end m-4">
        <CustomBtn color="info" @click="showModal">Create Category</CustomBtn>
        <CustomDailog v-model="modal" title="Create Category">
            <CustomInput :error-message="errors.name" v-model="form.name" width="full" color="" label="Category name"
                placeholder="place holder" />
            <CustomSelect :error-message="errors.parent_id" v-model="form.parent_id" :items="categories" label="Parent Category"
                placeholder="Select parent"></CustomSelect>
            <template v-slot:actions="">
                <CustomBtn color="ghost" @click="hideModal">Close</CustomBtn>
                <CustomBtn :loading="loading" :disabled="loading" color="primary" @click="handleSubmit">Save</CustomBtn>
            </template>
        </CustomDailog>
    </div>
</template>
