<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;
    // 모델 생성 : php atisan make:model 모델명 -mfs
    // [-mfs] 옵션으로 miaration, factory, seeder를 한번에 생성

    // 테이블 정의(정의하지 않을 경우 클래스 명의 복수형을 암묵적으로 인식)
    // protected $table = '테이블명';
    protected $table = 'boards';

    // pk정의 (정의하지 않을 경우 'id'컬럼을 pk로 인식)
    // protected $primaryKey = '정해놓은 pk 컬럼명';
    protected $primaryKey = 'id';

    // 대량 할당을 이용한 취약성 대책
    // 1. 화이트 리스트 방식 : 수정할 수 있는 컬럼을 설정
    // protected $fillable = ['컬럼1', '컬럼2'];
    // 2. 블랙 리스트 방식 : 수정할 수 없는 컬럼을 설정
    // protected $guarded = ['컬럼1', '컬럼2'];

    // 디폴트값 셋팅
    // public function __construct(array $attributes = [])
    // {
    //     parent::__construct($attributes);

    //     $this->attributes['created_at'] = now();
    //     $this->attributes['updated_at'] = now();
    // }
    // created_at, updated_at 디폴트값 셋팅
    public $timestamps = true;

}
