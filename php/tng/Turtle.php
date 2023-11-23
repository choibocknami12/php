<?php

namespace test;

//test에 이미 불러놨기때문에 use와 require_once도 굳이 할 필요가없음
//require_once('./PoketMon.php'); // namespace안에 넣어주어야함

class Turtle extends PoketMon {
	
	public function waterCannon() {
		echo $this->name."물대포";
	}

	// 오버라이딩 : 부모한테 정의되어 있는 메소드를 자식이 다시 재정의하는 것.
	public function info() {
		echo $this->getterName()."는 꼬북꼬북꼬북.\n";
	}

}

