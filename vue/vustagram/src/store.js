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
			state.lastBoardId = data[data.length - 1].id; // data[2]의 id값
			//console.log(data); // 데이터가 어떤게 오는지 확인
			
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
			// unshift() : js 의 배열 메소드.
			// 배열의 맨 앞에 하나 이상의 요소를 추가해줌.
			state.boardData.unshift(data);
		},
		// 작성 후 데이터 초기화 처리
		setClearAddData(state) {
			state.imgURL = '';
			state.postFileData = null;
		},
		//
		setPushBoard(state, data) {
			state.boardData.push(data);
			// console.log(data);
			state.lastBoardId = data.id;
			// console.log(state.lastBoardId);
		}
	},

	// actions : ajax로 서버에 데이터를 요청할 때나 시간 함수등 비동기 처리를 actions에 정의
	actions: {
		// 초기 게시글 데이터 획득. ajax 처리
		// context : store영역에 접근할 수 있는 고정된 파라미터.  
		// commit : mutations호출하는 메소드.
		// dispatch : action호출 메소드
		// context : store에 접근용 파라미터
		actionGetBoardList(context) {
			// url, header : 권한 여부 설정
			const url = 'http://112.222.157.156:6006/api/boards';
			const header = {
				headers: {
					'Authorization': 'Bearer meerkat'
				}
			};
			// 서버와 DB 송수신
			axios.get(url, header)
			.then(res => { 
				// res: object. 화면에 출력되는 모든 정보가 담겨있음
				// console.log(res);
				// console.log(res.status); // 서버 상태 나타냄
				// array내 객체로 전송받은 데이터를 res.data에 저장
				// store에 접근하여 mutation안의 setBoardList메소드를 res.data파라미터로 전달
				// setBoardList(res.data)
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
					// 인증키 등록
					'Authorization': 'Bearer meerkat',
					// 서버에 전송하는 데이터형식을 나타냄.
					// 'multipart/form-data' : 파일 업로드와 같이 여러 종류의 데이터를 동시에 전송할 때 유용
					'Content-Type': 'multipart/form-data',
				}
			};
			const data = {
				name: '최최최',
				img: context.state.postFileData,
				// content: 
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
			const url = 'http://112.222.157.156:6006/api/boards/' + context.state.lastBoardId;
			const header = {
				headers: {
					'Authorization': 'Bearer meerkat',
				},
			};
			axios.get(url, header)
			.then(res => {
				// console.log(res);
				context.commit('setPushBoard', res.data);
			})
			.catch(err => {
				console.log(err);
			}) 
		}
	},
});

export default store;