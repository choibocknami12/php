<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]);
require_once(ROOT."/lib/db_lib.php");

$conn = null;

$total_page = 5; // 한블럭당 나타나는 페이지 수?
$list_cnt = 5; // 한 페이지의 게시글 최대 표시 수
$page_num = 1; // 페이지 번호 초기화

try {
    if(!my_conn($conn)) {
        throw new Exception("DB Error : PDO Instance");
    }

    $boards_cnt = db_select_boards_cnt($conn);
    if($boards_cnt === false) {
        throw new Exception("DB Error : SELECT Count");
    }

    $max_page_num = ceil($boards_cnt / $list_cnt); // 최대 페이지 수 : 올림하는 이유는 데이터수에 따라 페이지는 생겨나야하기때문.
    

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

    // 3block = 5(페이지 수) / 15(총 페이지 수)
    $total_block = ceil($page_num / $total_page); // 한블럭당 5페이지/ 나타나는 페이지번호?
    
    $start_block = ($total_block - 1) * $total_page + 1; // 시작블럭 = (총 필요한 블럭수-1) * 총 페이지수 + 1 

    $end_block = $start_block + $total_page - 1; // 마지막블럭 = 시작블럭 + 총페이지 수 - 1 // 

    if( $end_block > $max_page_num) {
        $end_block = $max_page_num;
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
    <link rel="stylesheet" href="/css/common.css">
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+KR:wght@300" rel="stylesheet">
    <title>list_page</title>
</head>
<body>

    <div class="head text_align">
        <a href="/list.php">BOARD</a>
    </div>

    <div class="timeDiv">
        
    </div>

    <div class="main">
        <table class="text_align tab_main">
            <colgroup>
                <col width = "20%">
                <col width = "60%">
                <col width = "20%">
            </colgroup>
            <tr class="list">
                <th class="list_title">번호</th>
                <th class="list_title">제목</th>
                <th class="list_title">작성일자</th>
            </tr>
            <?php
                foreach($result as $item) {
            ?>
            <tr class="main_txt">
                <td><?php echo $item["id"]; ?></td>
                <td>
                    <a href="/detail.php/?id=<?php echo $item["id"]; ?>&page=<?php echo $page_num; ?>">
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
            <a class="page_btn" href="/list.php/?page=<?php echo $prev_page_num ?>">이전</a>
            <?php
                // for($i = 1; $i <= $max_page_num; $i++) {
                //     //삼항 연산자 : 조건 ? 참일때처리 : 거짓일때처리
                //     $str = (int)$page_num === $i ? "bk-a" : "";
                for($page_i = $start_block; $page_i <= $end_block; $page_i++) {
                    if($page_i == $page_num) {
            ?>
                    <a class="page_btn " href="/list.php/?page=<?php echo $page_i; ?>"><?php echo $page_i; ?></a>
            
            <?php } else { ?>

                    <a class="page_btn " href="/list.php/?page=<?php echo $page_i; ?>"><?php echo $page_i; ?></a>    

            <?php    
                    }
                }
            ?>
            
            <a class="page_btn" href="/list.php/?page=<?php echo $next_page_num ?>">다음</a>
        </section>
    </div>
    <div class="insert_btn2">
        <a href="/insert.php" class="text_align insert_btn">작성하기</a>
    </div>

    
    
    <script src="/time.js"></script>
    
</body>
</html>