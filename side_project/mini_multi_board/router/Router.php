<?php
namespace router;

// 사용할 컨트롤러들 지정
use controller\UserController;
use controller\BoardController;

// 라우터 : 유저의 요청을 분석(url의 path경로를 분석)해서 해당 controller로 연결해주는 클래스
class Router {
    public function __construct() {
        // url 규칙
        // 1. 회원 정보 관련 url
        //      user/[해당기능]
        //      ex) 로그인 : 호스트/user/login
        //      ex) 회원가입 : 호스트/user/regist
        // 2. 게시판 관련 url
        //      board/[해당기능]
        //      ex) 리스트 : 호스트/board/list
        //      ex) 수정 : 호스트/board/edit
        //      ex) 작성 : 호스트/board/edit

        //print_r($_GET);
        $url = $_GET["url"]; // 접속 URL 획득
        //print_r($url);
        $method = $_SERVER["REQUEST_METHOD"]; // 메소드 획득

        if($url === "user/login") {
            if($method === "GET") {
                // 해당 컨트롤러 호출
                new UserController("loginGet"); // 해당클래스의 컨스트럭트(constuct)를 실행한다.소괄호가 그런의미.
            } else {
                // 해당 컨트롤러 호출
                new UserController("loginPost"); //
            }
        } else if($url === "user/logout") {
            if($method === "GET") {
                // 해당 컨트롤러 호출
                new UserController("logoutGet");
            }
        } else if($url === "user/regist") {
            if($method === "GET") {
                new UserController("registGet");
            } else {
                // 해당 컨트롤러 호출
                new UserController("registPost");
            }
        } else if($url === "board/list") {
            if($method === "GET") {
                new BoardController("listGet");
            }
        } else if($url === "board/add") {
            if($method === "GET") {
                // 처리없음
            } else {
                new BoardController("addPost");
            }
        } else if($url === "board/detail") {
            if($method === "GET") {
                new BoardController("detailGet");
            }
        } else if($url === "user/idchk") {
            if($method === "GET") {
                new UserController("userIdChk");
            }
        }
        
        // $url = $_POST["url"];
        // // $method = $_SERVER["REQUEST_METHOD"];
        
        // if($url === "board/edit") {
        //     if($method === "POST") {
        //         new BoardController("editPost");
        //     }
        // }
        
        // 없는 경로일 경우
        echo "이상한 url : ".$url;
        exit();
    }
}