<script setup>
const props = defineProps({
    modelValue: {
        default: true
    },
    title: ''
})

const emit = defineEmits(['update:modelValue', 'close'])

const closeDialog = () => {
    // updating the model value
    emit('update:modelValue', false);
    // emitting the close event
    emit('close')
}
</script>

<template>
    <!-- <button class="btn" onclick="my_modal_4.showModal()">open modal</button> -->
    <dialog v-if="modelValue" id="my_modal_4" class="modal modal-open	">
        <div class="modal-box w-11/12 max-w-5xl">
            <h3 class="font-bold text-lg">
                {{ title }}
            </h3>
            <slot></slot>
            <div class="modal-action">
                <form method="dialog">
                    <slot name="actions">
                            <button class="btn" @click="closeDialog">Close</button>
                    </slot>
                </form>
            </div>
        </div>
    </dialog>
</template>
