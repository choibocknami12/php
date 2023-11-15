@extends('layout.layout')

@section('title', 'List')

@section('main')

<main>

	<div class="card">
		<div class="card-body">
			<h5 class="card-title">{{$data->b_title}}</h5>
				<p class="card-text">{{$data->b_hits}}</p>
				<p class="card-text">{{$data->b_content}}</p>
				<p class="card-text">{{$data->created_at}}</p>
				<p class="card-text">{{$data->updated_at}}</p>
				
			{{-- <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDetail">LOVE CAT</button> --}}
			<a class="btn btn-primary">LOVE CAT</a>
		</div>
	</div>

</main>

@endsection