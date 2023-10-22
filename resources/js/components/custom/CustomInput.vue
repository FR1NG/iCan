<script setup>
import FormControl from './FormControl.vue';

const props = defineProps({
    modelValue: '',
    width: {
        default: 'md'
    },
    type: {
        default: 'text'
    },
    color: {
        default: 'primary'
    },
    label: '',
    placeholder: '',
    errorMessage: ''
});

const emit = defineEmits(['update:modelValue']);

</script>

<template>
    <form-control :error-message="errorMessage" :width="width" :label="label">
        <input
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
            :type="type"
            :placeholder="placeholder"
            :class="`input input-bordered w-full input-${color}`"
        />
    </form-control>
</template>
