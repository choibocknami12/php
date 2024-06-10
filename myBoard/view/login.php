<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link href="https://webfontworld.github.io/gmarket/GmarketSans.css" rel="stylesheet">
    <link rel="stylesheet" href="/view/css/common.css">
	<title>로그인 페이지</title>
</head>
<body class="vh-100 vw-100">
	<?php require_once("view/inc/header.php"); ?>

	<main class="d-flex justify-content-center align-items-center h-75">
		<form style="width: 400px;" action="/user/login" method="POST">
			<div id="errorMsg" class="form-text text-danger">
				<?php echo count($this->arrErrorMsg) > 0 ? implode("<br>", $this->arrErrorMsg) : "" ?>
			</div>
			<div class="mb-3">
				<label for="user_id" class="form-label">아이디</label>
				<input type="text" class="form-control" id="user_id">
			</div>
			<div class="mb-3">
				<label for="user_pw" class="form-label">비밀번호</label>
				<input type="password" class="form-control" id="user_pw">
			</div>			
			<button type="submit" class="btn btn-primary">로그인</button>
		</form>
	</main>

	<?php require_once("view/inc/footer.php"); ?>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>