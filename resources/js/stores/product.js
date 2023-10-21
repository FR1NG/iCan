import { defineStore } from 'pinia';

export const useProductStore = defineStore('product', {
    state: () => ({

    }),
    getters: {

    },
    actions: {
        test() {
            console.log('hello from pinia');
        }
    }
})
