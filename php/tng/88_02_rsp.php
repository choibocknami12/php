<?php
// $in_str= fgets(STDIN);

// echo "입력값 : {$sin_str}"; 


$user = rand(1, 3);
$num = rand(1, 3);
//echo $num;

    // if ($num === 1) {
    //     echo "가위";
    // }
    // else if ($num === 2) {
    //     echo "바위";
    // }
    // else if ($num === 3) {
    //     echo "보";
    // }

switch($num) {
    case 1:
        echo "C";
    break;
    case 2:
        echo "R";
    break;
    case 3:
        echo "P";
    break;
}    




?>