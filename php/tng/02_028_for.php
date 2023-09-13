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

// for($num = 1; $num <= 9; $num++) {
//      echo "{$num}단 \n";

//      for($num1 = 1; $num1 <= 9; $num1++){
//          $mul = $num * $num1;
//          echo "{$num}x{$num1}={$mul}\n";

//      }
// }

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

//별찍기
// for ($star = "*";($star >=1 && $star <= 5);$star++) {
//     if($star === 5) {
//         break;
//     }
//     echo $star;
// }

//별다섯개 한줄 나옴

// for ($num = 1; $num <= 5; $num++){
//     for($star = 1; $star <= $num; $star++){
//        
//         echo "*";
//     }
//     echo "\n";
// }

for ($num = 5; $num >= 1; $num--) {
    for($spe = 5; $spe <= 1; $spe++){
        echo " ";
            for($star = 5; $star >= $spe; $star--){
            echo "*";
            }
    }
    echo "\n";
}

$spe = 5;
for($num = 1; $num >= $spe; $num++) {
    for($star = 1; $star <= 5 ; $num++) {
        echo "*";
    }
    echo " ";
}

// for($i = 1; $i <= 10; $i--) {
//     echo"{$i} \n";
// }


//while문이 증감식(이건 샘풀이보고 다시 생각해야댐)

// $star = "*";
// $num = 1;
// while($num < 10){
//     $star += $num;
//     $num;
//     echo"*";  
//}



?>