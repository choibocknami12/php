<?php

// class는 동종의 객체들이 모여있는 집합을 정의한 것.

class ClassRoom {
    // (멤버)필드 라고 함.

    // 접근제어 지시자 : public, private, protected
    // 밑에 변수들은 멤버 변수
    public $computer; // 어디서나 접근 가능
    private $book; // class 내에서만 접근 가능
    protected $bag; // class와 나를 상속 받은 자식 class에서만 접근 가능

    // 함수가 아니라 메소드(method)라고 함 : class내에 있는 함수
    // 어디 접근하고싶으면 
    public function class_room_set_value() {
        $this->computer = "컴퓨터";
        $this->book = "책";
        $this->bag = "가방";
    }

    // public function class_value() {
    //     $this->computer ;
    //     $this->book ;
    //     $this->bag ;
    //     echo $this->computer."\n"
    //         ,$this->book."\n"
    //         ,$this->bag;
    // }
    public function class_value() {
        $str = $this->computer."\n"
               .$this->book."\n"
               .$this->bag ;
        echo $str;
    }

}

// class instence 생성
// 변수선언 = new 클래스명(); : 클래스 호출하려면 바로 못해서 이렇게 변수값에서 클래스를 넣어줌?담아줌?
$objClassRoom = new ClassRoom();

// $objClassRoom->computer = "test";

// 지시어를 주어야 호출댐
$objClassRoom -> class_room_set_value();
// var_dump($objClassRoom->computer);
$objClassRoom->class_value();

// 컴퓨터, 북, 백의 값을 출력하는 메소드를 만들어 주세요.



?>