@extends('layout.layout')

@section('title', 'List')

@section('main')
{{-- 메인영역을 상속받은 파일이므로 메인영역의 부트스트랩을 가지고 옴 --}}
{{-- 별도로 사용하는 파일(로그인,회원가입 등)이 있다면 이곳에 각자 사용함 --}}
	<main>
		@forelse($data as $item)

		<div class="card">
            <div class="card-body">
                <h5 class="card-title">{{$item->b_title}}</h5>
                    <p class="card-text">{{$item->b_content}}</p>
                {{-- <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDetail">LOVE CAT</button> --}}
				{{-- 세그먼트 파라미터 자리에 값설정? 해주어야함. 그래야 선택한 보드의 아이디들이 넘어와서 표시해줌. --}}
                <a class="btn btn-primary" href="{{route('board.show', ['board' => $item->b_id])}}">LOVE CAT</a> 
            </div>
        </div>
		@empty
			<div>게시글 없음</div>
		@endforelse
	
	</main>

	
	{{-- <div class="modal" id="modalDetail" tabindex="-1">
		@forelse($data as $item)
        <div class="modal-dialog modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
              	<h5 class="modal-title">{{$item->b_title}}</h5>
				<br>
				<p class="float-end">{{$item->b_hits}}</p>
              	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>{{$item->b_content}}</p>
				<br>
			  	<span>{{$item->created_at}}</span>
				<br>
				<span>{{$item->updated_at}}</span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">닫기</button>
            </div>
          </div>
        </div>
		@empty
		@endforelse
    </div> --}}

@endsection