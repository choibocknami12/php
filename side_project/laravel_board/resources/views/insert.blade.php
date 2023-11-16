@extends('layout.layout')

@section('title', 'List')

@section('main')

<main>

	<div class="modal-content">
		<form action="{{route('board.store')}}" method="POST" >
			@csrf

			<div class="modal-header">
				<input type="text" name="b_title" class="form-control" placeholder="제목을 입력하세요.">
			</div>

			<div class="modal-body">
				<textarea class="form-control" name="b_content" cols="30" rows="10" placeholder="내용을 입력하세요."></textarea>
				<br><br>
			</div>

			<div class="modal-footer">
				<a href="{{route('board.index')}}" class="btn btn-secondary" data-bs-dismiss="modal">닫기</a>
				<button type="submit" class="btn btn-primary" data-bs-dismiss="modal">작성</button>
			</div>
		</form>
	</div>

</main>

@endsection