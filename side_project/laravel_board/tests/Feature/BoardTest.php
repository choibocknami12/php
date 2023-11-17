<?php

namespace Tests\Feature;

// 테스트 완료 후 초기상태로 되돌려줌
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BoardTest extends TestCase
{
    // php artisan make:test 테스트파일명
    // 테스트 파일명의 끝은 Test로 끝날 것.
    
    use RefreshDatabase; // 테스트 완료 후 DB 초기화를 위한 트레이드
    
    // 게스트로 리다이렉트 했을 때
    // 명령어 : php artisan test
    public function test_index_게스트_리다이렉트() {
        
    }
}
