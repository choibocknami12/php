<?php
// 두 숫자를 받아서 더해주는 함수를 만들어보자
// 리턴이 없는 함수
// function my_sum($a, $b) {
//     echo $a + $b;
// }
// my_sum(5, 4);

// 리턴이 있는 함수
// function my_sum2($a, $b) {
//     return $a + $b ;
// }
// echo my_sum2(1, 2);

// 내가만들기
// function my_sub($c, $d) {
//     return $c - $d;
// }
// $val = my_sub(3, 2);
// echo $val

// function my_mul($e, $f) {
//     return $e * $f;
// }
// $val2 = my_mul(3, 2);
// echo $val2;

// function my_div($g, $h) {
//     return $g / $h;
// }
// $val3 = my_div(3, 2);
// echo $val3;

// function my_per($i, $j) {
//     return $i % $j;
// }
// $val4 = my_per(3, 2);
// echo $val4;


// 파라미터의 기본값이 설정되어 있는 함수
// 선택사항이 되야할 값은 무조건 맨뒤에 넣어야함
// function my_sum3($a, $b = 5) {
//     return $a + $b ;
// }
// echo my_sum3(3);

// 가변 파라미터(버전마다 사용방법 다름)
//5.6이상에서 가능
function my_args_param(...$items) {
    echo $items[1];
}
my_args_param("a", "b", "c");

//5.6이하 버전에서 사용가능
// function my_args_param() {
//     $items = func_get_args();
//     print_r ($items);
// }




?>