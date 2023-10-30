<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/homework/src");
define("ERROR_MSG_PARAM", "%s : 필수 입력 사항입니다.");
require_once(ROOT."/lib/db_lib.php");



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/homework/src/css/common.css">
    <title>update_page</title>
</head>
<body>
    
    <form action="" method="post">
        <table>
            <input type="hidden" name="id" value="">
            <input type="hidden" name="page" value="">

            <tr>
                <th>글번호</th>
                <td><?php echo $item["id"]; ?></td>
            </tr>
            <tr>
                <th>제목</th>
                <td><input type="text" name="title" value="<?php echo $item["title"]; ?>"></td>
            </tr>
            <tr>
                <th>내용</th>
                <td><textarea name="memo" id="memo" cols="30" rows="10"><?php echo $item["memo"]?></textarea></td>
            </tr>

        </table>
    </form>
        <div>
            <button type="submit">수정</button>
            <a href="/homework/src/list.php/?page=<?php echo $id; ?>&page=<?php echo $page; ?>">취소</a>
        </div>
    
</body>
</html>