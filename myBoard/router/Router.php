<?php

namespace Router;

use controller\UserController;
use controller\BoardController;

class Router {
    public function __construct() {
        $url = $_GET["url"];
        $method = $_SERVER["REQUEST_METHOD"];

        if($url === "user/login") {
            if($method === "GET") {
                new UserController("loginGet");
            }
        } else if($url === "user/logout") {
            if($method === "GET") {
                new UserController("logoutGet");
            }
        }

        echo "잘못된 경로입니다.".$url;
        exit();
    }
}