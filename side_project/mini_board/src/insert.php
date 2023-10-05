<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/");
define("FILE_HEADER", ROOT."header.php");
define("ERROR_MSG_PARAM", "%s : 필수 입력 사항입니다."); //파라미터 에러 메세지
require_once(ROOT."lib/lib_db.php");

$conn = null;
$arr_post = $_POST;
$http_method = $_SERVER["REQUEST_METHOD"];
$arr_err_msg = [];//에러메세지 저장용
$title = "";
$content = "";

// post로 request가 왔을 때 처리
if($http_method === "POST") {
    // try {
    //     $arr_post = $_POST;
    //     $conn = null;

    //     //DB 접속
    //     if(!my_db_conn($conn)) {
    //         throw new Exception("DB Error : PDO Instance");
    //     }
    //     $conn->beginTransaction(); //트랜젝션 시작
    //     // insert
    //     if(!db_insert_boards($conn, $arr_post)) {
    //         throw new Exception("DB Error : Insert Boards");
    //     }

    //     $conn->commit(); // 모든 처리 완료시 커밋

    //     header("Location: list.php"); // 리스트 페이지로 이동 명령어 header("Location: path(경로)");
    //     exit;

    // } catch(Exception $e) {
    //     $conn->rollBack();
    //     //echo $e->getMessage();
    //     header("Location: error.php/?err_msg={$e->getMessage()}");
    //     exit;
    // } finally {
    //     db_destroy_conn($conn);
    // }
    try {
        //파라미터 획득
        $title = isset($_POST["title"]) ? trim($_POST["title"]) : "";//title셋팅
        $content =isset($_POST["content"]) ? trim($_POST["content"]) : "";//content셋팅

        if($title === "") {
            $arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "제목");
        }
        if($content === "") {
            $arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "내용");
        }

        if(count($arr_err_msg) === 0) {

        // if(count($arr_err_msg) >= 1){
        //     throw new Exception(implode("<br>", $arr_err_msg));
        // } //얘도 쓰면안된데..왜..?
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
        }
    } catch(Exception $e) {
        $conn->rollBack();
        //echo $e->getMessage();
        header("Location: error.php/?err_msg={$e->getMessage()}");
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
        <?php
            foreach($arr_err_msg as $val) {
        ?>
                <p><?php echo $val?></p>        
        <?php            
            }
        ?>
        <form class = "insert_form" action="/mini_board/src/insert.php" method="post">
            <label for="title">제목</label>
            <input type="text" name="title" id="title" value="<?php echo $title ?>">
        <br>
        <br>
            <label for="content">내용</label>
            <textarea name="content" id="content" cols="30" rows="10"><?php echo $content ?></textarea>
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