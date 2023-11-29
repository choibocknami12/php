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
}
