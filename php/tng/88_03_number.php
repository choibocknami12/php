<?php
//숫자 맞추기 게임
//총 5번의 기회 제공
//입력한 숫자가 정답보다 클 경우 "더 큼"출력
//입력한 숫자가 정답보다 작을 경우 "더 작음"출력
//정답일 경우 "정답" 출력하고 게임종료
//5번의 기회를 다 썼을 경우 정답과 "실패" 출력

//5회 제한을 어떻게 걸지?(마지막 문제해결은 안댐.)
$num = rand(1,100);
echo "HELLO, GUESS THE NUMBER\n";
echo "ENTER a number(1~100)\n";

while (true){
    $user = (int)fgets(STDIN);

    if($user > $num){
        echo "DOWN\n";
    }
    else if($user < $num){
        echo "UP\n";
    }

else if($user === $num){
    echo "congratulations ANSWER!";
    break;
}
}

//배운거
$i=0;
$num = rand(1,100);
echo "HELLO, GUESS THE NUMBER\n";
echo "ENTER a number(1~100)\n";

while (true){
    $user = (int)fgets(STDIN);
    
    if($user > $num){
        echo "DOWN\n";
    }
    else if($user < $num){
        echo "UP\n";
    }
    else if($user === $num){
        echo "congratulations ANSWER!";
        break;
    }

    $i++;
    if($i===5){
        echo "Opportunity is over";
        break;
    }
}



?>