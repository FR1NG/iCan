<script setup>
    const emit = defineEmits(['click'])
    const props = defineProps({
        color: {
            default: 'secodary'
        },
        disabled: {
            default: false
        },
        loading: {
            default: false
        }

    });
    const handleClick = () => {
        emit('click');
    }

</script>

<template>
    <button :class="`btn ml-2 btn-${color} ${disabled ? 'btn-disabled' : ''}` " @click="handleClick">
        <slot></slot>
        <span v-if="loading" class="loading loading-spinner"></span>
    </button>
</template>
