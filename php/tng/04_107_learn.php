<?php
// 1. db_conn 이라는 함수를 만들어주세요.
// 1-1. 기능 : db 설정 및 pdo객체 생성
// 2. 사원별 현재 급여가 80,000 이상 조회하기
// 3. 조회한 데이터를 루프(foreach)하면서 급여가 100,000이상이면 사원번호 출력해주세요.

//레퍼런스 파라미터 방법 : 메모리 관리를 위해. return을 주게 되면 함수영역, 메인영역 모두 pdo를 생성하게댐
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
// 2번 문제
// $conn = null; //미리 초기화를 해두긴해야함. 없어도 실행은댐
// db_conn($conn);

// $sql =
// " SELECT "
// ." emp_no "
// ." ,salary " 
// ." FROM "
// ." salaries "
// ." WHERE "
// ." to_date = :to_date "
// ." AND "
// ." salary >= :salary "
// ;

// $arr_ps = [
//     ":to_date" => 99990101
//     ,":salary" => 80000
// ];

// $stmt = $conn->prepare($sql);
// $stmt -> execute($arr_ps); 
// $result = $stmt->fetchALL(); // execute로 받은 정보를 연상배열로 값을 가지고옴. 
// print_r($result);

// $conn = null;


//3번 문제
$conn = null;
db_conn($conn); //위에서 작성한 함수 불러오기(db연동한거 만든 함수)

$sql = 
" SELECT "
." * "
." FROM "
." salaries "
." WHERE "
." to_date = :to_date "; //쿼리문 작성...근데 왜 작성함? 어차피 문자열인데..?

$arr_ps = [
    ":to_date" => 99990101
]; //원래 유저한테 받는 값. 지금은 지정을 해주지만 실제로 웹상에서는 변수로값을 받아 올것.

$stmt = $conn->prepare($sql); //db와 php 연동하기위해 준비
$stmt -> execute($arr_ps); //$arr_ps 값을 실행시켜주기위해 stmt에 넣어줌
$result = $stmt->fetchALL(); //실행시켜주는 함수!
//$cnt = 0; 총합을 출력해주는거
foreach($result as $sal) {
    if($sal["salary"] >= 100000) {
        echo $sal["emp_no"]."\n";
        //$cnt++; 이거 밖에 넣으면 십만이상 계쏙 뽑아냄. if조건 안에 들어가야 조건대로 세어줌
    }
}
//echo $cnt;
$conn = null;


//하나의 쿼리로 2문제 다 풀기..>>샘 깃허브










?>