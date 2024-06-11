<?php

namespace controller;

use model\UserModel;

class UserController extends ParentsController {
    // 로그인 페이지 이동
	protected function loginGet() {
		return "view/login.php";
	}

	// 로그인 처리
	protected function loginPost() {
		// ID, PW 설정(DB에서 사용할 데이터 가공)
		$arrInput = [];
		$arrInput["user_id"] = $_POST["user_id"];
		// $arrInput["user_pw"] = $this->encrtptionPassword($_POST["user_pw"]);
		$arrInput["user_pw"] = $_POST["user_pw"];

		$modelUser = new UserModel();
		$resultUserInfo =  $modelUser->getUserInfo($arrInput, true);

		// 유저 유무 체크
		if(count($resultUserInfo) === 0) {
			$this->arrErrorMsg[] = "아이디와 비밀번호를 다시 확인해 주세요.";
			return "view/login.php"; // 로그인 페이지로 리턴
		} 

		// 세션에 u_id 정의
		$_SESSION["user_id"] = $resultUserInfo[0]["user_id"];
		return "Location: /board/list";

		echo $resultUserInfo;
	}

	// 로그아웃 처리
	protected function logoutGet() {
		session_unset(); // 세션 요소 삭제
		session_destroy(); // 세션 고유 id 삭제

		// 로그인 페이지 리턴
		return "Location: /user/login";
	}

	// 회원가입 페이지 이동
	protected function registGet() {
		return "view/regist.php";
	}

	// 비밀번호 암호화
	private function encrtptionPassword($pw) {  
		return base64_encode($pw);
	}

	// 부모클래스인 ParentsController를 상속받아 echo "ParentsController임".$action; 실행
}