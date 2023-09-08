<?php
// $str1 = "안녕";
// $str2 = "하세요.";
// $str3 = $str1.$str2;
// echo $str3;

// $str4 = "문자";
// $num1 = 1;
// $str5 = $str4.$num1;
// echo $str5;
// 문자와 숫자 함께 사용하면 숫자 타입을 무조건 문자로 바꿈.

// 상수 : 절대 변하지 않는 값/ 이름 무조건 대문자해야함
$num = 1;
$num = 2;
// 원래 이렇게 하면 덮어쓰기가 되었음. 하지만 상수는 이렇게 되면 안댐
define("NUM", 100);
$NUM =1 ;
echo NUM;

define("STR", "스트링"." ".NUM); //여기서 .은 연결연산자
echo NUM, STR;

?>