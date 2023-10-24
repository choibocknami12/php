// 조건문
//---------------------------------------
// if(조건) {

// } else if(조건) {

// } else {

// }



let age = 20;
switch(age) {
    case 20:
        console.log("20대");
        break;
    case 30:
        console.log("30대")
        break;
    default:
        console.log("모르겠다.")
        break;
}

//반복문(while, do while, for, foreach,for..in,for...of)
//-----------------------------------------------------------

//foreach : 배열만 사용가능. 인덱스배열!
//let arr = [1, 2, 3, 4];
// arr.forEach( function( val, key) {
//     console.log(`${key} : ${val}`);
// });

//for...in : 모든 객체를 루프 가능, key만 접근이 가능
// let obj = {
//     key1: 'val1'
//     ,key2: 'val2'
// }
// for( let key in obj ) {
//     console.log(key);
// }
//이렇게도 사용가능함
// for( let key in obj ) {
//     console.log(obj[key]);
// }

//for...of : 모든 iterable객체(순서가 정해져 있음)를 루프 가능. value에 접근 가능(string,array,map,set,typearray...)
// for( let val of obj ) {
//     console.log(val);
// }


//정렬해주세요.

let sort_arr = [3, 5, 2, 7, 10];

sort_arr.sort((a, b) => a - b);//화살표 방식
//sort_arr.sort(function(a, b) {
//    return a - b
// }); //함수 선언문 방식?

//for문을 사용해도댐
//for(let i = 1; i < sort_arr.length; i++) {
//  for(let z = 1; z < sort_arr.length - 1; z++){
//      if(sort_arr[z] > sort_arr[z+1]) {
//          let save = sort_arr[z]
//          sort_arr[z] = 
//}    
//}   
//}

