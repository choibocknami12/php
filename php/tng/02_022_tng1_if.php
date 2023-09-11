<?php
// if로 만들기.
//성적 범위 :
//          이상 ~ 미만
//          100 :a+
//          90~100 : a


// $grade = 101;
// $grade_str = "";


// if( $grade === 100){
//     // echo "당신의 점수는 100점 입니다. <A+>";
//     $grade_str = "A+";
// }
// else if($grade >= 90 && $grade <100){
//     //echo "당신의 점수는". $grade."입니다. <A>";
//     $grade_str = "A";
// }
// else {
//     echo "점수는 {$grade} 입니다. <{$grade_str}>";
// }

//굳이 grade두개 쓸 필요엄슴. 소수점적었을 때 정상작동안함. 조건 전부 변수선언....
// else if(($grade >= 80)||($grade === 89)){
//     echo "당신의 점수는" . $grade. "입니다. <B>";
// }
// else if(($grade >= 70)||($grade === 79)){
//     echo "당신의 점수는". $grade. "입니다. <C>";
// }
// else if(($grade >= 60)||($grade === 69)){
//     echo "당신의 점수는" . $grade. "입니다. <D>";
// }

$grade = 100;
$grade_str = "";

if($grade <= 100 && $grade > 0){
    if( $grade === 100){
        $grade_str = "A";
    }
    else if($grade >= 90 && $grade < 100)

    echo "점수는 {$grade} 입니다. <{$grade_str}>";
}
else{
    echo "잘못된 값을 입력했습니다.";
}
// and or 차이점






// 위에 내가 써서 잘못된것.
// 풀이
// $num = 1000;
// $grade = " ";
// $answer = "당신의 점수는 %u점 입니다. <%s>"


//0~100 입력 받았을때 '당신의 점수는 XXX점 입니다.(등급)' 이라고 출력하고
//그 외의 값을 경우 '잘못된 값을 입력했습니다.' 라고 출력해 주세요.

?>