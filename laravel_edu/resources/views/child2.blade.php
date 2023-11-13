
{{-- 상속 --}}
@extends('inc.layout')

{{-- section : 부모 템플릿에 해당하는 yield 부분에 삽입 --}}
@section('title', '자식2 타이틀')

@section('main')

<span>구구단</span>
<br>
@for($num = 1; $num < 10; $num++) 
		<span>2 x {{$num}} = {{$num * 2}} <span>
		<br>
@endfor
<br>
@for($num = 1; $num < 10; $num++) 
		<span>{{$num}}단</span>
		{{-- <span>{{$num.'단'}}</span> --}}
		<br>
	@for($i = 1; $i < 10; $i++)
		<span>{{$num}} x {{$i}} = {{$num * $i}} <span>
			<br>
	@endfor
@endfor

@endsection