// vuex의 기본형태

import { createStore } from 'vuex';
import axios from 'axios';


const store = createStore({
	// 앞서 사용하던 vue의 data영역과 같음
	// state() : 데이터 저장영역
	state() {
		return {
			// 게시글 저장용
			boardData: [],
			// 탭ui용 플래그
			flgTapUI: 0,
			// 작성탭 표시용 이미지 URL 저장용
			imgURL: '',
			// 글 작성용 파일데이터 저장
			postFileData: null,
			// 가장 마지막 로드된 게시글 번호 저장용
			lastBoardId: 0,
		}
	},

	// mutations : 데이터 수정 함수 저장영역
	// 안전장치(데이터 변화되는 것 방지)
	// 함수안의 첫번째 파라미터에는 state 문법임
	// state만큼 mutation이 늘어나야함.
	mutations: {
		// 초기 데이터 셋팅용
		setBoardList(state, data) {
			state.boardData = data;
			state.lastBoardId = data[data.length - 1].id;
			
		},
		// 탭ui 셋팅용
		setFlgTapUI(state, num) {
			state.flgTapUI = num;
		},
		// 작성탭 표시용 이미지 URL 저장용
		setImgURL(state, url) {
			state.imgURL = url;
		},
		// 글 작성용 파일데이터 저장
		setPostFileData(state, file) {
			state.postFileData = file;
		},
		// 작성된 글 삽입용 
		setUnshiftBoard(state, data) {
			state.boardData.unshift(data);
		},
		// 작성 후 데이터 초기화 처리
		setClearAddData(state) {
			state.imgURL = '';
			state.postFileData = null;
		},
		//
	},

	// actions : ajax로 서버에 데이터를 요청할 때나 시간 함수등 비동기 처리를 actions에 정의
	actions: {
		// 초기 게시글 데이터 획득. ajax 처리
		// context : store영역에 접근할 수 있는 파라미터. state는 mutations에서 
		// commit : mutations호출하는 메서드.
		actionGetBoardList(context) {
			const url = 'http://112.222.157.156:6006/api/boards';
			const header = {
				headers: {
					'Authorization': 'Bearer meerkat'
				}
			};
			
			axios.get(url, header)
			.then(res => {
				// console.log(res.data);
				// console.log(res.status);
				context.commit('setBoardList', res.data);
			})
			.catch(err => {
				console.log(err);
			}) 
		},

		// 글 작성 처리
		actionPostBoardAdd(context) {
			const url = 'http://112.222.157.156:6006/api/boards';
			const header = {
				headers: {
					'Authorization': 'Bearer meerkat',
					'Content-Type': 'multipart/form-data',
				}
			};
			const data = {
				name: '최복남',
				img: context.state.postFileData,
				content: document.getElementById('content').value,
			};

			axios.post(url, data, header)
			.then(res => {
				// 작성글 데이터 저장
				context.commit('setUnshiftBoard', res.data);

				// 리스트 ui로 전환
				context.commit('setFlgTapUI', 0);

				// 작성 후 초기화 처리
				context.commit('setClearAddData');
			})
			.catch(err => {
				console.log(err);
			});
		},

		// 디테일 페이지 가져오기
		actionGetBoardShow(context) {
			const url = 'http://112.222.157.156:6006/api/boards/{board}';
			const header = {
				headers: {
					'Authorization': 'Bearer meerkat',
				},
			};
			
			axios.get(url, header)
			.then(res => {
				console.log(res.data);
				// console.log(res.status);
				context.commit('setBoardList', res.data);
			})
			.catch(err => {
				console.log(err);
			}) 
		}
	},
});

export default store;