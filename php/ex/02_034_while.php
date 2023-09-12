<?php
//조건이 참이면 루프하는 문법

// $i = 0;
// while($i <= 2){
//     echo "{$i}\n";

//     $i++;
// }

//구구단 2단
$num = 1;

while($num <= 9) {
    $mul = 2 * $num;
    echo "2 x {$num} = {$mul} \n";

    $num++;
}

//do~ while : 무조건 한번은 실행하고 그다음부터 조건이 참이면 루프하는 문법.
$i = 0;

do{
    echo "ttt";
}
while($i <0);

?>