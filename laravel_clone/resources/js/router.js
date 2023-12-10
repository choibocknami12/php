import { createWebHistory, createRouter } from 'vue-router';
import TabComponent from '../components/TabComponent.vue';

const routes = [
    {
        path: '/',
        redirect: '/product'
    },
    {
        path: '/coment',
        component: TabComponent,
    },
];

const router = createRouter({
	history: createWebHistory(),
	routes,
});

export default router;