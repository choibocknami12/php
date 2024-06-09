<?php

namespace controller;

use model\UserModel;

class UserController extends ParentsController{
    // 로그인 페이지 이동
	protected function loginGet() {
		return "view/login.php";
	}
}