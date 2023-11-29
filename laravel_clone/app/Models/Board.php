<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Board extends Model
{
    use HasFactory, SoftDeletes;

    // protected $table = 'boards';

    // protected $primarkey = 'b_id';

    // // protected $fillable = [

    // // ];

    // public $timestamps = true;
}
