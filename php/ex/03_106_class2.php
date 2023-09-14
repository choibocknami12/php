<?php
// namespace : 클래스를 구분해 주기 위한 설정. 보통은 해당파일의 패스로 작성됨(폴더경로)

namespace up;

class Class1{
    public function __construct() {
        echo "위의 클래스1";
    }
}

namespace down;

class Class1{
    public function __construct() {
        echo "밑의 클래스1";
    }
}

// namespace 이용해서 객체 지정
$obj_class1 = new \up\Class1();

namespace test;
use \up\Class1 as cla;

$obj_class1 = new cla();


?>