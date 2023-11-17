<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;

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

//api용 route를 자동으로 생성해줌.
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// 라우트 그룹
Route::prefix('/item')->group(function () {
    // item 전체 조회
    Route::get('/', [ItemController::class,'index']); 
    // 게시글(item) 작성
    Route::post('/', [ItemController::class,'store']);
    // 수정
    Route::put('/{id}', [ItemController::class,'update']);
    // 삭제
    Route::delete('/{id}', [ItemController::class,'destroy']);
});

