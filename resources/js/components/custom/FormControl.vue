<script setup>
import { watch, ref } from 'vue';

const props = defineProps({
    width: {
        default: 'full'
    },
    label: '',
    errorMessage: ''
});

const hasError = ref(props.errorMessage && props.errorMessage.length > 0 ? true : false);

watch(() => props.errorMessage, (newValue) => {
    if (newValue.length > 0) {
        hasError.value = true;
    }
    else if(newValue.length === 0 && hasError.value) {
        hasError.value = false;
    }
});

</script>

<template>
    <div :class="`form-control w-${width}`">
        <label class="label">
            <span class="label-text">{{ label }}</span>
        </label>
        <slot></slot>
        <label class="label">
            <span v-if="hasError" class="label-text-alt text-error">{{errorMessage}}</span>
        </label>
    </div>
</template>
