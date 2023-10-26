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


//마우스 이벤트 예시
const DIV1 = document.querySelector('#div1');
DIV1.addEventListener('mouseenter', () => {
    alert('DIV1에 들어왔다');
    DIV1.style.backgroundColor = 'red';
});


