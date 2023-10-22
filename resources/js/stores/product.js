import { defineStore } from 'pinia';
import axios from '@/plugins/axios';

export const useProductStore = defineStore('product', {
    state: () => ({
        products: [],
    }),
    getters: {

    },
    actions: {
        async getProducts() {
            return new Promise(async (resolve) => {
                try {
                    const response = await axios.get('/product');
                    this.products = response.data.data;
                    console.log(this.products)
                    resolve(response.data.data);
                } catch(error) {
                    console.log(error);
                }
            })
        },
        async createProduct(form) {
            return new Promise(async (resolve, reject) => {
                try {
                    const response = await axios.post('/product', form);
                    console.log(response.data);
                    resolve(response.data.data);
                    this.getProducts();
                } catch(error) {
                    console.log(error);
                    reject(error?.response?.data);
                }
            })
        }
    }
})
