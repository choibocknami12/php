<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('main');
})->name('main');
// 라우트를 불러내기 위해선 name이 반드시 필요하다!

// Route::get('/login', function () {
//     return view('login');
// });
// Route::get('/', function() {
//     return view('main');
// });

// Route::get('/main', [userController::class, 'mainget'])->name('main');

Route::get('/login', [userController::class,'loginget'])->name('login.get');

Route::post('/login', [userController::class, 'loginpost'])->name('login.post');

Route::get('/logout', [userController::class,'logoutget'])->name('logout.get');
// // Route::get('/regist', function () {
// //     return view('regist');
// // });

// // 회원가입 화면 이동
Route::get('/regist', [userController::class, 'registget'])->name('regist.get');

Route::post('/regist', [userController::class, 'registpost'])->name('regist.post');