<?php
// 1부터 10까지 숫자를 출력해주세요.(반복문 이용해서)

// for($num = 1; $num <= 10; $num++) {
//     echo $num. "\n";
// }
// . 연결 연산자 , 구분 연산자? 

// 구구단2단 작성
// for($num = 1; $num < 10; $num++) {
//     $mul = 2* $num;
//     echo "2 x {$num} = {$mul} \n";
// }

// 조건에 자꾸 도출할 결과를 넣어서 안나옴. 곱할 값이 아닌 돌아야할 숫자를 먼저 찾아야함.

//

for($num = 1; $num <= 9; $num++) {
     echo "{$num}단 \n";

     for($num1 = 1; $num1 <= 9; $num1++){
         $mul = $num * $num1;
         echo "{$num}x{$num1}={$mul}\n";

     }
}

//1단 9단만 뜨게하기.
// 방법1
// for($num = 1; $num <= 9; $num++) {
//     if($num != 1 && $num != 9){
//         continue;
//     }
//     echo "{$num}단 \n";

//     for($num1 = 1; $num1 <= 9; $num1++){
//         $mul = $num * $num1;
//         echo "{$num}x{$num1}={$mul}\n";
//     }
// }

// 방법2
// for($num = 1; $num <= 9; $num++) {
//     if($num === 1 && $num === 9)
//     echo "{$num}단 \n";

//     for($num1 = 1; $num1 <= 9; $num1++){
//         $mul = $num * $num1;
//         echo "{$num}x{$num1}={$mul}\n";
//     }
// }

//홀수만 뜨게하기
// for($num = 1; $num <= 9; $num++) {
//     if($num % 2 === 0 ){
//         continue;
//     }
//     echo "{$num}단 \n";

//     for($num1 = 1; $num1 <= 9; $num1++){
//         $mul = $num * $num1;
//         echo "{$num}x{$num1}={$mul}\n";
//     }
// }

?>