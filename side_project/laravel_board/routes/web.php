<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BoardController;

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

// 유저 관련
Route::get('/', function () {
    return view('login');
});
// 로그인 화면 이동
Route::get('/user/login', [UserController::class, 'loginget'])->name('user.login.get'); 
// 로그인 처리
Route::middleware('my.user.validation')->post('/user/login', [UserController::class, 'loginpost'])->name('user.login.post');
// 로그아웃 처리
Route::get('/user/logout', [UserController::class,'logoutget'])->name('user.logout.get');

// 회원가입 화면 이동
Route::get('/user/registration', [UserController::class, 'registrationget'])->name('user.registration.get');
// 회원가입 처리
Route::middleware('my.user.validation')->post('/user/registration', [UserController::class, 'registrationpost'])->name('user.registration.post');

// GET|HEAD        user ..................... user.index › UserController@index      로그인 화면이동
// GET|HEAD        user/{user}/edit ..........user.edit › UserController@edit        로그인 처리

// POST            user ..................... user.store › UserController@store      회원가입 처리
// GET|HEAD        user/create .............. user.create › UserController@create    회원가입 화면이동

// GET|HEAD        user/{user} .............. user.show › UserController@show        회원정보 화면이동
// PUT|PATCH       user/{user} ...............user.update › UserController@update    회원정보 수정처리

// DELETE          user/{user} ...............user.destroy › UserController@destroy  회원탈퇴 처리




// 보드 관련
// 이렇게 설정해두면 라라벨이 알아서 생성해줌?
Route::middleware('auth')->resource('/board', BoardController::class);
// 게시글 가져오기
// GET|HEAD        board .......................... board.index › BoardController@index   
// 선택한 게시글 보여주기
// GET|HEAD        board/{board} ................ board.show › BoardController@show

// 작성페이지 이동
// GET|HEAD        board/create ................. board.create › BoardController@create  
// 작성페이지 작성 후 처리
// POST            board .........................board.store › BoardController@store 

// 수정 페이지 이동
// GET|HEAD        board/{board}/edit ........... board.edit › BoardController@edit 
// 수정 페이지 수정 후 처리
// PUT|PATCH       board/{board} ................ board.update › BoardController@update 

// 삭제 페이지 삭제(논리삭제?)
// DELETE          board/{board} ................ board.destroy › BoardController@destroy 

// 메소드           url                             name