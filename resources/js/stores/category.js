
import axios from '@/plugins/axios';
import { defineStore } from 'pinia';

export const useCategoryStore = defineStore('category', {
    state: () => ({
        categories: []
    }),
    getters: {
        itemsForSelect: (state) => {
            return state.categories.map(el => {
                return {
                    text: el.name,
                    value: el.id
                }
            });
        }
    },
    actions: {
        async getCategories() {
            return new Promise(async (resolve) => {
                try {
                    const response = await axios.get('/category');
                    this.categories = response.data.data;
                    console.log(this.categories)
                    resolve(response.data.data);
                } catch(error) {
                    console.log(error);
                }
            })
        },
        async createCategory(data) {
            if (! data['parent_id'])
                delete data['parent_id'];
            return new Promise(async (resolve, reject) => {
                try {
                    const response = await axios.post('/category', {
                        ...data
                    });
                    console.log(response.data);
                    resolve(response.data.data);
                    this.getCategories();
                } catch(error) {
                    console.log(error);
                    reject(error?.response?.data);
                }
            })
        }
    }
})
