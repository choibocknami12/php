<?php

// 함수 선언 : 함수를 만들어두는 것. 위치는 상관이 없음. 호출뒤에 나와도 댄다.
// function my_sum($num1, $num2) {
//     $sum = $num1 + $num2;
//     return $sum;
// }


// // 함수 호출 : 미리 만들어둔 함수를 부르는 것.
// $result = my_sum(2, 5);
// echo $result;

// if문에 t/f가 들어가는 것은 맞는건지 아닌건지 검수하기 위해 넣음.
// isset 함수는 조건에 값이 있는지 확인해주는 함수. 변수에 값이 들어가야한다면 함께 써주면 좋음. 
// if(djkls){
// true => 실행
// int 0 -> bool으로 변환= > false;
// }



// 3개의 숫자를 받아서 빼기해주세요
function my_sub($n1, $n2, $n3) {
    $sub = $n1 - $n2 - $n3;
    return $sub;
}

$result = my_sub(1, 5, 1);
//echo $result;

// function my_sub($a, $b, $c) {
//    return $a - $b - $c;
//}

// echo my_sub(5, 4, 6);

//가변파라미터 : 변수앞에 ... 붙이면 몇개의 수가 올지모른다고 정해줌
// function my_all_sum(...$numbers) {
//     print_r($numbers);
//     $sum = 0;
//     foreach($numbers as $key => $val) {
//         $sum = $sum + $val;
//     }
//     return $sum;
//     // return array_sum($numbers);
// }

// my_all_sum(3, 4, 5);

// 래퍼런스 파라미터 = pass by reference
// 이걸 사용하는 이유는 그 값을 참조하는 것이기 때문에 메모리용량차지를 적게함. 그래서 많이 사용함.
// 함수 안 소괄호에 있는게 파라미터
function my_ref( $val, &$ref) {
    $val = "my_ref";
    $ref = "my_ref";
}

$str1 = "str1";
$str2 = "str2";
my_ref($str1, $str2);
// 소괄호 안에 있는게 아규먼트
echo "str1 : {$str1}\n";
echo "str2 : {$str2}\n";

?>