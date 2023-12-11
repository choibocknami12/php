<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
        $flgUser = 0;

        // Product 모델에서 p_id와 일치하는 id값을 찾아 첫번째 레코드를 가져오게함.
        $result = Product::where('p_id', $id)->first(); 
        // Log::debug("프로덕트 데이터 습득");
        
        // tabComponent에서 유저인증이 필요하여 코드 추가
        if(Auth::check()) {
            // Log::debug("로그인 인증일 시");
            $user = User::where('u_id', Auth::user()->u_id)->first();
            // Log::debug("product show Product u_id : ". $result->u_id);
            // Log::debug("product show get u_id : ". $user->u_id);
    
            if($result->u_id === $user->u_id) {
                // Log::debug("같은유저 플레그 true");
                $flgUser = 1;
            }
        }
        // Log::debug("리턴 플래그 : ".$flgUser );
        // Log::debug("json data : ", $result->toArray());

        // 첫번째 레코드 값을 datailboard뷰로 전달하는데, $result에 담긴 값을 'data'로 전달한다.
        // return view('detailboard', ['data' => $result]);
        // 'detailboard' 뷰로 $result 변수를 'data'라는 이름으로 전달하여 해당 뷰에서 이 데이터를 사용한다.
        // vue로 데이터를 넘겨줘야해서 제이슨으로 변경하여 값을 넘겨주고 배열로 값 보내줌.
        return view('detailboard')->with('data', json_encode($result->toArray()))->with('flgUser', $flgUser);
    }
}
