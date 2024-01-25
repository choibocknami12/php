<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Token;
use Exception;
use App\Exceptions\MyDBException;
use App\Http\Utils\TokenUtil;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class AuthController extends Controller
{
    protected $tokenDI;

    public function __construct(TokenUtil $tokenUtil) {
        $this->tokenDI = $tokenUtil;
    }
    //로그인 처리
    /** 
     * @param Illuminate\Http\Request $request 리퀘스트 객체
     * @return string json 엑세스토큰, 쿠키httponly 리플레쉬토큰
    */
    public function login(Request $request) {
        // throw new MyDBException('E80');
        // throw new Exception('E01');

        // DB 유저정보 획득
        $userInfo = User::where('u_id', $request->u_id)
                        ->where('u_pw', $request->u_pw)
                        ->first();

        // 유저정보 NULL확인
        if(is_null($userInfo)) {
            throw new Exception('E20');
        }

        // 토큰생성
        list($accessToken, $refreshToken) = $this->tokenDI->createTokens($userInfo);

        // 리플레쉬 토큰 DB저장
        $this->tokenDI->upsertRefreshToken($refreshToken);

        // 리턴
        return response()->json([
            'access_token' => $accessToken
        ], 200)->cookie('refresh_token',$refreshToken, env('TOKEN_EXP_REFRESH'));
    }

    /**
     * 엑세스 토큰 재발급
     * 
     * @param Illuminate\Http\Request $request 리퀘스트 객체
     * @return string json 엑세스토큰, 쿠키httponly 리플레쉬토큰
     */
    public function reisstoken(Request $request) {
        // 리프레쉬 토큰 획득
        $cookieRefreshToken = $request->cookie('refresh_token');

        // 리프레쉬 토큰 체크
        $this->tokenDI->chkToken($cookieRefreshToken);

        // 페이로드에서 u_pk 획득
        $u_pk = $this->tokenDI->getPayloadValueTokey($cookieRefreshToken, 'upk');

        // DB 유저 정보 획득
        $userInfo = User::where('u_pk', $u_pk)->first();

        // 유저정보 획득 체크
        if(is_null($userInfo)) {
            throw new Exception('E20');
        }

        // DB에 저장된 리프레쉬 토큰 검색
        $tokenInfo = Token::select('t_rt', 't_ext')
                            ->where('u_pk', $u_pk)
                            ->first();

        // 토큰 정보 획득 체크
        if(is_null($tokenInfo)) {
            throw new Exception('E04');
        }

        // 토큰 유효기간 체크
        if(strtotime($tokenInfo->t_ext) < time()) {
            throw new Exception('E02');
        }

        // 토큰 일치 체크
        if($cookieRefreshToken !== $tokenInfo->t_rt) {
            throw new Exception('E03');
        }

        // 토큰 새로 생성
        list($accessToken, $refreshToken) = $this->tokenDI->createTokens($userInfo);

        // 리프레쉬 토큰 저장
        $this->tokenDI->upsertRefreshToken($refreshToken);

        // 리턴
        return response()->json([
            'access_token' => $accessToken
        ], 200)->cookie('refresh_token',$refreshToken, env('TOKEN_EXP_REFRESH'));
    }
}
