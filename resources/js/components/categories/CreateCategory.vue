<script setup>
    import { ref, reactive } from 'vue';
    import CustomDailog from '../custom/CustomDailog.vue';
    import CustomInput from '../custom/CustomInput.vue';
    import CustomSelect from '../custom/CustomSelect.vue'

    const modal = ref(false);

    const showModal = () => {
        modal.value = true;
    }

    const hideModal = () => {
        modal.value = false;
    }

    const handleSubmit = () => {
        console.log(form.name)
    }

    const form = reactive({
        name: '',
        parent: null,
    });

    const items = [
        { text: 'hello', value: 1},
        { text: 'hello sf', value: 2},
        { text: 'hello fsd', value: 3},
        { text: 'hello lsdf', value: 4},
    ]
</script>

<template>
    <div>
        <button class="btn" @click="showModal">Create</button>
        <CustomDailog v-model="modal" title="Create Category">
            <CustomInput v-model="form.name" width="full" color="" label="hello input" placeholder="place holder"/>
            <CustomSelect :items="items" error-message="error here"  label="parent" placeholder="select parent"></CustomSelect>
            <template v-slot:actions="">
                <button class="btn ml-2" @click="hideModal">Close</button>
                <button class="btn ml-2" @click="handleSubmit">Save</button>
            </template>
        </CustomDailog>
    </div>
</template>
