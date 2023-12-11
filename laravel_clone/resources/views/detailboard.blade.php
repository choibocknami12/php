@extends('layout.layout')

@section('title', 'detail')

@section('main')

<!-- <div class="detailContent">
        <div class="detailImg">
            <img src="{{$data->p_img}}" alt="" width="500px" height="500px">
        </div>
        <div class="detailInfo">
            <h1>{{$data->p_name}}</h1>
            <p>{{$data->p_content}}</p>
            <h3>\{{$data->p_price}}</h3>
            
            <form action="#">
                <label>옵션선택</label>
                <select name="options" id="options">
                    <option value="">{{$data->p_name}} 6kg</option>
                    <option value="">{{$data->p_name}} 6kg*2</option>
                    <option value="">{{$data->p_name}} 14kg</option>
                </select>
                <button type="submit">장바구니</button>
            </form>
        </div>  -->

<div class="detailContent">    
    {{-- 기존 detailboard 블레이드 탬플릿 TabComponent로 이동 --}}
    <div id="app">
        <!-- Tab-Component : 이 화면(detailboard)에서 사용할 component 선언?지정? -->
        <!-- :flg-User="{{ $flgUser }}" :  선언한 component에 flg-User라는 props에 $flgUser(productController에 사용된 변수)의 값 전달 -->
        <!-- :data="{{ $data }}" : 이것도 마찬가지. 이름이 똑같다고 헷갈리지 말자. $붙은건 productController.php에 사용된 변수, 앞엔 component에 사용되는 변수 -->
            <Tab-Component :flg-User="{{ $flgUser }}" :data="{{ $data }}"></Tab-Component>
    </div>
</div>

@endsection