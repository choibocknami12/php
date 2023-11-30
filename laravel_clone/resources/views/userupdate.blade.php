@extends('layout.layout')

@section('title', 'update')

@section('main')

<div class="constr">
	<div class="regist-head">
        <span>회원정보 입력</span>
    </div>
		<form class="regist-body" method="POST" action="{{route('user.update', $user->u_id)}}">
		@include('layout.errorMsg')		
		@csrf
		@method('put')
			<div class="regist-main">
				<div class="regist-group">
					<div class="regist-cell">
						<input type="text" id="u_id" name="u_id" class="registInput" placeholder="아이디" required="" autofocus="">
						<!-- <span class="regist-remark regist-warn">
							아이디 중복 사용불가
						</span> -->
					</div>
				</div>
				<div class="regist-group">
					<div class="regist-cell">
						<input type="password" id="password" name="password" class="registInput" placeholder="비밀번호" required="">
					</div>
				</div>
				<div class="regist-group">
					<div class="regist-cell">
						<input type="password" id="passwordchk" name="passwordchk" class="registInput" placeholder="비밀번호 확인" required="">
					</div>
				</div>
				<div class="regist-group">
					<div class="regist-cell">
						<input type="tel" id="tel" name="tel" class="registInput" placeholder="연락처" required="">
					</div>
				</div>
				<div class="regist-group">
					<!-- <label class="regist-label">
						<span class="regist-star">*</span>
						이름
					</label> -->
					<div class="regist-cell">
						<input type="text" class="registInput" id="name" name="name" placeholder="이름" required="">
					</div>
				</div>
				<div class="regist-group">
					<div class="regist-cell">
						
						<button type="submit" class="registBtn">수정</button>
						<a href="" class="registBtn">취소</a>
						
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection