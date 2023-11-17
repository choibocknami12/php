<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id(); // id
            $table->string('content', 255); // 내용. 라라벨에서 string하면 255 자동으로 잡음 
            $table->char('completed', 1); // 완료여부
            $table->timestamp('completed_at')->nullable(); // 기본이 not null이라서 null허용해야함
            $table->timestamps();
            $table->softDeletes(); // DELETE만들어줌(그 논리삭제해주는거)
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
};
