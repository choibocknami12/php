<?php
//주어진 배열을 순회하고 각 요소를 출력하는 PHP 스크립트를 작성하세요.
// $fruits = array("apple", "banana", "cherry", "date");

// foreach($fruits as $arr){
//     echo $arr. "\n";
// }

//주어진 연관 배열을 순회하고 키와 값을 함께 출력하세요.
// $person = array(
//     "name" => "John",
//     "age" => 30,
//     "city" => "New York"
// );

// foreach($person as $key => $arr){
//     echo "{$key} : {$arr} \n";
// }


//주어진 숫자 배열에서 짝수만 출력하는 PHP 스크립트를 작성하세요
$numbers = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10);
//짝수...
// $cou = count($numbers);
// foreach($numbers as $cou){
//     $cou *= 2;
//     echo $cou. "\n";
// }
//정답
foreach ($numbers as $number){
    if ($number % 2 === 0){
        echo $number."\n";
    }
}

//주어진 다차원 배열의 모든 요소를 출력하세요.
$matrix = array(
    array(1, 2, 3),
    array(4, 5, 6),
    array(7, 8, 9)
);

//주어진 숫자 배열의 모든 요소의 합계를 계산하세요.
$numbers = array(10, 20, 30, 40, 50);



?>