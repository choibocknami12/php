<?php
//19단 찍기

//$file = fopen(19.txt, "a");
// for($i = 1; $i < 20; $i++) {
//     echo "{$i}단 \n";

//     for($num = 1; $num < 20; $num++) {
//         $mul = $i*$num;
//         echo "{$i} x {$num} = {$mul} \n";
//     }
// }
//fcolse($file)

$i = 1;

while($i < 10) {
    echo "{$i}단\n";

    $num = 1;//$i 안의 while문이 한번 돌고 초기화가 되야하기 때문에(곱해주는 수가 됨.) 안에 넣어야함
    while($num <10) {
        $mul = $i*$num;
        echo "{$i} x {$num} = {$mul}\n";
        $num++;
    }
    $i++;//여기 있어야 무한루프안걸림
}



?>