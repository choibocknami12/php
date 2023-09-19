<?php

try {
    //예외상황이 발생할만한 소스코드(우리가 처리하고 싶은 소스코드)
    //commit은 여기?
    echo "try 실행\n";
    throw new Exception("강제예외발생");
    echo "try 종료\n";
    
} catch(Exception $e) {
    //예외상황 발생시 실행
    //rollback여기?
    echo "catch 실행\n";
    echo $e->getMessage(),"\n";//에러메세지 출력하는 방법
} finally {
    //정상이든, 예외발생이든 무조건 실행
    echo "finally 실행\n";
}


?>