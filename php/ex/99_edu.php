<?php
// php 데이터타입 : 중요함.
// $num = 1;
// $str = "aa";
// $arr = [1, 2, 3];
// $boo = true;
// $double = 2.32;

//

//

// 산술 대입 연산자
// $num = 1;
// $num = $num + 2;
// $num += 2;

//비교 연산자
// 1 === "1"; // 결과 false
// 1 == "1"; // 결과 true

// 논리 연산자
// && || !
// () : 최소연산 단위, 조건..
// [] : 배열만들때만 사용
// {} : 연산의 집합(내가 처리하고 싶은 연산의 단위)
//  ; : 내가 하고자하는 처리를 끝내겠다는 표시

// if문 : 90이면 수, 80이면 우 , 그 외에는 "노력"

// $num = 60;
// if ($num === 90) {
//     echo "수";
// } else if($num === 80) {
//     echo "우";
// } else {
//     echo "노력";
// }

// while문 : 구구단 7단
// while문은 위치지정 잘해야댐. echo와 $num++;위치 잘 적어야댐.
// $num = 1;

// while ($num <= 9) {
//     $mul = $num * 7;
//     echo "7 x {$num} = {$mul} \n";
//     $num++;
// }

//true로도 할 수 있다.
// while(true) {
//     $mul = $num * 7;
//     echo "7 x {$num} = {$mul} \n";
//     $num++;
//     if($num === 10) {
//         break;
//     }
// }

// 배열(array)
$arr = [1, 2, 3];
$arr2 = [
    "key1" => "val1"
    ,"key2" => "val2"
];

echo $arr2["key2"];
echo $arr[2];


?>