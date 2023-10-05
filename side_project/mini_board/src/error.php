<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/");
define("FILE_HEADER", ROOT."header.php");
require_once(ROOT."lib/lib_db.php");

$err_msg = isset($_GET["err_msg"]) ? $_GET["err_msg"] : "";

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/mini_board/src/css/common.css">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+KR:wght@300" rel="stylesheet">
    <title>에러 페이지</title>
</head>
<body>
    <?php
        require_once(FILE_HEADER);
    ?>
    <main class="container">
        <p>ㅈㅅ</p>
        <p>에러임</p>
        <p><?php echo " ▼{$err_msg}▼ "?></p>
        <br>
        <a class="button_a" href="/mini_board/src/list.php">메인 페이지</a>
    </main>
</body>
</html>