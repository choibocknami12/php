<?php
//localhost/homework/src/list.php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/homework/src");
require_once(ROOT."/lib/db_lib.php");

$id = "";
$page = "";

$conn = null;
$arr_err_msg = [];

try {
    if (!isset($_GET["id"]) || $_GET["id"] === "") {
        throw new Exception("Parmeter ERROR : No Id");
    }

    $id = $_GET["id"];
    $page = $_GET["page"];

    //var_dump($_GET["page"]);
    // DB 연결
    if(!my_conn($conn)) {
        throw new Exception("DB Error : PDO Instance");
    }

    // 게시글 데이터 조회
    $arr_param = [
        "id" => $id
    ];
    $result = db_select_boards_id($conn, $arr_param);
    // var_dump($result);

    //게시글 조회 예외처리
    if(!$result) {
        //게시글 조회 에러
        throw new Exception("DB Error : PDO Select_id");
    } else if( !(count($result) === 1) ) {
        //게시글 조회 count 에러
        throw new Exception("DB Error : PDO Select_id count," .count($result));
    }
    
$item = $result[0];
// var_dump($result);
// var_dump($item);

} catch(Exception $e) {
    echo $e->getMessage();
    //header("Location: error.php/?err_msg={$e->getMessage()}");
    exit;

} finally {
    db_destroy_conn($conn);
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/homework/src/css/common.css">
    <title>detail_page</title>
</head>
<body>
    <div class="head text_align">
        <p>BOARD</p>
    </div>
    <table>
        <tr>
            <th>글번호</th>
            <td><?php echo $item["id"]; ?></td>
        </tr>
        <tr>
            <th>제목</th>
            <td><?php echo $item["title"]; ?></td>
        </tr>
        <tr>
            <th>내용</th>
            <td><?php echo $item["memo"]; ?></td>
        </tr>
        <tr>
            <th>작성일자</th>
            <td><?php echo $item["create_date"]; ?></td>
        </tr>
    </table>
    <div>
        <a href="/homework/src/list.php/?id=<?php echo $id; ?>&page=<?php echo $page; ?>">이전</a>
        <a href="/homework/src/update.php/?page=<?php echo $page; ?>">수정</a>
        <a href="/homework/src/delete.php/?id=<?php echo $id; ?>&page=<?php echo $page; ?>">삭제</a>
    </div>
</body>
</html>