<?php
//몇개일지 모르는 숫자를 다 더해주는 함수를 만들어주세요.
// 해석: 몇개일지 모르는 숫자=...items, 더해주는 함수만들기
// function my_sum($a, $b) {
//     echo $a + $b;
// }
// my_sum(3, 5);

// function my_par(...$items) {
//     print_r($items);
// }
// my_par();

// $mul = [...1 + 2];
// function my_par(...$items) {
    
// }

// $num = 1;
// function my_sum(...$items) {
//     $total=0;
//     foreach($items as $val) {
//         $total = $total + $val;
//     }
//     return $total;
// }
// echo my_sum(1,2,4);

// 함수 안에서 사용하는 변수는 함수안에서만 사용함.
// 함수는 호출 후 실행됨. 위를 예로들면 echo my_sum부터 실행되고 function으로 진행댐
// 어디에 값을 저장하려면 변수를 무조건 생성해야함.

$num = 1;
function my_sum(...$items) {
     $total=0;
     foreach($items as $val) {
         $total = $total + $val;
     }
    return $total;
}
echo my_sum(4,9,8,1,6,7);



// 재귀 함수
// 하나씩 더해지는 함수 만들기
// function my_ap($i) {
//     $sum = 0;
//     for($i; $i > 0; $i --) {
//         $sum += $i;
//     }
//     return $sum;
// }

// my_ap(10);

// function my_recursion($i) {
//     if($i === 1) {
//         return 1;
//     }
//     return $i + my_recursion($i - 1);
// }
// echo my_recursion(2);


?>