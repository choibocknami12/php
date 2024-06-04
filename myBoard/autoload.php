<?php

// 객체 지향에서 많이 사용. 자동으로 감지. 
// 아래의 function은 콜백함수가 아님. 클로저(php)라는 객체이다.
spl_autoload_register( function ($path) {
    $path = str_replace("\\", "/", $path);

    require_once($path._EXTENSTION_PHP);
}); 