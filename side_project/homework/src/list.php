<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/homework/src");
require_once(ROOT."/lib/db_lib.php");

$conn = null;

$list_cnt = 5;
$page_num = 1; 

try {
    if(!my_conn($conn)) {
        throw new Exception("DB Error : PDO Instance");
    }

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
    
    echo $e->getMessage(); //v002 del
    //header("Location: error.php/?err_msg={$e->getMessage()}");
    exit;
}
finally {
    db_destroy_conn($conn);
}


db_destroy_conn($conn);


?>


<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/homework/src/css/common.css">
    <link rel="stylesheet" href="">
    <title>list_page</title>
</head>
<body>
    <div class="head text_align">
        <p>BOARD</p>
    </div>

    <div class="main text_align">
        <table class="text_align">
            <colgroup>
                <col width = "20%">
                <col width = "60%">
                <col width = "20%">
            </colgroup>
            <tr>
                <th class="list_title">번호</th>
                <th class="list_title">제목</th>
                <th class="list_title">작성일자</th>
            </tr>
            <?php
                foreach($result as $item) {
            ?>
            <tr>
                <td><?php echo $item["id"]; ?></td>
                <td>
                    <a href="/homework/src/detail.php/?id=<?php echo $item["id"]; ?>&page=<?php echo $page_num; ?>">
                        <?php echo $item["title"]; ?>
                    </a>
                </td>
                <td><?php echo $item["create_date"]; ?></td>
            </tr>
            <?php } ?>
        </table>
    </div>

    <div class="btn text_align">
        <section>
            <a href="/homework/src/list.php/?page=<?php echo $prev_page_num ?>">이전</a>
            <?php
                for($i = 1; $i <= $max_page_num; $i++) {
                    //삼항 연산자 : 조건 ? 참일때처리 : 거짓일때처리
                    $str = (int)$page_num === $i ? "bk-a" : "";
            ?>
            <a class="page_btn <?php echo $str ?>" href="/homework/src/list.php/?page=<?php echo $i; ?>"><?php echo $i; ?></a>
            <?php    
                }
            ?>
            <a href="/homework/src/list.php/?page=<?php echo $next_page_num ?>">다음</a>
        </section>
    </div>
        <a href="/homework/src/insert.php" class="text_align">작성하기</a>
</body>
</html>