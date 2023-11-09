<?php

namespace controller;

use model\BoardNameModel;

class ParentsController {
    // protected 사용 이유는 자식클래스에서 사용하기 위해
    protected $controllerChkUrl; // 헤더 표시 제어용 문자열
    protected $arrErrorMsg = []; // 화면에 표시할 에러메세지 리스트
    protected $arrBoardNameInfo; // 헤더 게시판 드롭다운 표시용

    // 비로그인 시 접속 불가능한 URL 리스트
    private $arrNeedAuth = [
        "board/list"
        ,"board/add"
        ,"board/detail"
        ,"board/delete"
    ];

    public function __construct($action) {
        // 뷰관련 체크 접속 url 셋팅
        $this -> controllerChkUrl = $_GET["url"];

        // 세션 시작
        if(!isset($_SESSION)) {
            session_start();
        }

        // 유저 로그인 및 권한 체크
        $this->chkAuthorization();

        // 헤더 게시판 드롭박스 데이터 획득
        $boardNameModel = new BoardNameModel();
        $this->arrBoardNameInfo = $boardNameModel->getBoardNameList();
        $boardNameModel->destroy();

        // controller 메소드 호출
        $resultAction = $this->$action();
//                      $this->loginGet(실행);
        // view 호출
        $this->callView($resultAction);
        exit();
    }

    // 유저 권한 체크용 메소드
    private function chkAuthorization() {
        $url = $_GET["url"];
        
        // 접속권한이 없는 페이지 접속차단
        if( !isset($_SESSION["u_pk"]) && in_array($url, $this->arrNeedAuth) ) {
            header("Location: /user/login"); // 유저에게 보여지는 url을 바꾸어주어야하므로?
            exit();
        } 

        // 로그인한 상태에서 로그인 페이지 접속시 board/list 로 이동처리
        if( isset($_SESSION["u_pk"]) && $url === "user/login" ) {
            header("Location: /board/list");
            exit();
        }
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