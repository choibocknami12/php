<?php
// PDO 클래스 이용하여 아래 쿼리 실행하기
// 1. 자신의 사원 정보를 employees 테이블에 등록
// 2. 자신의 이름을 "둘리" 성을 "호이"로 변경
// 3. 자신의 정보를 출력
// 4. 자신의 정보를 삭제
// 5. PDO 클래스 사용법 숙지

//1.

// require_once("../ex/04_107_fnc_db_connect.php");
// $conn = null;
// my_db_conn( $conn );

// $sql = 
//     " INSERT INTO "
//     ." employees ( "
//     ."  emp_no   "
//     ." ,birth_date "
//     ." ,first_name "
//     ." ,last_name "
//     ." ,gender "
//     ." ,hire_date "
//     ." ) "
//     ." VALUES ( "
//     ." :emp_no "
//     ." ,:birth_date "
//     ." ,:first_name "
//     ." ,:last_name "
//     ." ,:gender "
//     ." ,:hire_date "
//     ." ) "
//     ;

// $arr_ps = [
//     ":emp_no" => 500001
//     ,":birth_date" => 19930624
//     ,":first_name" => "hyunhee"
//     ,":last_name" => "Choi"
//     ,":gender" => "F"
//     ,":hire_date" => 20230918
// ];

// $stmt = $conn -> prepare($sql);
// $result = $stmt->execute($arr_ps);
// $conn->commit();
// print_r($result);

//2.

// require_once("../ex/04_107_fnc_db_connect.php");
// $conn = null;
// my_db_conn( $conn );

// $sql = 
//     " UPDATE "
//     ."employees"
//     ." SET "
//     ."first_name = :first_name"
//     ." WHERE "
//     ."emp_no = 500001"
//     ;

// $arr_ps = [
//     ":first_name" => "호이"
// ];    

//     $stmt = $conn -> prepare($sql);
//     $result = $stmt->execute($arr_ps);
//     $conn->commit();
//     print_r($result);
//------------------------------------------------------
    // require_once("../ex/04_107_fnc_db_connect.php");
    // $conn = null;
    // my_db_conn( $conn );
    
    // $sql = 
    //     " UPDATE "
    //     ."employees"
    //     ." SET "
    //     ."last_name = :last_name"
    //     ." WHERE "
    //     ."emp_no = 500001"
    //     ;
    
    // $arr_ps = [
    //     ":last_name" => "둘리"
    // ];    
    
    //     $stmt = $conn -> prepare($sql);
    //     $result = $stmt->execute($arr_ps);
    //     $conn->commit();
    //     print_r($result);

//3.

// require_once("../ex/04_107_fnc_db_connect.php");
// $conn = null;
// my_db_conn( $conn );

// $sql =
//     " SELECT "
//     ." * "
//     ." FROM " 
//     ."employees"
//     ." WHERE "
//     ."emp_no = :emp_no";

// $arr_ps = [
//     ":emp_no" => 500001
// ];

// $stmt = $conn->prepare($sql);
// $stmt -> execute($arr_ps); // 쿼리 실행
// $result = $stmt->fetchALL(); // 쿼리 결과를 fetch
// print_r($result);
// $conn = null;

//4.

require_once("../ex/04_107_fnc_db_connect.php");
$conn = null;
my_db_conn( $conn );

$sql =
" DELETE FROM " 
." employees "
." WHERE "
." emp_no = :emp_no "
;

$arr_ps = [
    ":emp_no" => 500001
];

$stmt = $conn -> prepare($sql);
$result = $stmt->execute($arr_ps);
$conn->commit();
print_r($result);
//rowCount사용해야하나? 꼭? >> 물어보기.


?>