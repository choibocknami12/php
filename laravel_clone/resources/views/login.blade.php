@extends('layout.layout')

@section('title', 'login')

@section('main')
	<div class="wrapper">
		<form class="form-signin" method="POST" action="{{route('login.post')}}">
		@include('layout.errorMsg')	
		@csrf

			<div class="logoImg">      
				<img src="./img/logo.jpg" alt="">
			</div> 

			<div class="form-input">
				<input type="text" class="form-control" id="u_id" name="u_id" placeholder="ID" required="" autofocus="" />
				<br>
				<input type="password" class="form-control" id="password" name="password" placeholder="Password" required=""/>   
			</div>
			<div class="loginBtnDiv d-grid gap-2">
				<button class="loginBtn btn btn-lg btn-primary btn-block" type="submit">Login</button>   
				<button class="loginBtn btn btn-lg btn-success btn-block" type="submit">NAVER Login</button>   
			</div>
		</form>
	</div>
</body>
@endsection