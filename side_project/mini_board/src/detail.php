<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/"); //웹 서버
define("FILE_HEADER", ROOT."header.php"); // 헤더 패스
require_once(ROOT."lib/lib_db.php"); // DB관련 라이브러리

my_db_conn($conn);
$id = "";
$conn = null;

//$page_name = $_SERVER["PHP_SELF"];
//$chk_detail = isset($_GET["test"]) ? $_GET["test"] : "update";
//머라는지 하나도 못들음.

try {
    
    //id 확인
    // if(isset($_GET["id"])) {
    //     $id = $_GET["id"]; //id 셋팅
    // } else {
    //     throw new Exception("Parmeter ERROR : No Id"); // 강제 예외 발생 : 
    // }
    
    // 다른 방법
    if (!isset($_GET["id"]) || $_GET["id"] === "") {
        throw new Exception("Parmeter ERROR : No Id");
    }

    $id = $_GET["id"];
    $page = $_GET["page"];

    //var_dump($_GET["page"]);
    // DB 연결
    if(!my_db_conn($conn)) {
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

} catch(Excepiton $e) {
    echo $e->getMessage();
    exit;
} finally {
    db_destroy_conn($conn);
}




?>




<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+KR:wght@300" rel="stylesheet">
    <link rel="stylesheet" href="/mini_board/src/css/common.css">
    <title>상세 페이지</title>
</head>
<body>
    <?php
        require_once(FILE_HEADER);
    ?>
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
            <td><?php echo $item["content"]; ?></td>
        </tr>
        <tr>
            <th>작성일자</th>
            <td><?php echo $item["create_at"]; ?></td>
        </tr>
        
    </table>
    <div class="select-btn">
        <a class="cor-btn" href="/mini_board/src/update.php/?id=<?php echo $id; ?>&page=<?php echo $page; ?>">수정</a>
        <a class="can-btn" href="/mini_board/src/list.php/?page=<?php echo $page; ?>">취소</a>
        <a class="del-btn" href="/mini_board/src/delete.php/?id=<?php echo $id; ?>&page=<?php echo $page; ?>">삭제</a>
    </div>
</body>
</html>