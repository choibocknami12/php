<?php

//
namespace test;

class Picachu {
	// 접근 제어 지시자
	public $howling;
	private	$name;
	protected $type; // 상속관계시 메소드 안만들어도 접근가능

	// construct는 public으로만 생성해야함.
	public function __construct() {
		$this->howling = "피카피카"; // 외부접근 가능
		$this->name = "피카츄"; // 외부접근 불가능
		$this->type = "전기"; // 외부접근 불가능
	}

	public function  attack() {
		echo $this->name."몸통박치기";
	}

	public function info() {
		echo $this->name."는".$this->type."타입 포켓몬입니다.";
	}

	// public static function electronic() {
	// 	echo "피카츄 백만볼트";
	// }
	public function electronic() {
		echo "피카츄 백만볼트";
	}

	public function getterName() {
		return $this->name;
	}
}

