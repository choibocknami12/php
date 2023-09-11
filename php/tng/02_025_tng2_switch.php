<?php
// switch문을 이용하여 작성
// 1등 = 금상, 2등 = 은상, 3등 = 동상, 4등 = 장려상, 그 외 = 노력상 을 출력해주세요.

// 내가 한거
// $grade = "5등";

// switch($grade) {
//     case "1등":
//         echo "금상";
//         break;
//     case "2등":
//         echo "은상";
//         break;
//     case "3등":
//         echo "동상";
//         break;
//     case "4등":
//         echo "장려상";
//         break;
//     default:
//         echo "노력상";
//         break;
// }

// 샘 풀이 
// $rank = 1;
// $award = "";
// switch($rank){
//     case 1:
//         $award = "금상";
//         break;
//     case 1:
//         $award = "은상";
//         break;
//     case 1:
//         $award = "동상";
//         break;
//     default :
//         $award = "노력상";
//         break;
// }

// if문
$rank = 2;
$award = "";

if($rank === 1){
    $award = "금상";
}
else if($rank === 2){
    $award = "은상";
}
else if($rank === 3){
    $award = "동상";
}
else if($rank === 4){
    $award = "장려상";
}
else {
    $award = "노력상";
}

echo $award;



?>