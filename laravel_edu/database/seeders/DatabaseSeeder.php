<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // 더미 데이터 삽입용 팩토리 호출
        // 한번에 너무 많은 데이터삽입은 컴퓨터 용량에 따라 시간차이 많이 남. 그래서 와일문사용
        $cnt = 0;
        while($cnt < 60) {
            \App\Models\Board::factory(10)->create();
            $cnt++;
        }
        
    }
}
