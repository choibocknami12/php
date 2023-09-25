<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/"); //웹 서버
define("FILE_HEADER", ROOT."header.php"); // 헤더 패스
require_once(ROOT."lib/lib_db.php");

$conn = null; // db 연결용 변수
$id = isset($_GET["id"]) ? $_GET["id"] : $_POST["id"]; //id셋팅 (삼항변산자?라고하는데 잘모르겠음ㅋ)
$page = isset($_GET["page"]) ? $_GET["page"] : $_POST["page"];
$http_method = $_SERVER["REQUEST_METHOD"]; //메소드 확인

try {
    //DB 연결
    if(!my_db_conn($conn)) {
        throw new Exception("DB Error : PDO Instance");
    }
    
    if($http_method === "GET") {
        // get method의 경우
        // 게시글 데이터 조회를 위한 파라미터 셋팅
        $arr_param = [
            "id" => $id
        ];
        //게시글 데이터 조회
        $result = db_select_boards_id($conn, $arr_param);
        //게시글 조회 예외처리
        if($result === false) {
            throw new Exception("DB Error : PDO Select_id");
        } else if(!(count($result) === 1)) {
            // 게시글 조회 count 에러
            throw new Exception("DB Error : PDO Select_id Count".count($result));
        }
        $item = $result[0];

    } else {
        // post method의 경우
        // 게시글 수정을 위해 파라미터 셋팅
        $arr_param = [
            "id" => $id
            ,"title" => $_POST["title"]
            ,"content" => $_POST["content"]
        ];

        // 게시글 수정 처리
        $conn->beginTransaction(); //트랜젝션 시작

        if(!db_update_boards_id($conn, $arr_param)) {
            throw new Exception("DB Error : Update_Boards_id");
        }
        $conn->commit();

        header("Location: detail.php/?id={$id}&page={$page}");
        exit;
    }
} catch(Exception $e) {
    if($http_method === "POST") {
        $conn->rollBack();
    }
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
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+KR:wght@300" rel="stylesheet">
    <link rel="stylesheet" href="/mini_board/src/css/common.css">
    <title>수정 페이지</title>
</head>
<body>
    <?php
        require_once(FILE_HEADER);
    ?>
    <form action="/mini_board/src/update.php" method="post">
    <table class="update-table">
        <input type="hidden" name="id" value="<?php echo $id ?>">
        <input type="hidden" name="page" value="<?php echo $page ?>">
        <tr>
            <th>글번호</th>
            <td><?php echo $item["id"]; ?></td>
        </tr>
        <tr>
            <th>제목</th>
            <td><input type="text" name="title" value="<?php echo $item["title"]?>"></td>
        </tr>
        <tr>
            <th>내용</th>
            <td><textarea name="content" id="content" cols="30" rows="10"><?php echo $item["content"]?></textarea></td>
        </tr>
    </table>
    <div class="select-btn">
        <button type="submit">수정확인</button>
        <a class="can-btn" href="/mini_board/src/list.php/?page=<?php echo $id; ?>&page=<?php echo $page; ?>">수정취소</a>
    </div>
    </form>
</body>
</html>