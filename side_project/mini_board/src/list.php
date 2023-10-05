<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_board/src/"); //웹 서버
define("FILE_HEADER", ROOT."header.php"); // 헤더 패스
require_once(ROOT."lib/lib_db.php"); // DB관련 라이브러리
// 서버에 뭐가 있는지 궁금할 때 사용 var_dump($_SERVER);

$conn = null;

$list_cnt = 5; //한 페이지 최대 표시 수
$page_num = 1; //페이지 번호 초기화

try {
    //DB 접속
    if(!my_db_conn($conn)) {
        throw new Exception("DB Error : PDO Instance");
    }

    //--------------------------------------------------------
    //페이징 처리 : 처음에 주소를 치고 들어오면 나오는 페이지도 함께 설정을 해 주어야함. 그래서 밑에처럼 사용
    //--------------------------------------------------------

    $boards_cnt = db_select_boards_cnt($conn);
    if($boards_cnt === false) {
        throw new Exception("DB Error : SELECT Count");
    }

    $max_page_num = ceil($boards_cnt / $list_cnt); //최대 페이지 수

    if(isset($_GET["page"])) {
        $page_num = $_GET["page"]; // 유저가 보내온 페이지 셋팅
    }
    
    //var_dump($_GET["page"]);
    $offset = ($page_num - 1) * $list_cnt; //offset계산

    //이전버튼
    $prev_page_num = $page_num - 1;
    if($prev_page_num === 0) {
        $prev_page_num = 1;
    }

    //다음버튼
    $next_page_num = $page_num + 1;
    if($next_page_num > $max_page_num) {
        $next_page_num = $max_page_num;
    }

    // DB조회시 사용할 데이터 배열
    $arr_param = [
        "list_cnt" => $list_cnt
        ,"offset" => $offset
    ];

    //게시글 리스트 조회
    $result = db_select_boards_pasging($conn, $arr_param);
    
    //게시글 조회 에러
    if(!$result) {
        throw new Exception("DB Error : SELECT boards Paging");
    }

}
catch(Exception $e) {
    //echo $e->getMessage(); //v002 del
    header("Location: error.php/?err_msg={$e->getMessage()}");
    exit;
}
finally {
    db_destroy_conn($conn);
}


db_destroy_conn($conn); // 이렇게 받아오면 db쓸일이 없어서 파기함

//var_dump($result);

?>



<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/mini_board/src/css/common.css">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+KR:wght@300" rel="stylesheet">
    <title>리스트 페이지</title>
</head>
<body>
    <?php
        require_once(FILE_HEADER);
    ?>
    <main>
        <table>
            <colgroup>
                <col width = "20%">
                <col width = "50%">
                <col width = "30%">
            </colgroup>
            <tr class="table-title">
                <th class="radius-left">번호</th>
                <th>제목</th>
                <th class="radius-right">작성일자</th>
            </tr>
            <?php
            // 리스트생성 : 데이터베이스의 데이터를 갖고 올것이라 포이치씀
            foreach($result as $item) {
            ?>
                <tr>
                    <td><?php echo $item["id"]; ?></td>
                    <td>
                    <a href="/mini_board/src/detail.php/?id=<?php echo $item["id"]; ?>&page=<?php echo $page_num; ?>">   
                        <?php echo $item["title"]; ?>
                    </a>
                    </td>
                    <td><?php echo $item["create_at"]; ?></td>
                </tr>   
            <?php } ?>
            </table>
        <section>
                <a class="page-btn" href="/mini_board/src/list.php/?page=<?php echo $prev_page_num ?>">이전</a>
            <?php
                for($i = 1; $i <= $max_page_num; $i++) {
                    //삼항 연산자 : 조건 ? 참일때처리 : 거짓일때처리
                    $str = (int)$page_num === $i ? "bk-a" : "";
            ?>
                <a class="page-btn <?php echo $str ?>" href="/mini_board/src/list.php/?page=<?php echo $i; ?>"><?php echo $i; ?></a>       
            <?php    
                }
            ?>
                <a class="page-btn" href="/mini_board/src/list.php/?page=<?php echo $next_page_num ?>">다음</a>
        </section>
    </main>
    <a class="content-btn" href="/mini_board/src/insert.php">글쓰기</a>
</body>
</html>