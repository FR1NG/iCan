<script setup>
import { ref } from 'vue';
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

const selected = ref({});
const emit = defineEmits(['update:modelValue']);

const handleChange = (e) => {
    selected.value[e.target.value] = props.items.find(el => el.value == e.target.value).text;
    emit('update:modelValue', [Object.keys(selected.value)]);
}

const removeItem = (key) => {
    delete selected.value[key];
    emit('update:modelValue', [Object.keys(selected.value)]);
}
</script>

<template>
    <form-control :error-message="errorMessage" :width="width" :label="label">
        <div class="flex grid-flow-row">
            <div v-for="item in Object.keys(selected)" class="m-2 py-4 badge badge-outline">
                {{selected[item]}}
                <div @click="removeItem(item)" class="m-2  badge badge-error cursor-pointer">x</div>
            </div>
        </div>
        <select
            @change="handleChange"
            value="modelValue"
            class="select select-bordered">
            <option disabled selected>{{ placeholder }}</option>
            <option v-for="item in items" :value="item.value">{{ item.text }}</option>
        </select>

    </form-control>
</template>
