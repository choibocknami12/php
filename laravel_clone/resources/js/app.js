require('./bootstrap');

import {createApp} from 'vue';
import AppComponent from '../components/AppComponent.vue';
import TabComponent from '../components/TabComponent.vue';

createApp({
    components: {
        AppComponent,
        TabComponent,
    }
})
// .use();
.mount('#app');
