@extends('layout.layout')

@section('main')

	<div class="mainImg">
		<img src="/img/main_01.gif" alt="" width="100%">
	</div>

		<div class="mainProduct">
			@forelse($data as $item)
			
			<div class="box">

				<a href="{{route('show', ['p_id' => $item->p_id])}}">
					<img src="./img/main_02.jpg" alt="">
					<p>{{$item->p_name}}</p>
					<span>{{$item->p_price}}</span>
				</a>
			
			</div>
		@empty
			
		@endforelse
		</div>
@endsection