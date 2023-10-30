// 두수를 받아서 더한 값을 리턴해주는 함수

function sum(a, b) {
    return a + b ;
}
//(a, b) => a + b;

//콜백함수 : 파라미터에 넘겨주는건 다 콜백함수다..
function myCallBack(fnc) {
    fnc();
}

myCallBack( function() {
    console.log('123');
})
// myCallBack( () => console.log('123') );

//함수를 3개 만들어주세요.
// - php를 출력하는 함수, 3초 뒤 출력
function php() {
    console.log('php');
}
setTimeout(php, 3000);

// - 504를 출력하는 함수, 5초 뒤 출력
function green() {
    console.log('504');
}
setTimeout(green, 5000);

// - 풀스택을 출력하는 함수 바로 출력
function full() {
    console.log('풀스택');
}
//setTimeout(full); //디폴트가 0임.
full();

//현재시간 구해주세요
let now = new Date();

function clock() {
    let now = new Date();
    let year = now.getFullYear();
    let month = now.getMonth()+1;
    let date = now.getDate();
    let hour = now.getHours(); 
    let min = now.getMinutes();
    let sec = now.getSeconds();
    console.log(year+'-'+month+'-'+date+'-'+hour+':'+min+':'+sec);
}

function clock() {
    let now = new Date();
    let year = now.getFullYear();
    let month = now.getMonth()+1;
    let date = now.getDate();
    let time = now.toLocaleTimeString();
    console.log(year+'-'+month+'-'+date+ time);
}

//let test = confirm('ddd');
//if('test') {
//  window.location.href="http:// google.com";    
//}
//취소를 누르면 그페이지 그대로 있고 확인을 누르면 구글메인페이지로 이동


const BTN1 = document.getElementById('btn');
BTN1 = addEventListener('click', ()=> {
    window.location.href="http://naver.com";
});

//html에서 onclick으로 링크 연결 줄수도 있음