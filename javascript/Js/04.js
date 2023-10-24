//console.log("반갑습니다. js파일입니다.");
//자바스크립트는 에러뜨면 그 밑에 코드가 실행되지 않음.

//변수 (var, let, const)
// var : 중복 선언 가능, 재할당 가능, 함수레벨 스코프
// var name = "홍길동";
// console.log(name);
// name = "갑순이";
// console.log(name);//기존의 변수값이 바뀌는것.

// let : 중복 선언 불가능, 재할당 가능, 블록레벨 스코프
// let name = "홍길동";
// console.log(name);
// let name = "갑순이";
// console.log(name); //에러가 떠서 중복선언 불가
// let name = "홍길동";
// console.log(name);
// name = "갑순이";
// console.log(name); //이건 가능함. 재할당이 가능한거임. 변수명이 중복안되게 하려고 let으로 많이 사용함.

// // const : 중복 선언 불가, 재할당 불가능, 블록레벨 스코프
// const AGE = 19;
// console.log(AGE);

//-------------------------------------------------------
//스코프
//-------------------------------------------------------
//1. 전역 스코프 : 어디서든 사용가능.
// let gender = "M";


//2. 함수레벨 스코프 : 함수안에서만 사용가능.
// function test1() {
//     let test1 = "test1";
//         console.log(test1);
//         console.log(gender);
// }



//3. 블록레벨 스코프 : {}이 안에 들어가는게 블록? 
// function test2() {
//     let test1 = "test1";
//     if(true) {
//         let test1 = "test2";
        
//     }
//     console.log(test1);
// }

// function test3() {
//     var test1 = "test1";
//     if(true) {
//         var test1 = "test2";
//     }
//     console.log(test1);
// }


//---------------------------------------------
//호이스팅(hoisting)
//---------------------------------------------
// 인터프리터가 변수와 함수의 메모리 공간을 선언 전에 미리 할당 하는 것.
// 코드가 실행되기 전 변수와 함수를 최상단에 끌어 올려지는 것.

//console.log(htest1());
//console.log(hvar);//여기만 찍으면 안나옴. 
console.log(hlet);//let은 여기서 찍으면 에러발생하면서 변수 선언 밑에 찍어도 에러남.

function htest1() {
    return "htest1 함수 입니다.";
}

var hvar = "var로 선언";
let hlet = "let으로 선언";
console.log(hvar);//var의 값은 메모리에 저장되어 있다가 이제 출력되는것.

//내가 사용할 변수를 최상단에 미리 선언해두고 사용하면 좋을것.

