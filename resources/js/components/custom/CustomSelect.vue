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

const handleChange = (e) => {
    emit('update:modelValue', e.target.value);
}
</script>

<template>
    <form-control :error-message="errorMessage" :width="width" :label="label">
        <select @change="handleChange" :value="modelValue" class="select select-bordered">
            <option disabled selected>{{ placeholder }}</option>
            <option v-for="item in items" :value="item.value">{{ item.text }}</option>
        </select>
    </form-control>
</template>
