<?php
// POST Method
// request할 때 데이터를 외부에서 볼수가 없다.

print_r($_POST);
$_POST["id"];


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

        <!-- <input type="text" name="user_name" placeholder ="id">
        <input type="password" name="user_password" placeholder="password" >
        <button type="submit">전송</button> -->
    
        <fieldset>
			<label for="id">ID : </label>
			<input type="text" id="id" name="id">
			<br>
			<label for="pw">PW : </label>
			<input type="text" id="pw" name="pw">
			<br>
			<button type="submit">전송</button>
		</fieldset>
        
    </form>
</body>
</html>