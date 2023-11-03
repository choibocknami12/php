<?php
// 현재 페이지는 시작페이지로 url root를 설정하는데 사용된다?

require_once("config.php"); // 설정파일 불러오기
require_once("autoload.php"); // 오토로트 파일 불러오기

// autoload란?
// 인스턴스를 생성하면 자동으로 호출되는 함수
// spl_autoload_register : 자동으로 클래스를 인식하여 OOP를 지원해주는 함수
// autoload.php에 만들어 놓았기 때문에 불러와주고 전체php파일에서 사용할 수 있게 한다.?

//echo _EXTENSTION_PHP;
// 라우터 호출
new router\Router(); // 라우터의 컨스트럭트를 실행한다.
// 이 라우터가 실행되는 이유는 autoload를 생성해놓아서.
// 오토로드의 기능 자체가 자동으로 require_once를 실행해줌.
