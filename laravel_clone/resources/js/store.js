
import {createApp} from 'vue';
import { createStore } from 'vuex';
import router from '../js/router.js';
import AppComponent from '../components/AppComponent.vue';

const store = createStore({
	// 앞서 사용하던 vue의 data영역과 같음
	// state() : 데이터 저장영역
	state() {
		return {
			testStr: 'vuex테스트용',
			laravelData: null, // 라라벨에서 받은 데이터 저장용
		}
	},

	mutations: {
		// 라라벨에서 받은 초기 데이터 셋팅
		setLaravelData(state, data) {
			state.laravelData = data;
		}
	},

	// actions : ajax로 서버에 데이터를 요청할 때나 시간 함수등 비동기 처리를 actions에 정의
	actions: {

	},
});

export default store;