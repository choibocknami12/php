let arr = [1,2,3,4,5];

// push() : 배열에 값을 추가하는 메소드
arr.push(6);


// splice() : 배열의 요소를 삭제하거나 교체하는 메소드
//arr.splice(2,1); //3(arr[2])을 삭제
//arr.splice(2,3); //배열의 arr[2]부터 n개를 삭제
//arr.splice(4,1);
//arr.splice(2, 0, 10); //배열의 arr[2]에 값이 10인 인덱스를 추가.
//arr.splice(2, 1, 10); //배열의 2번방에서 시작해서 1개의 값을 삭제하고 10을 넣겠다.
//arr.splice(2, 0, 10, 11, 12, 13); //3번째 아규먼트부터는 가변파라미터로서 모든 값을 추가.


//indexOf() : 배열에서 특정 요소를 찾는데 사용하는 메소드. 몇번째 방에 있는지 알려줌
arr.indexOf(5);


//lastIndexOf() : 배열에서 특정 요소 중 가장 마지막에 위치한 요소를 찾는데 사용
//arr = [1, 1, 1, 3, 4, 5, 6, 6, 6, 10];


//pop() : 배열의 가장 마지막 요소를 삭제하고 삭제한 요소의 값을 리턴.
let i_pop = arr.pop(); // 삭제한 마지막 요소를 변수에 담아줌. 그래서 i_pop을 불러오면 삭제한 마지막 요소가 보임.


//sort() : 배열을 정렬하는 메소드. 원본을 변경함. 그래서 arr_sort와 arr이 같아짐(원본파기댐).
// 양수면 자리를 바꿈?
//arr = [5, 4, 7, 2, 8];
//아래 두가지 식은 같은거임.
//let arr_sort = arr.sort((a,b) => a - b);
// let arr_sort = arr.sort( function(a, b) {
//     return a - b;
// });
// 내림차순
//let arr_sort = arr.sort((a, b) => b - a);

//원본데이터를 남겨두고 싶으면 이 방식을 사용해야함(value copy 방식 : php는 기본이 이런 방식이나 js는 주소참조방식)
//let arr2 = Array.from(arr);


// includes() : 배열의 특정요소를 가지고 있는지 판별(리턴 boolean). 이건 한가지 요소만 판별함.
//arr = ['치킨', '육회비빔밥', '비엔나'];

let boo_includes = arr.includes('짜장면');


// join() : 배열의 모든 요소를 연결해서 하나의 문자열을 만들어서 리턴. php에서 implode랑 같음. 구분문자:, / 이런거
arr.join(); //'치킨,육회비빔밥,비엔나'
arr.join(''); //'치킨육회비빔밥비엔나'
arr.join(' / '); //'치킨/육회비빔밥/비엔나'


// map() : 배열의 모든 요소에 대해서 주어진 함수의 결과를 모아서 새 배열을 리턴
// arr = [1, 2, 3, 4, 5, 6, 7, 8, 9];

//모든 요소의 값 * 2의 결과를 배열로 만들기
let arr_map = arr.map( num => num * 2);

arr_map = arr.map( num => {
    if( num % 3 === 0){
        return '짝';
    } else {
        return num;
    }
});


// some() : 주어진 함수를 만족하는 요소가 있는지 판별 후 하나라도 존재하면 true(return boolean)
arr = [1, 2, 3, 4, 5, 6, 7, 8, 9];
let boo_some = arr.some( num => num === 9);


// every() : 배열의 모든 요소가 주어진 함수에 만족하면 true, 하나라도 만족하지 않으면 false
let boo_every = arr.every( num => num === 9);


// filter() : 배열의 요소 중 주어진 함수에 만족하는 요소만 모아서 새로운 배열을 리턴.(원본 유지)
let boo_filter = arr.filter( num => num % 3 === 0);


