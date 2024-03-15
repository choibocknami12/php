<?php
// $arr = [
//     [
//         "id" => "id list"
//         ,"pw" => "pw list"
//     ],
//     [
//         "id" => "meerkat1"
//         ,"pw" => "php504"
//     ]
//     ,[
//         "id" => "meerkat2"
//         ,"pw" => "php504"
//     ]
//     ,[
//         "id" => "meerkat3"
//         ,"pw" => "php504"
//     ]
// ];

// foreach($arr as $item) {
//     echo $item["id"]."\n";
// }

// echo "id list";

$arr = [2, 3, 5, 50, 15, 60];

// echo $arr[0];
// $min = $max = $arr[0];

// $min = 0;
// $max = 0;
$max = $arr[0];
$min = $arr[0];

foreach($arr as $num) {
    if($max < $num) {
        $max = $num;
    }
    if($min > $num) {
        $min = $num;
    }
}
echo $max.$min;

// if($min ) {
    // for($i = 0; $i < count($arr); $i++) {
    //     if($max < $arr[$i]) {
    //         $max = $arr[$i];
    //     }
    //     if($min > $arr[$i]) {
    //         $min = $arr[$i];
    //     }
    // }
// }    

// echo "최소값: " . $min;
// echo "\n";
// echo "최대값: " . $max;

?>