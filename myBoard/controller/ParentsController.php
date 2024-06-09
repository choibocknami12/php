<?php

namespace controller;

use model\BoardNameModel;


class ParentsController {

    protected $controllerChkUrl; // 헤더 표시 제어용 문자열

	protected $arrErrorMsg = []; // 화면에 표시할 에러메세지 리스트

	private $arrNeedAuth = [ // 비로그인 시 접속 불가능한 url 리스트
		"board/list"
	];

    public function __construct($action) {
        // 뷰관련 체크 접속 url 셋팅
        $this->controllerChkUrl = $_GET["url"];

        // controller 메소드 호출
		$resultAction = $this->$action();

        // view 호출
        $this->callView($resultAction);
        exit();
    }

    // 뷰 호출용 메소드
    private function callView($path) {
        // view/list.php
        // Location: /board/list : 두가지의 가장 큰 차이점은 url에서 안바뀌고 바뀌는 차이.
        if( strpos($path, "Location:") === 0 ) {
            header($path);
            
        } else {
            require_once($path);
        }
    }
}