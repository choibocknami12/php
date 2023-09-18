<?php
//php.ini 에 들어가서 extension=pdo_mysql, pdo_odbc 주석해제
$db_host = "localhost"; // host아이피. 
$db_user = "root";  // user
$db_pw = "php504"; // password
$db_name = "employees"; // db name
$db_charset = "utf8mb4"; // charset
$db_dns = "mysql:host=".$db_host.";dbname=".$db_name.";charset=".$db_charset;
// 필요한 문자열들을 변수설정해줘서 바뀌기 쉬운것들을 따로 빼두는것.
$db_options = [
    PDO::ATTR_EMULATE_PREPARES => false
    ,PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // 에러가 뜨더라도 맞는건 처리하게 하는거?
    ,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC // 연상배열로 패치하도록 함.
];
//PDO Class로 DB연동
$obj_conn = new PDO($db_dns, $db_user, $db_pw, $db_options);

// sql 작성 >> 10004번 사원테이블의 사원정보를 출력해주세요.
// $sql = "SELECT * FROM employees WHERE emp_no = 10004";
//php에서 sql작성시 마지막에 세미콜론은 붙이지 않음. 보안차원
// $sql = " SELECT "
//     ."          * "
//     ." FROM "
//     ."          employees "
//     ." WHERE "
//     ."          emp_no = :emp_no "
//     ;

// prepared statment 세팅
// $arr_ps = [
//     ":emp_no" => 10004
// ];

// prepared statment 생성 >> 지금 작성한 sql을 사용하지 못하니 사용하게 하려고하는거?
// $stmt = $obj_conn->prepare($sql);
// $stmt -> execute($arr_ps); // 쿼리 실행
// $result = $stmt->fetchALL(); // 쿼리 결과를 fetch(select할땐 필요함)
// print_r($result);

// 사번  10001, 10002의 현재 연봉과 사번, 생일을 가져오는 쿼리를 작성해서 출력.
// $sql = 
//     " SELECT "
//     ." sal.salary "
//     ." ,emp.emp_no "
//     ." ,emp.birth_date "
//     ." FROM "
//     ." employees emp "
//     ." JOIN salaries sal"
//     ." ON emp.emp_no = sal.emp_no "
//     ." AND "
//     ." sal.to_date >= NOW() "
//     ." WHERE "
//     ." emp.emp_no = :emp_no1 "
//     ." OR "
//     ." emp.emp_no = :emp_no2 "
//     ;

//     $arr_ps = [
//         ":emp_no1" => 10001
//         ,":emp_no2" => 10002
//     ]; //변수명처럼 중복되면 안댐

// $stmt = $obj_conn->prepare($sql);
// $stmt -> execute($arr_ps); // 쿼리 실행
// $result = $stmt->fetchALL(); // 쿼리 결과를 fetch
// print_r($result);


//insert
//부서 번호가 d010 부서명이 php504 데이터 insert
// $sql =
// " INSERT INTO " 
// ." departments ( "
// 	." dept_no "
// 	." ,dept_name "
//     ." ) "
// ." VALUES ( "
// 	." :dept_no "
// 	.",:dept_name "
//     ." ) "
// ;

// $arr_ps = [
//     ":dept_no" => "d010"
//     ,":dept_name" => "php504"
// ];

// $stmt = $obj_conn->prepare($sql);
// $result = $stmt->execute($arr_ps); // insert나 delet는 에러가 날수있어서 한번 검증을 하고 감
// $obj_conn -> commit(); //커밋해줘야함.

// var_dump($result);

// $obj_conn = null;

//FLUSH PRIVILEGES; 위의 상황을 다 진행 후 db들어가서 이명령어를 작성해주어야함.

//DELET
//d010삭제
$sql =
" DELETE FROM " 
." departments "
." WHERE "
." dept_no = :dept_no "
;

$arr_ps = [
    ":dept_no" => "d010"
];
//유저한테 받는 값! 만약 지정해둘거면 이거 쓰고

$stmt = $obj_conn->prepare($sql); //데이터베이스에 선언해주는것. 이렇게 실행할거임~
$result = $stmt->execute($arr_ps); // 실행하기 위해서 필요함
$res_cnt = $stmt->rowCount(); //영향받은 로우의 숫자를 리턴해준다.
if($res_cnt >= 2) {
    $obj_conn->rollback(); // 
} else {
    $obj_conn -> commit();
}
$obj_conn = null; // db파기
var_dump($result); 


//$obj_conn -> commit(); //커밋해줘야함.
//트라이 캐치? 배울때 다시
// if( !$result ) {
//     $obj_conn->rollback; // true이 아닐 때 롤백해라
// } else {
// }




?>