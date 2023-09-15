<?php
// $in_str= fgets(STDIN);

// echo "입력값 : {$sin_str}"; 


// $user = rand(1, 3);
// $num = rand(1, 3);
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

// switch($num) {
//     case 1:
//         echo "C";
//     break;
//     case 2:
//         echo "R";
//     break;
//     case 3:
//         echo "P";
//     break;
// }    

// $num = rand(1,3);
// $user = 2;
// if($num===1){
//         echo "R";
//         if($user===1){
//             echo "lose";
//         }
//         else if($user===2){
//             echo "draw";
//         }
//         else if($user===3){
//             echo "win";
//         }
//     }
//     if($num===2){
//         echo "S";
//         if($user===1){
//             echo "win";
//         }
//         else if($user===2){
//             echo "draw";
//         }
//         else if($user===3){
//             echo "lose";
//         }
//     }
//     if($num===3){
//         echo "P";
//         if($user===1){
//             echo "lose";
//         }
//         else if($user===2){
//             echo "win";
//         }
//         else if($user===3){
//             echo "defeat";
//         }
//     }


//for (?){}
echo "가위(2),바위(1),보(3)를 입력하세요.\n";
echo "종료시는 (5)를 눌러주세요'ㅅ'";

while(true){
    echo "\n";
    $user = (int)trim(fgets(STDIN));
    $com = rand(1,3);
    if($user===$com){
        echo "\nDraw\n";
    }
    else if(($user===1 && $com===2)
        ||($user===2 && $com===3)
        ||($user===3 && $com===1)){
            echo "\nU : win\n";
            echo "COMPUTER : lose\n";
        }
    else if(($user===1 && $com===3)
        ||($user===2 && $com===1)
        ||($user===3 && $com===2)){
            echo "\nU : lose\n";
            echo "COMPUTER : win\n";
        }
        // if($user_txt="exit"){
        //     break; 
        //     echo "exit";
        // }
    else if($user === 5){
        break;
    } 
}




?>