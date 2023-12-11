@extends('layout.layout')

@section('title', 'detail')

@section('main')

<div class="detailContent">    
    {{-- 기존 detailboard 블레이드 탬플릿 TabComponent로 이동 --}}
    <div id="app">
            <Tab-Component :flg-User="{{ $flgUser }}" :data="{{ $data }}"></Tab-Component>
    </div>
</div>

@endsection