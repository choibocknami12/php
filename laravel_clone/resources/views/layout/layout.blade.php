<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="/css/pethRoomMain.css">
	<title>@yield('title', 'main')</title>
	
</head>
<body>
	@include('layout.header')

	@yield('main')
</body>
</html>