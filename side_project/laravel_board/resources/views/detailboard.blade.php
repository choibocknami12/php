@extends('layout.layout')

@section('title', 'List')

@section('main')

<main>

	<div class="card">
		<div class="card-body">
			{{-- destroy에 세그먼트 파라미터넣게 셋팅이 되어있어서 안넣으면 에러가남 --}}
			<form action="{{ route('board.destroy', ['board' => $data->b_id]) }}" method="POST">
				{{-- 폼사용시 반드시 사용해줘야함. --}}
				@csrf 
				@method('delete')
			<h5 class="card-title">{{$data->b_title}}</h5>
				<p class="card-text">조회수 : {{$data->b_hits}}</p>
				<p class="card-text">{{$data->b_content}}</p>
				<p class="card-text">작성일 : {{$data->created_at}}</p>
				<p class="card-text">수정일 : {{$data->updated_at}}</p>
			
		
				<button type="submit" class="btn btn-danger">삭제</button>
				{{-- route의 웹 확인해보면 주소가 나옴. href작성시 확인 --}}
				<a href="{{route('board.edit', ['board' => $data->b_id])}}" class="btn btn-primary">수정</a>
				<a href="{{route('board.index')}}" class="btn btn-primary">닫기</a>
			</form>
		</div>
	</div>

</main>

@endsection