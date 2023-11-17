<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // auth를 사용해야하기때문에
use App\Models\Board;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Facades\Log; // 예외처리시 사용할때.

class BoardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        // * del 231116 미들웨어로 이관
        // 로그인 체크 : 로그인이 되었을 시 list페이지로 이동할 수 있고 로그인 안되면 못가게 막는것.
        // if(!Auth::check()) {
        //     return redirect()->route('user.login.get');
        // }

        // 게시글 가져오기
        $result = Board::get();
            
        return view('list')->with('data', $result);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 단순히 작성 페이지 이동
        return view('insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 작성
        
        // var_dump($request);
        // $result = Board::create(
        //     $request->only('b_title', 'b_content')
        // );

        // 위의 형태와 같음. 나중에 바리데이션하기위해 배열이 필요함.
        $arrData = $request->only('b_title','b_content');
        $result = Board::create($arrData);

        // save()를 이용하는 방법
        // $model = new Board($arrData);
        // $model->save();

        return redirect()->route('board.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 로그인 체크
        // if(!Auth::check()) {
        //     return redirect()->route('user.login.get');
        // }

        $result = Board::find($id);
        //var_dump($result);
        
        // 쿼리빌더 방식
        // use Illuminate\Support\Facades\DB
        // 게시글 데이터 획득
        // DB::table('boards')->where('b_id', $id)->get();
        // 아래는 orm방식으로 위의 결과와 같음.
        // Board::where('b_id', $id)->get(); 

        // 조회수 올리기
        $result->b_hits++; // 조회 1증가
        // 업데이트 처리
        $result->save(); 

        return view('detailboard')->with('data', $result); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //수정 페이지 이동

        // 조회(검색)한 id를 먼저 변수에 담아준다
        $result = Board::find($id);
        // with 사용 : 화면에 표시할 데이터를 함께 보내줘야함
        return view('edit')->with('data', $result); 
        //return '수정페이지';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $arrData = $request->only('b_title','b_content');
        $result = Board::find($id);
        $result->update($arrData);
        
        // 어떤 처리를 할땐 리턴뷰가 아닌 리다이렉트로 해주어야, 계속 처리가 안됨.
        return redirect()->route('board.show', $id);

        //$result = Board::find($id);
        //$result->b_title = $request->b_title;
        //$result->b_content = $request->b_content;
        //$result->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //삭제하기
        Board::destroy($id);
        //Board::find($id)->delete();
        //return var_dump($id);
        return redirect()->route('board.index');
        // 예외처리까지 한것.
        // try{
        //     DB::beginTransaction();
        //     Board::destroy($id);
        //     DB::commit();
        // } catch (Exception $e) {
        //     DB::rollBack();
        //     return redirect()->route('error')->withError($e->getMessage());
        // } finally {

        // }
        // return redirect()->route('board.index');
    }
}
