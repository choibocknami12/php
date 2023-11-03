<?php

namespace controller;

use model\UserModel;

class UserController extends ParentsController {
    // 로그인 페이지 이동
    protected function loginGet() {
        return "view/login.php"; //여기서 리턴한 값은 부모컨트롤러가 받음.
    }

    // 로그인 처리
    protected function loginPost() {
        // ID, PW 설정 : DB에서 사용할 데이터 가공
        $arrInput = [];
        $arrInput["u_id"] = $_POST["u_id"]; 
        $arrInput["u_pw"] = $this->encryptionPassword($_POST["u_pw"]); 

        $modelUser = new UserModel();
        $reultUserInfo = $modelUser->getUserInfo($arrInput, true);
        
        // 유저 유무 체크
        if(count($reultUserInfo) === 0) {
            $this->arrErrorMsg[] = "아이디와 비밀번호를 다시 확인해주세요.";
            // 로그인 페이지로 리턴
            return "view/login.php";
        }

        // 세션에 u_id 저장
        $_SESSION["u_id"] = $reultUserInfo[0]["u_id"];

        return "Location: /board/list";
    }

    // 로그아웃 처리
    protected function logoutGet() {
        session_unset();
        session_destroy(); // 버전마다 달라서 둘다 사용하는 것이 좋음.

        // 로그인 페이지 리턴
        return "Location: /user/login";
    }

    // 회원가입 페이지 이동
    protected function registGet() {
        return "view/regist"._EXTENSTION_PHP; // index파일에 모든 설정값들을 다 불러왔으므로 사용가능함.
    }

    // 비밀번호 암호화
    private function encryptionPassword($pw) {
        return base64_encode($pw);
    }
}