<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="/css/pethRoomMain.css">
	<link rel="stylesheet" href="/css/pethroomLogin.css">
	<link rel="stylesheet" href="/css/pethroomRegist.css">
	<link rel="stylesheet" href="/css/pethroomDetail.css">
	<title>@yield('title', 'PETHROOM')</title>
	<script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
	@include('layout.header')

	@yield('main')

	@include('layout.footer')
</body>
</html>