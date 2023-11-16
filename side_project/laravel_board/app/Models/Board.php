<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // 물리적 삭제 안하기 위해 softdelete사용

class Board extends Model
{
    use HasFactory, SoftDeletes;
    // 프라이머리키 설정을 해주지 않으면 id값이 자동으로 프라이머리키로 인식하기 때문에
    protected $primaryKey = 'b_id';

    // 화이트 머시기
    protected $fillable = [
        'b_title', 'b_content'
    ];
}
