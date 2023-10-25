<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/homework/src");
//require_once(ROOT."lib/db_lib.php");

?>


<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/homework/src/css/common.css">
    <link rel="stylesheet" href="">
    <title>list_page</title>
</head>
<body>
    <div class="head text_align">
        <p>BOARD</p>
    </div>

    <div class="main text_align">
        <table class="text_align">
            <colgroup>
                <col width = "20%">
                <col width = "50%">
                <col width = "30%">
            </colgroup>
            <tr>
                <th class="list_title">번호</th>
                <th class="list_title">제목</th>
                <th class="list_title">작성일자</th>
            </tr>
            <tr>
                <td>아이우에오</td>
                <td>카키쿠케고</td>
                <td>사시수세소</td>
            </tr>
            <tr>
                <td>아이우에오</td>
                <td>카키쿠케고</td>
                <td>사시수세소</td>
            </tr>
            <tr>
                <td>아이우에오</td>
                <td>카키쿠케고</td>
                <td>사시수세소</td>
            </tr>
        </table>
    </div>

    <div class="btn text_align">
        <section>
            <a href="">이전</a>
            <a href="">1</a>
            <a href="">2</a>
            <a href="">3</a>
            <a href="">다음</a>
        </section>
    </div>
        <a href="" class="text_align">작성하기</a>
</body>
</html>