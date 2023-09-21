<?php
// POST Method
// request할 때 데이터를 외부에서 볼수가 없다.

print_r($_POST);


?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POST</title>
</head>
<body>
    <form action="/04_147_post.php" method="post">

        <input type="text" name="user_name" placeholder ="id">
        <input type="password" name="user_password" placeholder="password" >
        <button type="submit">전송</button>
    
    </form>
</body>
</html>