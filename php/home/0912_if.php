<?php
// $num1 = 5;
// $num2 = 5;

// if($num1 !== $num2) {
//     echo "num1 과 num2는 같지 않다";
// }

// 1이면 1등, 2면 2등, 3이면 3등, 나머지는 순위 외를 출력
// $num = 5;
// if($num === 1) {
//     echo "금상";
// }

// if($num === 2) {
//     echo "은상";
// }

// if($num === 3) {
//     echo "동상";
// }

// if($num > 3 ) {
//     echo "순위 외";
// }

//질문: 왜 if 로만 나열하고 else를 사용하면 else값도 같이 나오는건지?

//성적 
//	범위 : 
//		이상 ~ 미만
//		100   : A+
//		90이상 100미만 : A
//		80이상 90미만 : B
//		70이상 80미만 : C
//		60이상 70미만 : D
//		60미만: F

//출력 문구 : "당신의 점수는 XXX점 입니다. <등급>"

// 0~100 입력 받았을 때, "당신의 점수는 XXX점 입니다. <등급>" 라고 출력 하고,
// 그 외의 값일 경우 "잘못된 값을 입력 했습니다." 라고 출력해 주세요.

$num = 1000;
$grade = "";
if($num === 100) {
    $grade = "A+";
}

else if($num >= 90 && $num <100) {
    $grade = "A";
}

else if($num >= 80 && $num <90) {
    $grade = "B";
}

else if($num >= 70 && $num <80) {
    $grade = "C";
}

else if($num >= 60 && $num <70) {
    $grade = "D";
}

else if ($num < 60 && $num >= 0){
    $grade = "F";
}
echo "당신의 점수는 {$num}점 입니다. <{$grade}>";


?>