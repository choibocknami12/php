<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::prefix('/product')->group( function() {
//     Route::get('/', [ProductController::class,'productIndex']);
// });

Route::get('/main', function () { // 경로지정. http://127.0.0.1:8000/api/main
    return view('main'); // view의 main페이지 띄워라
});

// 파라미터가 있는 형태 >>파라미터가 없으면 주소창에서 연결안됨
// 파라미터에 null 추가하면 빈값으로도 가능함.
// Route::get('/users/{name}', function($name = null) {
//     return '안녕,'.$name;
// });