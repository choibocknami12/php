<?php
//1.반복문을 이용해 숫자를 1~10까지 출력해주세요.
// for($i = 1; $i <= 10; $i++){
//     echo "{$i}\n";
// }

//2.구구단 8단 출력해주세요.
// for($num = 1; $num < 10; $num++){
//     $val = 8*$num;
//     echo "8 x {$num} = {$val}\n";
// }

// $num = 1;
// while($num < 10){
//     $val = 8 * $num;
//     echo "8 x {$num} = {$val}\n";
//     $num++;
// }
//while문은 변수 값을 지정해 주어야 한다.

//3.19단을 출력해주세요
// $num = 1;
// while($num < 10){
//     $val = 19 * $num;
//     echo "19 x {$num} = {$val}\n";
//     $num++;
// }

// for($num = 1; $num < 10; $num++){
//     $val = 19 * $num;
//     echo "19 x {$num} = {$val}\n";
// }

//4. 두 숫자를 더해주는 함수를 만들어 주세요.
// function my_sum($a , $b){
//     return $a + $b;
// }
//  echo my_sum(1 , 3);
//함수는 공부좀 하기... 기억 1도 안남

//5. 짜장면이면 중식, 비빔밥이면 한식, 그 외에는 양식으로 출력해 주세요.
// $menu = "짜장";

// switch ($menu){
//     case "짜장":
//         echo "중식";
//         break;
//     case "비빔밥":
//         echo "한식";
//         break;
//     default :
//         echo "양식";
//         break;
// }

//정수를 입력하는대로 다 곱하게 해주세요.

//배열값에서 그 값들이 2배로 출력되게하시오
// $arr = [2,4,6,8,10];
// $count = count($arr);

// foreach($arr as $count) {
//     $count *= 2;
//     print_r($count); 
// }

//정수를 입력하면 구구단 나오게하기

// $use = 5;
// for($num = 1; $num < 10; $num++){
//     $val = $num * $use;
//     echo "{$use} x {$num} = {$val}\n";
// }

// $num = 9;
// $i =1;
// while($i < 10) {
//     $val = $num * $i;
//     echo "{$num} x $i = {$val}\n";
//     $i++;
// }

//배열값을 반대로 출력해주세요.
$arr = [0,1,2,3,4,5];
$num = 1;

for($i = 5; $i >=0; $i--){
    
    print_r($arr);
}

// if, foreach, while, function 등 사용법 숙지

?>