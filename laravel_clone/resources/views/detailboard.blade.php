@extends('layout.layout')

@section('title', 'detail')

@section('main')

<div class="detailContent">
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
        </div>    
    
        <div id="tab">
            <Tab-Component></Tab-Component>
        </div>    
        
</div>

@endsection