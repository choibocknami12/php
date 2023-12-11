require('./bootstrap');

import {createApp} from 'vue';
import store from '../js/store.js';
import TabComponent from '../components/TabComponent.vue';

createApp({
    components: {
        TabComponent,
    }
})
    .use(store)
    .mount('#app');

