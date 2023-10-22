import { defineStore } from 'pinia';
import axios from '@/plugins/axios';

export const useProductStore = defineStore('product', {
    state: () => ({
        products: [],
    }),
    getters: {

    },
    actions: {
        async getProducts(filter) {
            return new Promise(async (resolve) => {
                try {
                    const response = await axios.get(`/product?category=${filter || ''}`);
                    this.products = response.data.data;
                    resolve(response.data.data);
                } catch(error) {
                }
            })
        },
        async createProduct(form) {
            return new Promise(async (resolve, reject) => {
                try {
                    const response = await axios.post('/product', form);
                    resolve(response.data.data);
                    this.getProducts();
                } catch(error) {
                    reject(error?.response?.data);
                }
            })
        }
    }
})
