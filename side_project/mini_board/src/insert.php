<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/");
define("FILE_HEADER", ROOT."header.php");
require_once(ROOT."lib/lib_db.php");

// post로 request가 왔을 때 처리
$http_method = $_SERVER["REQUEST_METHOD"];
if($http_method === "POST") {
    try {
        $arr_post = $_POST;
        $conn = null;

        //DB 접속
        if(!my_db_conn($conn)) {
            throw new Exception("DB Error : PDO Instance");
        }
        $conn->beginTransaction(); //트랜젝션 시작
        // insert
        if(!db_insert_boards($conn, $arr_post)) {
            throw new Exception("DB Error : Insert Boards");
        }

        $conn->commit(); // 모든 처리 완료시 커밋

        header("Location: list.php"); // 리스트 페이지로 이동 명령어 header("Location: path(경로)");
        exit;

    } catch(Exception $e) {
        $conn->rollBack();
        echo $e->getMessage();
        exit;
    } finally {
        db_destroy_conn($conn);
    }
    
}

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/mini_board/src/css/common.css">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+KR:wght@300" rel="stylesheet">
    <title>작성페이지</title>
</head>
<body>
    <?php
        require_once(FILE_HEADER);
    ?>
    <div class="insert_cont">
        
        <form class = "insert_form" action="/mini_board/src/insert.php" method="post">
            <label for="title">제목</label>
            <input type="text" name="title" id="title">
        <br>
        <br>
            <label for="content">내용</label>
            <textarea name="content" id="content" cols="30" rows="10"></textarea>
        <br>
        <br>
        <div class="btn_group">
            <button class="write-btn" type="submit">작성 |</button>
            <a href="/mini_board/src/list.php">| 취소</a>
        </div>
        </form>
    </div>
</body>
</html>