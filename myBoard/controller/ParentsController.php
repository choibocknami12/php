<?php

namespace controller;

use model\BoardNameModel;


class ParentsController {

    protected $controllerChkUrl; 

    public function __construct($action) {
        // 뷰관련 체크 접속 url 셋팅
        $this->controllerChkUrl = $_GET["url"];

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