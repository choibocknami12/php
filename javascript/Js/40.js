// 인라인 이벤트
// html 9~10라인 확인


// 프로퍼티 리스너
const BTNGOOGLE = document.getElementById('btn_google');
BTNGOOGLE.onclick = function() {
    location.href = 'http:\/\/www.google.com'; //www없어도 실행됨.
};

// addEventListener(eventType, function) 방식
// 하나의 객체에 여러이벤트를 줄 수 있어서 현재 더 사용많이 함.

//팝업창 열기
function popOpen() {
    winOpen = open('http:\/\/www.daum.net', '', 'width=500 height=500');//메소드가 있음. 뒤에 사이즈조절안하면 새탭으로 열림
}
function popClose() {
    winOpen.close();
}

const BTNDAUM = document.getElementById('btn_daum');
let winOpen;
BTNDAUM.addEventListener('click', popOpen );

//팝업창 닫기
const BTNCLOSE = document.getElementById('btn_close');

BTNCLOSE.addEventListener('click', popClose);
// BTNCLOSE.removeEventListener('click', popClose);

// 이벤트 삭제
//BTNDAUM.removeEventListener('click', popOpen(winOpen));

// 'test'를 콘솔에 출력하는 함수
// function test() {
//     console.log("test");
// }

// //콜백함수를 실행하는 함수
// function cb(fnc) {
//     fnc();
// }

// classList
// 속성인데 클래스를 다 가져오는거?

//console에 getEventListeners(요소); 이렇게 검색하면 어떤 이벤트를 사용했는지 확인할 수 있음.

// 이벤트 타입
// 1. 마우스 이벤트
// - mousedown - 마우스가 요소안에서 클릭이 눌릴 때
// - mouseup - 마우스가 요소안에서 클릭이 해제될 때
// - mouseenter - 마우스 포인터가 요소 안으로 진입 했을 때
const DIV1 = document.querySelector('#div1');
DIV1.addEventListener('mouseenter', () => {
	alert('DIV1에 들어왔어요.');
	DIV1.style.backgroundColor = '#000000';
});

// - mouseleave - 마우스 포인터가 요소 밖깥으로 나갔을 때
// - mousemove - 마우스 포인터가 요소 안에서 움직일 때
// - event.clientX, event.clientY - 브라우저 화면 기준 X, Y 좌표
// - event.pageX, event.pageY - 전체화면 기준(스크롤 포함) X, Y좌표
// - event.target.getBoundingClientRect() - 요소의 크기와 뷰포트로 부터 상대적인 위치를 반환

// 2. 키보드 이벤트
// - keydown
// - keypress
// - keyup
// - event.key : 사용자가 누른 키 값을 반환합니다.
// - event.keyCode : 사용자가 누른 키 코드(ASCII) 값을 반환합니다.
// const INTXT = document.getElementById('intxt');
// INTXT.addEventListener('keyup', (e) => console.log(e));

// 3. 포커스 이벤트
// - focus
// - blur
// - change

// 4. 폼 이벤트
// 	- submit : 양식(Form)이 제출하기전에 발생 하는 이벤트 입니다. 주로 전송될 값을 유효성 체크할 때 사용합니다.

// 5. 진행(progress) 이벤트
//	- load
//	- error

//마우스 이벤트 예시
//const DIV1 = document.querySelector('#div1');
DIV1.addEventListener('mouseenter', () => {
    alert('DIV1에 들어왔다');
    DIV1.style.backgroundColor = 'red';
});


