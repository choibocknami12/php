@extends('layout.layout')

@section('title', 'regist')

@section('main')

<div class="constr">
	<div class="regist-head">
        <span>회원정보 입력</span>
    </div>
		<form class="regist-body">
			<div class="regist-main">
				<div class="regist-group">
					<div class="regist-cell">
						<input type="text" class="registInput" placeholder="아이디">
						<span class="regist-remark regist-warn">
							아이디 중복 사용불가
						</span>
					</div>
				</div>
				<div class="regist-group">
					<div class="regist-cell">
						<input type="password" class="registInput" placeholder="비밀번호">
					</div>
				</div>
				<div class="regist-group">
					<div class="regist-cell">
						<input type="password" class="registInput" placeholder="비밀번호 확인">
					</div>
				</div>
				<div class="regist-group">
					<div class="regist-cell">
						<input type="tel" class="registInput" placeholder="연락처">
					</div>
				</div>
				<div class="regist-group">
					<!-- <label class="regist-label">
						<span class="regist-star">*</span>
						이름
					</label> -->
					<div class="regist-cell">
						<input class="registInput" placeholder="이름">
					</div>
				</div>
				<div class="regist-group">
					<div class="regist-cell">
						<p>
							<a href="" class="registBtn">회원가입</a>
						</p>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection