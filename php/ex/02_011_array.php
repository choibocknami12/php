<?php
// 인덱스 배열. 변수값을 딱히 안주었기 때문에 인덱스(키라고 함)로 방만들어둠. 암꺼나 넣을 수 있음
// $arr = array(0, 'a', 2); //숫자나 문자가 섞여있으면 멀티타입 배열 이라고도 한다.
// $arr2 = [0,"a", 2];

// var_dump($arr[1]);
// echo $arr[2];

// $arr3 = ["배열", $arr[1], $arr2[1]];

// 연상 배열
// $arr4 = [
//     "name" => "홍길동"
//     ,"age" => 18
//     ,"gender" => "남자"  
// ];

// echo $arr4["name"];

// 다차원 배열
// $arr5 = [
//     ["00", "01", "02"]
//     ,[10, 11, 12]
//     ,[20, 21, 22]
// ];

// $arr6 = [
//     ["00", "01", "02"]
//      ,[
//      [100, 101, 102]
//      ,[110, 111, 112]
//      ]
//      ,[20, 21, 22]
// ];
// var_dump($arr5[1][1]);

// $arr6 = [
//     "msg" => "ok"
//     ,"info" => [
//         "name" => "홍길동"
//         ,"age" => 20
//     ]
// ];

// var_dump($arr6["info"]["age"]);

// unset() : 배열의 원소 삭제
// $arr_week = ["Sun", "Mon", "delete", "Tue", "Wed"];
// unset($arr_week[2]);
// print_r($arr_week);

// 배열의 정렬 : asort(), arsort(), ksort(), krsort()
// asort(): 배열의 값을 오름차순 정렬
$arr_asort = ["b", "a", "d", "c"];
// asort($arr_asort);
// print_r( $arr_asort );

// arsort() : 배열의 값 내림차순 정렬
arsort($arr_asort);
print_r( $arr_asort );

// ksort(), krsort(): 키를 기준으로 오름/내림 차순으로 정렬
// $arr_ksort =[
//     "b" => "1"
//     ,"c" => "2"
//     ,"a" => "3"
//     ,"d" => "4"
// ];

// ksort($arr_ksort);
// print_r($arr_ksort);

// count() : 배열 혹은 그 외 것들의 사이즐 ㄹ반환하는 함수
// echo count($arr_ksort);

// array_diff(a, b) : a배열과 b배열을 비교해서 중복되지 않는 a배열의 원소 반환

// $arr_diff1 = [1, 2, 3];
// $arr_diff2 = [1, 4, 5];
// $arr_diff = array_diff($arr_diff1, $arr_diff2);
// print_r($arr_diff);

// array_push() : 기존 배열에 값을 추가하는 함수
// $arr_push = [ 1, 2, 3];
// array_push( $arr_push, 4, 5);
// $arr_push[] = 4; 

//한가지 값만 넣을땐 이렇게도 가능함
$arr_push2 = [
    "a" => 1
    ,"b" => 2
];
$arr_push2["c"] = 3;
// 이렇게하면 연상 배열에 삽입할 수 있음.

print_r($arr_push2);

?>