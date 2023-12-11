import { createWebHistory, createRouter } from 'vue-router';
import TabComponent from '../components/TabComponent.vue';
import LoginComponent from '../components/LoginComponent.vue';

const routes = [
    {
        path: '/',
        redirect: '/product'
    },
    {
        path: '/coment',
        component: TabComponent,
    },
    {
        path: '/login',
        component: LoginComponent,
    },
];

const router = createRouter({
	history: createWebHistory(),
	routes,
});

export default router;