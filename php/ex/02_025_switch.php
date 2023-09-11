<?php
// switch : 값이 고정되어 있는 경우 if문 대신 사용할 수 있다.
// 조건에 따라서 서로 다른 처리를 할 수 있다.
// break를 반드시 붙여주어야함. 안그러면 계속 실행됨.

$food = "김밥";

switch($food) {
    case "김밥":
        echo "한식";
        break;
    case "마파두부":
        echo "중식";
        break;
    default:
        echo "기타";
        break;
}

?>