<?php
    //print_r($_SERVER);
    print_r($_GET);
    print_r($_POST);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="/99_03_edu.php" method="post">
         <!-- root주소는 설정파일에서 변경가능. -->
        <!-- <label for="">ID</label>
        <input type="text" name="user_id">
        <label for="">PW</label>
        <input type="password" name="user_pw">
        <br>
        <input type="hidden" name="meerkat">
        <button type="submit">post</button> -->
        <label for="id">ID</label>
        <input type="text" name="id" id="id">
        <br>
        <label for="pw">PW</label>
        <input type="password" name="pw" id="pw">
        <input type="hidden" name="name" value="미어캣">
        <button type="submit">post</button>
    </form>
</body>
</html>