<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
    return view('welcome');
});

// 라우트 정의
// 자바 스크립트에서 사용하던 콜백함수와 유사한 객체 >> 클로저(객체)

// 문자열 리턴
Route::get('/hi', function () {
    return '안녕하세요';
});

// 없는 뷰파일을 리턴할 때
Route::get('/myview', function () {
    return view('myview');
});

// http 메소드 대응하는 라우터
// 여러 라우터에 해당될 경우 가장 마지막에 정의 된것이 실행

// get 메소드 localhost/home 으로 접속했을 때 home이라는 뷰파일을 리턴해주세요.
Route::get('/home', function () {
    return view('home');
});

// post 메소드
Route::post('/home', function () {
    return '메소드 : post';
});

// put/fetch 같이 사용하지만 put을 제어용으로 많이 사용함.
// view 의 form에 [@method('put')] 추가
Route::put('/home', function () {
    return '메소드 : put은 뭘까';
});

// delete 요청
Route::delete('/home', function () {
    return '메소드 : delete';
});

// 라우터에서 파라미터 제어

// 쿼리스트링에 파라미터가 셋팅되서 요청이 올 때 파라미터 획득
Route::get('/query', function(Request $request) {
    return $request->id.", ".$request->name;
});

// url 세그먼트로 지정 파라미터 획득
// id부분 안적어주면 에러뜸.
Route::get('/segment/{id}', function($id) {
    return '세그먼트 파라미터 : '.$id;
});

// 2개 이상의 url 세그먼트로 지정 파라미터 획득
Route::get('/segment/{id}/{name}', function($id, $name) {
    return '세그먼트 파라미터 : '.$id.', '.$name;
});

Route::get('/segment/{id}/{name}', function(Request $request) {
    return '세그먼트 파라미터 : '.$request->id.", ".$request->name;
});

// 이경우는 잘 안씀. 상황에 따라 사용.
Route::get('/segment/{id}/{name}', function(Request $request, $id) {
    return '세그먼트 파라미터 : '.$request->id.", ".$id;
    //return var_dump($request);
});

// url 세그먼트로 지정 파라미터 획득 : 기본값 설정(디폴트 셋팅)
Route::get('/segment3/{id?}', function($id = 'base') {
    return 'segment3 : '.$id;
});

// 라우트 매칭 실패시 대체 라우트 정의(에러메세지 같은거임)
Route::fallback(function () {
    return '잘못된 경로를 입력하셨습니다.';
});

// 라우트의 이름 지정
Route::get('/name', function () {
    return view('name');
});

Route::get('/name/home/php504/root', function () {
    return '이름 없는 라우트';
});

Route::get('/name/home/php504/user', function () {
    return '이름 없는 라우트';
})->name('name.user'); //체이닝 기법



// 컨트롤러
// 커멘드로 컨트롤러 생성 : php artisan make:controller 컨트롤러명
use App\Http\Controllers\TestController;

Route::get('/test', [TestController::class, 'index'])->name('test.index');
//          경로       불러올 클래스, 메서드 명             기능명, 액션명

// 모든 액션 메소드를 자동으로 생성
// php artisan make:controller 컨트롤러명 --resource
use App\Http\Controllers\TaskController;
Route::resource('/task', TaskController::class);
//GET|HEAD        task .................... task.index › TaskController@index  
//POST            task .................... task.store › TaskController@store  
//GET|HEAD        task/create ............. task.create › TaskController@create  
//GET|HEAD        task/{task} ............. task.show › TaskController@show  
//PUT|PATCH       task/{task} ............. task.update › TaskController@update  
//DELETE          task/{task} ............. task.destroy › TaskController@destroy  
//GET|HEAD        task/{task}/edit ........ task.edit › TaskController@edit


// 블레이드 템플릿 용
Route::get('/child1', function() { //본인이 정해주는 url get으로 왔을 때 의미
    $arr = [
        'name' => '홍길동'
        ,'age' => 130
        ,'gender' => 'W'
    ];
    $arr2 = [];

    return view('child1')
            ->with('gender', '1') // 리턴값에 원하는 경로를 지정해줘야함.
            ->with('data', $arr) 
            ->with('data2', $arr2); 
});

Route::get('/child2', function() { 
    return view('child2'); 
});