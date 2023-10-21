
import axios from 'axios';
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
            return new Promise(async (resolve, reject) => {
                try {
                    const response = await axios.get('api/category');
                    this.categories = response.data.data;
                    console.log(this.categories)
                    resolve(response.data.data);
                } catch(error) {
                    console.log(error);
                }
            })
        }
    }
})
