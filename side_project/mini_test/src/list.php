<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/mini_test/src");


?> 

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poor+Story&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/mini_test/src/css/common.css">
    <title>리스트페이지</title>
</head>
<body>
    <div class="header text_align">
        <h1><a href="">최복나미 체크리스트</a></h1>
    </div>
    <div class="main text_align">
        <div class="list">
            <div>
                <input type="checkbox" id="list_1">
                <label for="list_1">화장실 교체</label>
            </div>
            <div>
                <input type="checkbox" id="list_2">
                <label for="list_2">물그릇 교체</label>
            </div>
            <div>
                <input type="checkbox" id="list_3">
                <label for="list_3">놀아주기</label>
            </div>
            <div>
                <input type="checkbox" id="list_4">
                <label for="list_4">사료확인</label>
            </div>
            <div>
                <input type="checkbox" id="list_5">
                <label for="list_5">털빗기</label>
            </div>
        </div>
    </div>
</body>
</html>