<?php
// 산술 연산자
// echo "더하기 : 1+1 =", 1 + 1, "\n";
// echo "빼기 : 1 - 1 = ", 1 - 1, "\n";
// echo "곱하기 : 2 x 3 = ", 2 * 3, "\n";
// echo "나누기 : 2 / 3 = ", 2 / 3, "\n";
// echo "나머지 : 2 % 3 = ", 2 % 3, "\n";
// 사칙연산은 순서대로 진행됨. 괄호, 순서 지켜서
// echo 10 - 5 * 8 / 10, "\n";



// 증가/감소 연산자 = 증감 연산자
// $num1 = 8;
// $num1++;
// echo $num1, "\n";
// $num1--;
// echo $num1;
// echo $num1++;
// echo $num1, "\n";
// echo ++$num1;
// echo $num1;


// 산술 대입 연산자
// $num = 5;
// $num = $num + 2;
// $num += 2;
// 사칙연산 다댐.
// echo $num;

// $tng_num = 10;

// echo $tng_num += 10;
// echo $tng_num /= 5;
// echo $tng_num -= 4;
// echo $tng_num %= 7;
// echo $tng_num *= 3;

// 비교연산자
// 이건 개발할때만 사용해야함..
// $num = 1;
// $str = '1' ;
// var_dump( 1 > 0 );

//var_dump($num == $str);  //값의 형태만 비교
//var_dump($num === $str); //값의 데이터 타입까지 비교.(완전비교, 되도록 이걸 사용)
//var_dump($num != $str);
//var_dump($num !== $str);

// 논리 연산자(and, or, not)

// and 연산자(&& 둘다 만족해야댐)
var_dump( 1 === 1 && 2 === 2);
var_dump( 1 === 1 && 2 === 1);

// or 연산자(|| 둘중 하나만 만족해도댐)
var_dump( 1 === 1 || 2 === 2);

// not 연산자(!() 연산의 결과를 반대로 뒤집는거. true가 나와야하는데 false가 나오고 그러는거.)
var_dump( !(1 === 1));


?>