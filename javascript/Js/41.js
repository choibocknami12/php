
// 타이머 함수

// 1. setTimeout( 콜백함수, 시간(ms)) : 일정 시간이 흐른 후에 콜백함수를 실행
//setTimeout(() => console.log('시간'), 3000);

//콘솔에 1초 뒤 A, 2초 뒤 B, 3초뒤에 C가 출력되도록 해주세요.
// setTimeout(() => console.log('A'), 1000);
// setTimeout(() => console.log('B'), 2000);
// setTimeout(() => console.log('C'), 3000);

// //함수 만들 경우
// function my_print(chr, ms) {
//     setTimeout(() => console.log(chr), ms);
// }

// my_print('A', 1000);
// my_print('B', 1000);
// my_print('C', 1000);


// 2. clearTimeout(해당setTimeout객체) : 타이머를 삭제하는 기능.
// let mySet = setTimeout(() => console.log('C'), 5000);
// clearTimeout(mySet);


// 3. setInterval( 콜백함수, 시간(ms) ) : 일정시간마다 반복
//let myInter = setInterval(() => console.log('배고프다'), 1000);
//clearInterval(myInter); //반복없애기.


//화면을 로드하고 5초 뒤에 '두둥등장'이라는 매우 큰 글씨가 나타나게 해주세요.

const TXT = document.getElementById('text');
//

function txt() {
    TXT.classList.add('h1');
    TXT.style.color = 'red';
    TXT.style.fontSize = 100+'PX';
    TXT.innerHTML = "두둥등장";
}

setTimeout(txt, 5000);

//샘풀이
function myAdd() {
    const H1 = document.createElement('h1');
    H1.innerHTML = '두둥등장!';
    document.body.appendChild(H1);
}

setTimeout(myAdd, 5000);


//setTimeout(() => console.log('두둥등장'), 5000);


// function txt() {
//     setTimeout(() => console.log(chr), 5000);
// }
