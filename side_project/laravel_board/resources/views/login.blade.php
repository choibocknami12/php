@extends('layout.layout')

@section('title', 'Login')

@section('main')
{{-- 메인영역을 상속받은 파일이므로 메인영역의 부트스트랩을 가지고 옴 --}}
{{-- 별도로 사용하는 파일(로그인,회원가입 등)이 있다면 이곳에 각자 사용함 --}}
	<main class="d-flex align-items-center justify-content-center h-75">
		<form style="width: 300px;" action="{{route('user.login.post')}}" method="POST">
			@include('layout.errorlayout')
			@csrf
			{{-- 위의 csrf의 기능 : input type="hidden" name="token" value="d;algkj;larhk;" --}}

			<div id="errorMsg" class="form-text text-danger"></div>
			<div class="mb-3">
				<label for="email" class="form-label">이메일</label>
				<input type="text" class="form-control" id="email" name="email">
			</div>
			<div class="mb-3">
				<label for="password" class="form-label">비밀번호</label>
				<input type="password" class="form-control" id="password" name="password">
			</div>
				<button type="submit" class="btn btn-dark">로그인</button>
	  	</form>
	</main>

@endsection