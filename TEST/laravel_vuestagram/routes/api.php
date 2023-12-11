<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoardsController;

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
// prefix : 그룹안의 라우트에 특정 URI을 접두어로 지정할 때 사용

Route::middleware('apiChkToken')->prefix('boards')->group(function() {
    Route::get('/', [BoardsController::class, 'index']);
    // url : 'board/'
    Route::get('/{board}', [BoardsController::class, 'show']);
    // url : 'board/{board}'
    Route::post('/', [BoardsController::class, 'store']);
});

Route::fallback(function(){
    return response()->json([
        'code' => 'E03'
    ], 404);
});