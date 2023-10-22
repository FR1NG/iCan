import { defineStore } from 'pinia';

export const useNotificationStore = defineStore('notification', {
    state: () => ({
        type: 'info',
        text: '',
        visibility: false
    }),
    getters: {

    },
    actions: {
        notify(config = {type: 'info', text: '', timeout: 3000}) {
            this.type = config.type;
            this.text = config.text;
            this.visibility = true;
            setTimeout(() => {
                this.type = 'success';
                this.text = '';
                this.visibility = false
            }, config.timeout || 3000);
        }
    }
})
