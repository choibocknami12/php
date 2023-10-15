<?php

//phpinfo();

// class Test{
//     //멤버필드 영역
//     private $tt;//이게 멤버변수
// }

// $obj = new Test();
// echo $obj->tt."/n";
// $obj->tt="a";

//$i = 1;

// if($i === 1){
//     echo "참";
// }else {
//     echo "거짓";
// }

// if($i === 1) {
//     $arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "값이 없습니다.");
// }

// $name = "현희";
// $num = 7;
// $txt = sprintf("%s님, 횟수를 %s회 소진하였습니다.",$name,$num);
// echo $txt;


// $original_string = 'Apples are red. Bananas are yellow. Apples and bananas are delicious.';
// $search = ['/Apples/', '/Bananas/'];  // 정규 표현식을 배열로 지정
// $replace = ['Oranges', 'Grapes'];     // 대체할 문자열을 배열로 지정

// $new_string = preg_replace($search, $replace, $original_string);

// echo $new_string;

// $original_string = '1997-12-29';
// $search = ['/-/', '/-/'];  // 정규 표현식을 배열로 지정
// $replace = ['년', '월'];     // 대체할 문자열을 배열로 지정

// $new_string = preg_replace($search, $replace, $original_string,1);

// echo $new_string."일";

$arr = explode('-', '1997-12-29');
echo $arr[0]."년 ".$arr[1]."월 ".$arr[2]."일";

//삼항연산자 사용
//      조건    ? 참일경우:거짓일경우
// $boo = $i === 1 ? "true" : "false";
// echo $boo;

?>