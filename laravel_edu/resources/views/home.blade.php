<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<h1>HOME</h1>
	<br>
	<form action="/home" method="POST">
		@csrf 
		<!-- 꼭 넣어야함. 안넣으면 에러남 : 왜인지는 나중에 알아보쟈 -->
		<button type="submit">post</button>
	</form>
	<br>
	<form action="/home" method="POST">
		@csrf
		@method('PUT')
		{{-- 프레임워크를 안쓰면 input hidden으로 put처리를 하고 
		라라벨에서는 위의  @method로 작성해줌.
		--}}
		<input type="hidden" name="myMethod" value="PUT">
		<button type="submit">PUT</button>
	</form>
	<br>
	<form action="/home" method="POST">
		@csrf
		@method('DELETE')
		
		<button type="submit">DELETE</button>
	</form>
</body>
</html>