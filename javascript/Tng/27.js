//원본을 보존하면서 오름차순 정렬 해주세요.
const ARR_SORT = [ 6, 3, 5, 8, 92, 3, 7, 5, 100, 80, 40 ];

let arr_sort = Array.from(ARR_SORT);
arr_sort.sort((a,b) => a - b); //이걸 파라미터에 넣으면 안되는이유는 파라미터가 먼저 실행되기 때문에 변경된걸 함수에 담기 때문.
//let ARR1_sort = Array.from(ARR1).sort((a,b) => a - b);

// 짝수와 홀수를 분리해서 각각 새로운 배열 만들어 주세요.
const ARR2 = [5, 7, 3, 4, 5, 1, 2];

arr2_map = ARR2.filter( num => {
    if( num % 2 === 0){
        return num;
    } 
});

arr3_map = ARR2.filter( num => {
    if( num % 2 !== 0){
        return num;
    }
}); // !연산자가 리소스를 더 먹음. 또, 실수가 들어가면 문제가 생길 수 있음.
//arr3_map = ARR2.filter( num % 2 === 1 );

//함수로 만들기
function test ( arr, flg ) {
    if( flg === 0 ) {
        return arr.filter( num % 2 === 0 );
    } else {
        return arr.filter( num % 2 === 1 );
    }
}


//다음 문자열에서 구분문자를 '.'에서 ''(공백)으로 변경해 주세요.
const STR1 = 'php504.meer.kat';

//let str2 = replaceAll('.',' ');
let str1 = STR1.split('.').join(''); //split 원본 유지 가능.
