<?php

namespace controller;

class UserController extends ParentsController {
    // 로그인
    protected function loginGet() {
        return "view/login.php"; //여기서 리턴한 값은 부모컨트롤러가 받음.
    }

    // 회원가입 페이지 이동
    protected function registGet() {
        return "view/regist"._EXTENSTION_PHP; // index파일에 모든 설정값들을 다 불러왔으므로 사용가능함.
    }
}