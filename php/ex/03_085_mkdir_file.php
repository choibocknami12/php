<?php

// 폴더(디렉토리) 
// mkdir("testdir", 777); //나랑 같은 위치에 생성

// mkdir("../tng/testdir", 777); //상대주소로 찾아가면댐

// rmdir("./testdir");

///////

// 파일 열기
$file = fopen("zz.txt", "r");

// if($file){
//     echo "참";
// } else {
//     echo "거짓";
// }

// 파일 쓰기
// $f_write = fwrite($file, "짜장면\n");

//파일 읽기
// $line = fread($file, "9");
// echo fgets($file);

// while($line = fgets($file)){    
//     echo $line;
// }

// //파일 닫기
//  fclose($file); 

//파일 삭제
unlink("zz.txt");



?>