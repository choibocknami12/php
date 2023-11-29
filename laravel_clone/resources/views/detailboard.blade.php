@extends('layout.layout')

@section('title', 'detail')

@section('main')

<div>
        <div class="datailImg">
            <img src="/img/detail_01.jpg" alt="">
        </div>
        <div>
            <h1>{{$data->p_name}}</h1>
            <h1>\{{$data->p_price}}</h1>
            <h1>{{$data->p_content}}</h1>    
        </div>
</div>

@endsection