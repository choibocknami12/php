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
let name = "홍길동";
console.log(name);
name = "갑순이";
console.log(name); //이건 가능함. 재할당이 가능한거임. 변수명이 중복안되게 하려고 let으로 많이 사용함.

// const : 중복 선언 불가, 재할당 불가능, 블록레벨 스코프
const AGE = 19;
console.log(AGE);
