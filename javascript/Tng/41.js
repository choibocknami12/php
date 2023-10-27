//1. 현재 시간을 화면에 표시
//let now = new Date(); // 현재 시간 now에 담음.
//H1.innerHTML = now.toLocaleTimeString();//ㅅㅂ

// let month = now.getMonth() + 1; //월 받아오기
// let date = now.getDate(); //일 받아오기
// let mill = now.getMilliseconds(); //밀리초 받아오기

const H1 = document.getElementById('h1');
//h1태그에 접근.

//2. 실시간으로 시간을 화면에 표시
// 함수를 만들어서 현재시간 값 받아옴.
function clock() {
    let now = new Date();
    let hour = now.getHours(); 
    let min = now.getMinutes();
    let sec = now.getSeconds();
    let AMPM = hour > 12 ? '오후' : '오전' ;
    H1.innerHTML = ' 현재 시각 ' + AMPM + hour + ' : ' + min + ' : ' + sec;
}

clock();
let interval = setInterval(clock, 1000);

// 샘풀이
// const NOW = new Date();
// const H1 = document.getElementById('h1');

//getNow();
//setInterval(clock, 1000);

// function getNow() {
// const NOW = new Date();
// const NOWUSA = new Date(); // 미국시간 구할 date
// let hour = now.getHours(); 
// let min = now.getMinutes();
// let sec = now.getSeconds();
// let AMPM = hour > 12 ? '오후' : '오전'; //
// hour = hour > 12 ? hour - 12 : hour;
// let print_time =
//     AMPM + ' '
//     + add_str_zero(hour) + ':'
//     + add_str_zero(minute) + ':'
//     + add_str_zero(second);
// H1.innerHTML = print_time; // 여따가 3라인으로 넣으면 35~44라인 까지 필요없음.
//}
// NOWUSA.setTime( NOW - (1000 * 60 * 60 * 13) ); // 현재시간 - 13시
// let now_usa = NOWUSA.toLocalTimeString();

// 숫자가 10미만이면 '0'을 붙여주는 함수
//  function add_str_zero(num) {
//      return String(num < 10 ? '0' + num : num);
//  }
// 
//

//3. 멈춰 버튼을 누르면, 시간이 정지할 것

const BTNSTOP = document.querySelector('#btn-stop');
BTNSTOP.addEventListener('click', stopTime);

function stopTime() {
    clearInterval(interval);
}

//4. 재시작버튼을 누르면, 버튼을 누른 시점의 시간부터 다시 실시간으로 화면에 표시

const BTNRE = document.querySelector('#btn-restart');
BTNRE.addEventListener('click', reTime);

function reTime() {
    clock();
    interval = setInterval(clock, 1000);
}