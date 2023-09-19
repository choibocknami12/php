<?php
// 1. titles테이블에 데이터가 없는 사원을 검색
// 2. 1번에 해당하는 사원의 직책정보를 insert하기
//  2-1. 직책은 "green", 시작일은 현재시간, 종료일은 99990101
// 3. db에 저장될 것

function db_conn( &$conn ){
    $db_host = "localhost"; 
    $db_user = "root";  
    $db_pw = "php504"; 
    $db_name = "employees"; 
    $db_charset = "utf8mb4"; 
    $db_dns = "mysql:host=".$db_host.";dbname=".$db_name.";charset=".$db_charset;
    $db_options = [
        PDO::ATTR_EMULATE_PREPARES => false
        ,PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION 
        ,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC 
    ];
    $conn = new PDO($db_dns, $db_user, $db_pw, $db_options);
    }

$conn = null;
db_conn($conn);

// 1. 문제 쿼리
// $sql1 =
// " SELECT "
// ." * "
// ." FROM "
// ." employees emp "
// ." LEFT OUTER JOIN "
// ." titles tit "
// ." ON emp.emp_no = tit.emp_no "
// ." WHERE "
// ." tit.emp_no IS NULL "
// ;

// $arr_ps = [];

// $stmt = $conn->prepare($sql1);
// $stmt -> execute($arr_ps); 
// $result = $stmt->fetchALL(); 
// print_r($result);

// 2. 문제 쿼리
$sql2 =
" INSERT INTO "
." titles "
." VALUES ( "
." titles "
."	:emp_no "
.",	:title "
.",	:from_date "
.",	:to_date ) "
;

$arr_ps = [
    ":emp_no" => 700000
    ,":title" => "Green"
    ,":from_date" => 20230919
    ,":to_date" => 99990101
];

// $sql =
// " INSERT INTO "
// ." titles "
// ." (:emp_no, :title, :from_date, :to_date) "
// ." SELECT "
// ." * "
// ." FROM "
// ." employees emp "
// ." LEFT OUTER JOIN "
// ." titles tit "
// ." ON emp.emp_no = tit.emp_no "
// ." WHERE tit.emp_no IS NULL ";

// $arr_ps = [
//     ":emp_no" => 700000
//     ,":title" => "Green"
//     ,":from_date" => 20230919
//     ,":to_date" => 99990101
// ];

$stmt = $conn -> prepare($sql2);
$result = $stmt->execute($arr_ps);
$conn->commit();
print_r($result);





?>