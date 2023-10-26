<?php
// ----------------------------------------
// 파일명 : 
// 기능   : DB 연동 관련 함수
// 버전   : v001 230918 new 사번 or 이름

// 함수명   : my_db_conn
// 기능     : DB connect
// 파라미터 : PDO &$conn
// 리턴     : boolen
// -----------------------------------------

function my_conn( &$conn ) {
    $db_host = "localhost"; // host아이피. 
    $db_user = "root";  // user
    $db_pw = "php504"; // password
    $db_name = "my_board"; // db name
    $db_charset = "utf8mb4"; // charset
    $db_dns = "mysql:host=".$db_host.";dbname=".$db_name.";charset=".$db_charset;
    // 필요한 문자열들을 변수설정해줘서 바뀌기 쉬운것들을 따로 빼두는것.
    
try {
    $db_options = [
        PDO::ATTR_EMULATE_PREPARES => false
        ,PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // 에러가 뜨더라도 맞는건 처리하게 하는거?
        ,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC // 연상배열로 패치하도록 함.
    ];
    //PDO Class로 DB연동
    $conn = new PDO($db_dns, $db_user, $db_pw, $db_options);    
    return true;
} catch (Exception $e) {
    $conn = null;
    return false;
    } 
}

//------------------------------------------
// 함수명   : db_destroy_conn
// 기능     : DB connect
// 파라미터 : PDO &$conn
// 리턴     : 없음
// -----------------------------------------
function db_destroy_conn(&$conn) {
    $conn = null; 
}

//------------------------------------------
// 함수명   : db_select_boards_paging
// 기능     : boards pasging 조회
// 파라미터 : PDO  &$conn
// 리턴     : Int / false
// -----------------------------------------

function db_select_boards_cnt(&$conn) {
    $sql =
        " SELECT "
        ." COUNT(id) as cnt"
        ." FROM "
        ." boards "
        ." WHERE "
        ." delete_date is null "
        ;
        try {
            $stmt = $conn->query($sql);  // 쿼리 준비 실행 다같이 해줌. stmt에 값을 받을게 없으니까!
            $result = $stmt->fetchAll();
//var_dump($result);
            return (int)$result[0]["cnt"];// 정상일 때 쿼리결과ㅑ 리턴
        } catch(Exception $e) {
            return false; 
        }
}

//------------------------------------------
// 함수명   : db_select_boards_paging
// 기능     : boards pasging 조회
// 파라미터 : PDO  &$conn
//            Array &$arr_param
// 리턴     : Array / false
// -----------------------------------------

function db_select_boards_pasging(&$conn, &$arr_param) {
    try {
        $sql =
        " SELECT "
        ." id "
        ." ,title "
        ." ,create_date "
        ." FROM "
        ." boards "
        ." WHERE "
        ." delete_date IS NULL "
        ." ORDER BY "
        ." id DESC "
        ." LIMIT :list_cnt OFFSET :offset "
        ;

        $arr_ps = [
            ":list_cnt" => $arr_param["list_cnt"]
            ,":offset" => $arr_param["offset"]
        ];

        $stmt = $conn->prepare($sql);
        $stmt->execute($arr_ps);
        $result = $stmt->fetchAll();

        return $result;

    } catch(Exception $e){
        echo $e->getMessage();
        return false;
    }
}


//------------------------------------------
// 함수명   : db_insert_boards
// 기능     : boards 레코드 작성
// 파라미터 : PDO  &$conn
//            Array &$arr_param          
// 리턴     : Boolean
// -----------------------------------------
function db_insert_boards(&$conn, &$arr_param) {
    $sql =
    " INSERT INTO "
    ." boards ( "
    ." title "
    ." ,content ) "
    ." VALUES ( "
    ." :title "
    ." ,:content ) "
    ;
    $arr_ps = [
        ":title" => $arr_param["title"]
        ,":content" => $arr_param["content"]
    ];
    try {
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute($arr_ps);
        return $result;
    } catch(Exception $e) {
        echo $e->getMessage();
        return false;
    }
}



?>