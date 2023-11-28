<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class userController extends Controller
{
    public function loginget() {
        // 로그인 한 유저는 보드리스트로 이동
        if(Auth::check()) {
            return redirect()->route('main');
        }

        return view('login');
    }

    public function loginpost(Request $request) {
         // 유효성 검사 
        $validator = Validator::make(
        $request->only('u_id', 'password')
            ,[
                'u_id' => 'required|regex:/^[a-zA-Z0-9]+$/'
                ,'password' => 'required'
            ]
        );
        //var_dump("1");
        
        // 유효성 검사 실패 시 처리
        if($validator->fails()) {
            //console.log("2");
            // 실패시 다시 로그인페이지로 이동 하고 에러메세지 출력하게 함.
            return view('login')->withErrors($validator->errors());
        }
        //var_dump("2");
        $result = User::where('u_id', $request->u_id)->first();
        // 유저 정보 습득 : 비밀번호 확인(Hash 자체가 암호화처리된 것을 확인하는 메서드)
        if(!$result || !(Hash::check($request->password, $result->password))) {
            // 출력할 에러메세지 설정
            //console.log("3");
            $errorMsg = '아이디와 비밀번호를 확인해주세요.';
            // 정보가 일치하지 않을 시 돌아갈 페이지와 에러메세지 함께 출력
            return view('login')->withErrors($errorMsg);
        }
        //var_dump("3");
        // 유저 인증작업
        Auth::login($result);
        if(Auth::check()) {
            session($result->only('u_id'));
        } else {
            $errorMsg = '인증 에러가 발생했습니다.';
            return view('login')->withErrors($errorMsg);
        }

        // var_dump("4");
        // exit();
        return redirect()->route('main');
    }

    public function registget() {
        return view('regist');
    }

    public function registpost(Request $request) {
        // 유효성 검사
        $validator = Validator::make(
        $request->only('u_id','tel', 'password', 'passwordchk' ,'name')
            ,[
                'u_id' => 'required|regex:/^[a-zA-Z0-9]+$/'
                ,'tel' => 'required|regex:/^010[0-9]{8}$/'
                ,'name' => 'required|regex:/^[a-zA-Z가-힣]+$/|min:2|max:50'
                ,'password' => 'required|same:passwordchk'
            ]
        );
        // 바리데이션 에러 체크
        //var_dump($validator->errors());
        

         // 유효성 검사 실패 시 처리
        if($validator->fails()) {
            // 실패시 다시 회원가입페이지로 이동 하고 에러메세지 출력하게 함.
            return view('regist')->withErrors($validator->errors());
        }

        // only 안에 있는 값만 불러와서 새로운 배열을 생성해줌
        $data = $request->only('u_id', 'tel', 'password', 'name');
        
        // 비밀번호 암호화
        $data['password'] = Hash::make($data['password']);
        // var_dump($data); // 확인해보면 암호화되어있는것을 확인할 수 있음

        // 회원 정보 DB에 저장
        $result = User::create($data);
        //var_dump($result);

        return redirect()->route('login.get');
    }

    public function logoutget() {
        // 세션 파기
        Session::flush();
        // 로그아웃
        Auth::logout();
        return redirect()->route('login.get');
    }
}
