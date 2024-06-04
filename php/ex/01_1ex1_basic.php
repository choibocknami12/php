<?php
// echo를 좀더 많이 사용함. 속도가 더 빠름.
// echo '안녕 PHP'; 
// print '안녕 print';

// 변수 : 필요한 정보를 저장하는것?

// $num = 1;
// $str = '안녕, 변수';
// // 문자열 '',"" 둘다 사용가능함.
// $sum = $num + 5;
// $sum = $sum + $num;

// echo $sum;


 // while문으로 별찍기

//  $i = 1;
//  $star = "*";
//  while($i <= 5) {
//    $val = 1 + $i;
//     echo "{$val}*\n";
//    $i++;
//  }

// 	$base = 5;
// 	$line = $base;

// 		while ($line >= 1) {
//     $space = $line - 1;
//     $one_line = $base;

// 	while($one_line >= 1) {
// 		if($space >= 1) {
// 			echo " ";
// 		} else {
// 			echo "*";
// 		}
// 		$space--;
// 		$one_line--;
// 	}
//     echo "\n";
//     $line--;
// }


// for($i = 1; $i <= 5; $i++) {
// 	for($j = 0; $j <= 5; $j++) {
// 		if($j < $i) {
// 			echo "*";
// 		}
// 	}
// 	echo "\n";
// 	// echo "*";
// }

// for($i = 0; $i <= 5; $i++) {
// 	for($j = 0; $j < $i; $j++) {
// 		echo "*";
// 	}
// 	echo "\n";
// }

// for($a = 0; $a <= 5; $a++) {
// 	for($b = 5; $b > $a; $b--) {
// 		echo "*";
// 	}
// 	echo "\n";
// }

// $num = 5;
// for($i = 0; $i < $num; $i++) {

	
// 	for($z = 0; $z < $num; $z++) {
// 		if($z <= $cnt_space) {

// 		}
// 	}
// }

$num = 5;
for($i = 0; $i < $num; $i++) {
	for($z = $num - 1; $z >= 0; $z++) {
		if($z <= $i) {
			echo "*";
		}
		echo " ";
	}
}

?>