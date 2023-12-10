import { createWebHistory, createRouter } from 'vue-router';
import LoginComponent from '../components/LoginComponent.vue';
import BoardComponent from '../components/BoardComponent.vue';

// 말그대로 뷰의 route부분. 여기서 이어주는 경로들 지정해주기
const routes = [
	{
		path: '/',
		redirect: '/login',
	},
	{
		path: '/login',
		component: LoginComponent,
	},
	{
		path: '/board',
		component: BoardComponent,
	},
];

const router = createRouter({
	history: createWebHistory(),
	routes,
});

export default router;