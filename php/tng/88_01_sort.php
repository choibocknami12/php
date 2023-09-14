<?php

// 버블 정렬
// $arr = [5, 34, 3, 2, 6, 7, 12];
    // [2, 3, 5, 6, 7, 12, 34]
    // [0 /1 /2 /3 /4 /5 /6]
    // [5, 3, 2, 6, 7, 12, 34] (1)
    // [3, 2, 5, 6, 7, 12, 34] (2)
    // [2, 3, 5, 6, 7, 12, 34] (3)   

// $arr[0] = $num1;
// for() {

// }


// 5를 2의 자리로 보내기.
// $arr[0] = 5, $arr[3] = 2
//$arr_zero = $arr[0];
//$arr[0] = $num_last;
$arr = [5, 4, 3, 2];

// for($index=0; $index<= count($arr)- 1 - 1; $index++) {
//     if($arr[$index] > $arr[$index+1]){
//         $tmp = $arr[$index];
//         $arr[$index] = $arr[$index+1];
//         $arr[$index+1] = $tmp;
//     }
// }


for($arr_zero=0; $arr_zero<=3; $arr_zero++){
     for($index = 0; $index <= count($arr)-2; $index++) {
         if($arr[$index] > $arr[$index+1]) {
             $tmp = $arr[$index];
             $arr[$index] = $arr[$index+1];
             $arr[$index+1] = $tmp;
         }
     }
}
print_r($arr);







?>