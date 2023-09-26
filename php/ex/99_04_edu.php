<?php

// 자동차 클래스
class Car {
    protected $name = "";
    protected $comp = "";

    protected function move() {
        echo "전진\n";
    }
    protected function stop() {
        echo "정지\n";
    }
    public function auto() {
        echo $this->comp." ".$this->name." ";
        $this->move();
        $this->stop(); 
        // 클래스를 불러낼땐 $this를 사용해야함. 이뜻이 위의 클래스안에서 불러내겠다는 의미
        
    }
}
// 상속받을 자식 클래스
class Kia extends Car {
    public function __construct($name) {
        $this->name = $name; //부모클래스를 상속받았기 때문에 $name이 Kia에 없어도 Car클래스의 $name을 받아옴
        $this->comp = "기아";
    }
}
class Toyota extends Car {
    public function __construct($name) {
        $this->name = $name; //부모클래스를 상속받았기 때문에 $name이 Kia에 없어도 Car클래스의 $name을 받아옴
        $this->comp = "토요타";
    }
}

// private는 외부에서 사용불가
$obj = new Kia("레이");
$obj->auto();

$obj2 = new Toyota("크라운");
$obj2->auto();


?>