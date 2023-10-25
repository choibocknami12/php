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




?>