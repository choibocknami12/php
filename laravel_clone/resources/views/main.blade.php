@extends('layout.layout')

@section('main')

	<div class="mainImg">
		<img src="./img/main_01.gif" alt="" width="100%">
	</div>

		<div class="mainProduct">
		@forelse($data as $item)	
			
			<div class="box">
				<a class="text-decoration-none" style="color: #1c3761;" href="{{route('show', ['p_id' => $item->p_id])}}">
					<img src="{{$item->p_img}}" alt="">
					<p>{{$item->p_name}}</p>
					<span>{{$item->p_price}}</span>
				</a>
			</div>
		@empty
			
		@endforelse
		</div>
@endsection