<?php

namespace router;

use controller\UserController;
use controller\BoardController;

class Router {
    public function __construct() {

        $url = isset($_GET["url"]) ? $_GET["url"] : '';

        $method = $_SERVER["REQUEST_METHOD"];
        // print_r($method);

        if($url === "user/login") {
            if($method === "GET") {
                new UserController("loginGet");
            }
        } else if($url === "user/logout") {
            if($method === "GET") {
                new UserController("logoutGet");
            }
        } else if($url === "board/list") {
            if($method === "GET") {
                new BoardController("listGet");
            }
        }

        echo "잘못된 경로입니다.".$url;
        exit();
    }
}