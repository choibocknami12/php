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
$num = 1;

while($i < 10) {
    echo "{$i}단\n";
    $i++;

    while($num <10){
        $mul = $i*$num;
        echo "{$i} x {$num} = {$mul}";

    }
}



?>