<?php

phpinfo();

class Test{
    //멤버필드 영역
    private $tt;//이게 멤버변수
}

$obj = new Test();
echo $obj->tt."/n";
$obj->tt="a";

$i = 1;

if($i === 1){
    echo "참";
}else {
    echo "거짓";
}

//삼항연산자 사용
//      조건    ? 참일경우:거짓일경우
$boo = $i === 1 ? "true" : "false";
echo $boo;

?>