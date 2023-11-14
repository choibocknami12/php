<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BoardController extends Controller
{
    public function index() {
        // 쿼리 빌더 (가장 기본 형태)
        $result = DB::select('select * from boards');
        $result = DB::select('select * from boards limit :no', ['no' => 1]);
        $result = DB::select('select * from boards limit ? offset ?', [2, 10]);

        // 카테고리가 3,6,7인 게시글의 수를 출력해주세요.
        $arr = [3,6,7];
        $result = DB::select(
                'select count(id) 
                from boards 
                where categories_no = ? 
                or categories_no = ? 
                or categories_no = ?'
                , $arr);
        // $result = DB::select('select count(id) from boards where categories_no in(?,?,?), $arr);
        // 카테고리별 게시글 갯수를 출력해주세요.
        $result = DB::select('SELECT count(categories_no) cnt FROM boards GROUP BY categories_no');        
        
        // 위에거에 카테고리 명도 같이 출력
        $result = DB::select(
                'SELECT 
                    ca.no
                    ,ca.name
                    ,COUNT(ca.no)
                FROM boards bo
                    JOIN categories ca
                        ON bo.categories_no = ca.no
                GROUP BY ca.no, ca.name 
                '
            ); //문법임. 그룹바이에서 사용한거 셀렉트에 써줘야함.
        
        // -------------------insert
        $sql = 
            'INSERT INTO boards(title, content, created_at, updated_at, categories_no)
            VALUES(?, ?, ?, ?, ?)
            ';
        $arr = [
            '제목1'
            ,'내용내용1'
            ,now()
            ,now()
            ,'0'
        ];
        // DB::beginTransaction();
        // DB::insert($sql, $arr);
        // DB::commit();
        // 이거 열려있으면 계속 삽입됨.

        $result = DB::select('SELECT * FROM boards ORDER BY id DESC LIMIT 1');

        // -------------------update
        // DB::beginTransaction();
        // DB::update('UPDATE boards SET title = ?, content = ? WHERE id = ?'
        //         , ['업데이트1', '업업', $result[0]->id]);
        // DB::commit();

        // -------------------delete
        // DB::beginTransaction();
        // $result = DB::delete('DELETE FROM boards WHERE id = ?'
        //         , [$result[0]->id]);
        // DB::commit();

        // 쿼리 빌더 체이닝 : orm에서는 위처럼 사용할 수 없음?
        // select * from boards where id = 300;
        // 전체선택자(*) 안쓰는 이유는 디폴트값이 *로 되어있음
        $result = DB::table('boards')->where('id', '=', 300)->get();

        // select * from boards where id = 300 or id = 400;
        // or 는 orwhere, and는 where그대로 사용
        $result = DB::table('boards')
                    ->where('id', '=', 300)
                    ->orwhere('id', '=', 400)
                    ->get();

        // select * from boards where id = 300 or id = 400 order by id DESC;
        $result = DB::table('boards')
                    ->where('id', '=', 300)
                    ->orwhere('id', '=', 400)
                    ->orderBy('id', 'desc')
                    ->get();

        // select * from categories where no in (?, ?, ?);
        $result = DB::table('categories')
                    ->whereIn('no', [1,2,3])
                    ->get();

        // select * from categories where no not in (?, ?, ?);
        $result = DB::table('categories')
                    ->whereNotIn('no', [1,2,3])
                    ->get();

        // first() : limit1와 비슷하게 동작
        $result = DB::table('boards')->orderBy('id', 'desc')->first();

        // count() : 결과의 레코드 수를 반환
        $result = DB::table('boards')->count();

        // max() : 해당 컬럼의 최대값
        $result = DB::table('boards')->max('id');

        // 타이틀, 내용, 카테고리명 100개까지 출력
        $result = DB::table('boards')
                ->select('boards.title','boards.content','categories.name')
                ->join('categories','categories.no','boards.categories_no')
                ->limit(100)
                ->get();

        // 카테고리별 게시글 갯수와 카테고리명을 출력해 주세요.
        $result = DB::table('categories')
                ->select('categories.no','categories.name', DB::raw('count(categories.no)'))
                ->join('boards','categories.no','boards.categories_no')
                ->groupBy('categories.no','categories.name')
                ->get();

        return var_dump($result);
        // return var_dump($result[0])->id; // 이런식으로 클래스처럼 사용
    }
}
