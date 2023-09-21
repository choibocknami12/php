<?php
// GET Method

// url의 구조
// http://www.naver.com/mini_board/src/list.php/?page=2&num=10
// 프로토콜(http / https) : 통신을 하기위한 규약, 약속, 규칙
// 도메인(www.naver.com) : 접속하고자 하는 서버의 ip 또는 별칭
// 패스(mini_board/src/list.php) : 실행시키고자 하는 처리의 주소
// 쿼리스트링 or 파라미터(page=2&num=10) : get method로 통신할 때 유저가 보내주는 데이터(쿼리 스트링은 앞에 ?붙여줘야함)

print_r($_GET);
// 슈퍼글로벌변수에는 값을 주면 안된다.(원본데이터는 꼭 보존해야함)
?>

