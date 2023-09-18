<?php

require_once("./04_107_fnc_db_connect.php");

$conn = null; // 잔여 데이터가 남아있을 수도 있으니까 null로 초기화를 시켜서 최초세팅시킴 그값을 가지고 오겠다는것
my_db_conn($conn);

$sql = " SELECT "
    ."          * "
    ." FROM "
    ."          employees "
    ." WHERE "
    ."          emp_no = :emp_no "
    ;
//prepared statement 세팅
$arr_ps = [
    ":emp_no" => 10004
];

$stmt = $conn -> prepare($sql);
$stmt->execute($arr_ps); //쿼리 실행부분
$result = $stmt -> fetchALL();

print_r($result);

$conn = null; //이것도 함수로 부르기도함.

?>