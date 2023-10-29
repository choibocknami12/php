<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/homework/src");
define("ERROR_MSG_PARAM", "%s : 필수 입력 사항입니다.");
require_once(ROOT."/lib/db_lib.php");

$conn = null;
$arr_post = $_POST;
$http_method = $_SERVER["REQUEST_METHOD"];
$arr_err_msg = [];//에러메세지 저장용
$title = "";
$memo = "";

//왜 if문부터 시작하지??? 
if($http_method === "POST") {
    try {

        $title = isset($_POST["title"]) ? trim($_POST["title"]) : "";
        $memo = isset($_POST["memo"]) ? trim($_POST["memo"]) : "";

        if($title === "") {
            $arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "제목");
        }
        if($memo === "") {
            $arr_err_msg[] = sprintf(ERROR_MSG_PARAM, "내용");
        }

        if(count($arr_err_msg) === 0) {
            if(!my_conn($conn)) {
                throw new Exception("DB Error : PDO Instance");
            }
       
        $conn -> beginTransaction();

        if(!db_insert_boards($conn, $arr_post)) {
            throw new Exception("DB Error : Insert Boards");
        }
        $conn -> commit();

        header("Location: list.php");
        exit;
        }
    } catch(Exception $e) {
        $conn->rollBack();
        echo $e->getMessage();
        //header("Location: error.php/?err_msg={$e->getMessage()}");
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
    <link rel="stylesheet" href="/homework/src/css/common.css">
    <title>insert_page</title>
</head>
<body>
    <div>
        <?php
            foreach($arr_err_msg as $val) {
        ?>
                <p><?php echo $val?></p>        
        <?php            
            }
        ?>
    <form action="/homework/src/insert.php" method="post">
        <label for="title">제목</label>
        <input type="text" name="title" id="title" value="<?php echo $title ?>">
    <br>
    <br>
        <label for="memo">내용</label>
        <textarea name="memo" id="memo" cols="30" rows="10"><?php echo $memo ?></textarea>
    <br>
    <br>
        <div>
            <button type="submit">작성</button>
            <a href="/homework/src/list.php">취소</a>
        </div>
    </form>

    </div>
</body>
</html>