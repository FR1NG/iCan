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
    errorMessage: ''
});

const emit = defineEmits(['update:modelValue', 'input']);

const handleInput = (e) => {
    emit('input', e)
}

</script>

<template>
    <form-control :error-message="errorMessage" :width="width" :label="label">
        <input
            type="file"
            :class="`file-input file-input-bordered file-input-${color}`"
            :value="modelValue"
            @input="handleInput"
            :placeholder="placeholder"
        />
    </form-control>
</template>
