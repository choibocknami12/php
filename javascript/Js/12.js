//함수
//---------------------------------

//1. 함수 생성
//1-1. 함수 선언식. hoisting의 영향받음
// function fnc_sum(a, b) {
//     return a + b;
// }


//1-2. 함수 표현식 : 함수를 변수에 저장하는거. hoisting의 영향을 안받음. 지시자를 const로 정하는 경우가 많음.함수 안바뀌니까.
// let fnc1 = function(a, b) {
//     return a + b
// }
//fnc1(a, b); >> 하면 답이 나옴


//익명함수 : 이름이 없는 함수
// const num = ( function(a,b){
//     return a + b
// })
// 콜백함수때문에 사용함.

//콜백함수 : 다시 호출되는 함수
// 어떤 처리 후 나중에 실행하고 싶을 떄.
// function fnc_callback( call ) {
//     call();
// }

// fnc_callback(function() {
//     console.log('익명함수')
// });

//예시 : 배열객체의 sort의 경우 예시(동작안함)
// sort_arr.sort( function(a,b){
//     return a - b
// });

// function sort(call) {
//     let num = call();
//     if(num < 0) {
//         //처리
//     } else {

//     }
// };


//화살표 함수(ARROW Function) : 함수 표기법의 일종
//파라미터가 없는 경우
let f1 = function() {
    return "f1";
}

let f2 = () => f2;

//파라미터가 1개인 경우
let f3 = function(a) {
    return a + '입니다.';
}

let f4 = (a) => a + '입니다.'; // let 변수 = 파라미터 => 리턴값

//파라미터가 2개 이상인 경우
let f5 = function(a, b) {
    return a + b;
}

let f6 = (a, b) => a + b; 
// 처리할 내용이 (리턴값이?)2줄 이상되면 중괄호 필요
//예시 : 함수의 처리가 많을 경우
let f7 = function(a, b) {
    if(a > b) {
        return 'a가 큼';
    } else {
        return 'b가 큼';
    }
}

let f8 = (a,b) => {
    if(a > b) {
        return 'a가 큼';
    } else {
        return 'b가 큼';
    }
}