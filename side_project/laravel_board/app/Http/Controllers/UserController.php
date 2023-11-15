<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth; // auth: 인증절차와 관련된 클래스
use App\Models\User;
use Illuminate\Support\Facades\Validator; // 유효성 검사를 위해
use Illuminate\Support\Facades\Session; // 로그아웃 처리를 위해 


class UserController extends Controller
{
     public function loginget() {
          // 로그인 한 유저는 보드리스트로 이동
          if(Auth::check()) {
               return redirect()->route('board.index');
          }

          return view('login');
     }
     public function loginpost(Request $request) {
          // 유효성 검사 
          $validator = Validator::make(
               $request->only('email', 'password')
               ,[
                    'email' => 'required|email|max:50'
                    ,'password' => 'required'
               ]
          );

          // 유효성 검사 실패 시 처리
          if($validator->fails()) {
               // 실패시 다시 로그인페이지로 이동 하고 에러메세지 출력하게 함.
               return view('login')->withErrors($validator->errors());
          }

          // 유저 정보 습득 : 이메일 확인
          $result = User::where('email', $request->email)->first();
          // 유저 정보 습득 : 비밀번호 확인(Hash 자체가 암호화처리된 것을 확인하는 메서드)
          if(!$result || !(Hash::check($request->password, $result->password))) {
               // 출력할 에러메세지 설정
               $errorMsg = '아이디와 비밀번호를 확인해주세요.';
               // 정보가 일치하지 않을 시 돌아갈 페이지와 에러메세지 함께 출력
               return view('login')->withErrors($errorMsg);
          }

          // 유저 인증작업
          Auth::login($result);
          if(Auth::check()) {
               session($result->only('id'));
          } else {
               $errorMsg = '인증 에러가 발생했습니다.';
               return view('login')->withErrors($errorMsg);
          }

          // 이부분이 location과 같은 역할을 함.
          return redirect()->route('board.index'); 
     }
     public function registrationget() {
          return view('registration');
     }
     public function registrationpost(Request $request) {
          // 유효성 검사
          $validator = Validator::make(
               // only : 
               $request->only('email', 'password', 'passwordchk' ,'name')
               ,[
                    'email' => 'required|email|max:50'
                    ,'name' => 'required|regex:/^[a-zA-Z가-힣]+$/|min:2|max:50'
                    ,'password' => 'required|same:passwordchk'
               ]
          );
           // 바리데이션 에러 체크
           // var_dump($validator->errors());
           // 유효성 검사 실패 시 처리
          if($validator->fails()) {
               // 실패시 다시 회원가입페이지로 이동 하고 에러메세지 출력하게 함.
               return view('registration')->withErrors($validator->errors());
          }

          // 데이터 베이스에 저장할 데이터 획득
          // only 안에 있는 값만 불러와서 새로운 배열을 생성해줌
          $data = $request->only('email', 'password', 'name');
          
          // 비밀번호 암호화
          $data['password'] = Hash::make($data['password']);
          // var_dump($data); // 확인해보면 암호화되어있는것을 확인할 수 있음

          // 회원 정보 DB에 저장
          $result = User::create($data);
          //var_dump($result);

          return redirect()->route('user.login.get');
     }
     public function logoutget() {
          // 세션 파기
          Session::flush();
          // 로그아웃
          Auth::logout();
          return redirect()->route('user.login.get');
     }

}
