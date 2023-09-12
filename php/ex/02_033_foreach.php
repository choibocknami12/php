<?php
//foreach
//배열을 이용해서 그 길이만큼 진행됨.

$arr = [1,2,3];
echo count($arr);

$arr2 = [
    "현희" => "불고기"
    ,"호철" => "김치"
    ,"휘야" => "못정함"
];

foreach ($arr2 as $key => $val) {
    echo "{$key} : {$val}\n ";
}

// 키가 필요 없을때
// foreach ($arr2 as $val) {
//     echo "{$val}\n";
// }

?>