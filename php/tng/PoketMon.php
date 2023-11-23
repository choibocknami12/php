<?php

namespace test;

use test\PoketMon;

class PoketMon {
	// class : 부품화: 유지보수쉬움 / 캡슐화: 정보보호와 데이터변경 막아줌
	// 접근 제어 지시자
	protected $howling;
	private	$name; // 상속관계에 있어도 나만 사용가능
	protected $type; // 외부접근 불가능

	// construct는 public으로만 생성해야함.
	public function __construct($howling, $name, $type) {
		$this->howling = $howling; 
		$this->name = $name; // 외부접근 불가능
		$this->type = $type; 
	}

	public function  attack() {
		echo $this->name."싫음";
	}

	public function info() {
		echo $this->name."는 ".$this->type."타입 포켓몬입니다.\n";
	}

	// private를 외부에서 사용하고 싶을땐 getter메소드를 사용해야함.
	public function getterName() {
		return $this->name;
	}

	// private 데이터를 변경하고싶을땐 setter사용
	public function setterName($str) {
		return $this->name = $str;
	}
}