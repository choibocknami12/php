<?php
// 단순 설정파일. 자주사용하는 이름을?상수 선언으로 미리 설정해둔것임
// 경로
define("_ROOT", $_SERVER["DOCUMENT_ROOT"]."/");
define("_PATH_USERIMG", "view/userImg/"); // 이미지 경로 상수로 설정해준것. 여러군데 사용할 수 있으니까


// DB관련
define("_DB_HOST", "localhost");
define("_DB_USER", "root");
define("_DB_PW", "php504");
define("_DB_NAME", "home_multi_board");
define("_DB_CHARSET", "utf8mb4");


// 기타
define("_EXTENSTION_PHP", ".php");