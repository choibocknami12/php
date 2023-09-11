<?php
// int : 숫자
$unm = 1;

// string : 문자열
$str = "ssix";

// array : 배열
$arr = [1, 2, 3];

// double : 실수
$double = 2.43;

// boolean : 논리(참/거짓)형 데이터타입
$bool = false;

// NULL
$obj = null;

// 변수가 갖고있는 이름의 뜻? 풀네임 이런거 알고싶을때 gettype()사용
echo gettype($bool);

$num1 = 1;
$str1 = "1";

// 형변환 : 변수 앞에 (데이터타입)$num
echo $num1 + (int)$str1;

// 여기서 num1을 str으러 바꾸려면 echo ((string)$num1); <<이렇게 넣어주면됨. 반대도 마찬가지임.


?>