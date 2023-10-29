<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                <td><input type="text" name="title" value="<?php echo $item["id"]; ?>"></td>
            </tr>
            <tr>
                <th>글번호</th>
                <td><?php echo $item["id"]; ?></td>
            </tr>

        </table>
    </form>

    
</body>
</html>