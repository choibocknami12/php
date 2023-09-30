<?php
// require("./tng/88_02_rsp.php");
// include("");
// //부를때 이게 맞나...

// define("TEST","안녕");
// echo TEST;


$x=1;
$max=6;

    while($x<$max) {
        $y=1;
        $z=1;
        while($y<=$max-$x) {
            echo "*";
            $y++;
        }
        while($z<=$x) {
            echo " ";
            $z++;
        }
        $x++;
        echo "\n";
    }


?>