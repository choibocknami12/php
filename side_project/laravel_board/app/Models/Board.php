<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    // 프라이머리키 설정을 해주지 않으면 id값이 자동으로 프라이머리키로 인식하기 때문에
    protected $primaryKey = 'b_id';
}
