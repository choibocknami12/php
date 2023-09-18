<?php
// PDO 클래스 이용하여 아래 쿼리 실행하기
// 1. 자신의 사원 정보를 employees 테이블에 등록
// 2. 자신의 이름을 "둘리" 성을 "호이"로 변경
// 3. 자신의 정보를 출력
// 4. 자신의 정보를 삭제
// 5. PDO 클래스 사용법 숙지

//1.

require_once("../ex/04_107_fnc_db_connect.php");
$conn = null;
my_db_conn( $conn );

$sql = 
    " INSERT INTO "
    ." employees ( "
    ."  emp_no   "
    ." ,birth_date "
    ." ,first_name "
    ." ,last_name "
    ." ,gender "
    ." ,hire_date "
    ." ) "
    ." VALUES ( "
    ." :emp_no "
    ." ,:birth_date "
    ." ,:first_name "
    ." ,:last_name "
    ." ,:gender "
    ." ,:hire_date "
    ." ) "
    ;

$arr_ps = [
    ":emp_no" => 500001
    ,":birth_date" => 19930624
    ,":first_name" => "hyunhee"
    ,":last_name" => "Choi"
    ,":gender" => "F"
    ,":hire_date" => 20230918
];

// $stmt = $conn -> prepare($sql);
// $stmt->execute($arr_ps);
// $result = $stmt -> fetchALL();
$stmt = $conn -> prepare($sql);
$result = $stmt->execute($arr_ps);
$conn->commit();
print_r($result);




?>