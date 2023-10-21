<script setup>
import FormControl from './FormControl.vue';

const props = defineProps({
    modelValue: '',
    width: {
        default: 'md'
    },
    color: {
        default: 'primary'
    },
    label: '',
    placeholder: '',
    errorMessage: '',
    items: {
        default: []
    }
});

const emit = defineEmits(['update:modelValue']);

</script>

<template>
    <form-control :error-message="errorMessage" :width="width" :label="label">
        <select class="select select-bordered">
            <option disabled selected>{{ placeholder }}</option>
            <option v-for="item in items" :value="item.value">{{ item.text }}</option>
        </select>
    </form-control>
</template>
