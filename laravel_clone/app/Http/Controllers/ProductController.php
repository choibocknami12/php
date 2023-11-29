<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class ProductController extends Controller
{
    //
    public function productIndex() {
        // 게시글 가져오기

        $result = Product::all();

        //return view('main')->with('data' , $result['data']);
        return view('main',['data' => $result] );
    }

    public function productShow($id) {
        // Product 모델에서 p_id와 일치하는 id값을 찾아 첫번째 레코드를 가져오게함.
        $result = Product::where('p_id', $id)->first(); 

        // 첫번째 레코드 값을 datailboard뷰로 전달하는데, $result에 담긴 값을 'data'로 전달한다.
        // return view('detailboard', ['data' => $result]);
        // 아래위 결국 같은거아님? 근데 아깐 왜 안댐? 
        //'detailboard' 뷰로 $result 변수를 'data'라는 이름으로 전달하여 해당 뷰에서 이 데이터를 사용한다.
        return view('detailboard')->with('data', $result);
    }
}
