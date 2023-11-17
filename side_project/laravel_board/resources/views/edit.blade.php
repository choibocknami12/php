@extends('layout.layout')

@section('title', 'List')

@section('main')

<main>

	<div class="modal-content">
		<form action="{{route('board.update', ['board' => $data->b_id])}}" method="POST" >
			@include('layout.errorlayout')
			@csrf
			@method('PUT')
			<div class="modal-header">
				<input type="text" name="b_title" value="{{$data->b_title}}" class="form-control" placeholder="제목을 입력하세요.">
			</div>

			<div class="modal-body">
				<textarea class="form-control" name="b_content" cols="30" rows="10" placeholder="내용을 입력하세요.">{{$data->b_content}}</textarea>
				<br><br>
			</div>

			<div class="modal-footer">
				<a href="{{route('board.show', ['board' => $data->b_id])}}" class="btn btn-secondary" data-bs-dismiss="modal">닫기</a>
				<button type="submit" class="btn btn-primary" data-bs-dismiss="modal">수정</button>
			</div>
		</form>
	</div>

</main>

@endsection