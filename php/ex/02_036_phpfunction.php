<?php
// trim() : 문자열의 공백을 없애주는 함수
echo " addd ", "\n", trim(" addd ");

// strtoupper, strtolower : 문자열을 대소문자로 변환하는 함수
echo strtoupper("adad"), strtoupper("ASDFG");

// strlen() : 문자열의 길이를 반환
echo strlen("asdfgedf");
echo mb_strlen("가나다");

// str_replace() : 특정 문자를 치환해주는 함수(공백도 넣을 수 있음)
echo str_replace("a", "/", "fsldkajwp");

// substr() : 문자열을 자르는 함수. 몇번째~몇번째 인덱스까지 남기고 자르겠다라는 의미
echo substr("abcdefg", 0, 3); // mb_substr 쓰는게 좋음. 멀티바이트를 써야 한글도 인식함

// strpos() : 문자열에서 특정 문자의 위치를 반환하는 함수
echo strpos("abcdef", "d");

// isset() : 변수존재 확인
$str = "";
var_dump( isset($str) );

// empty() : 변수의 값이 비어있는지 확인하는 함수
var_dump( empty($str) );

// settype() : 변수의 데이터형을 변경해줌

// time() : 1970/01/01을 기준으로 타임스탬프(초단위) 시간 확인하는 함수
echo time();

// date() : 원하는 형식으로 시간표시
echo date("Y-m-d H:i:s", time());


?>