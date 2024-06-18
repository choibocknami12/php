<?php

namespace controller;

use model\BoardModel;

class BoardController extends ParentsController {

    protected $boardInfo;
    protected $boardTitle;
    protected $boardType;

    protected function listGet() {

        // 파라미터 셋팅
        $b_type = isset($_GET["b_type"]) ? $_GET["b_type"] : "0";

        $boardInfo = [
            "b_type" => $b_type
        ];

        // 페이지 제목 셋팅 : 루프를 돌린 이유는 게시판이 10개 미만이어서.
        // 만약 받아오려는 값이 많다면 루프돌림 느림.
        foreach($this->arrBoardNameInfo as $item) {
            if($item["b_type"] === $b_type) {
                $this->boardTitle = $item["b_name"];
                $this->boardType = $item["b_type"];
                break;
            }
        }

        // 모델 인스턴스
        $boardModel = new BoardModel();

        // board 리스트 획득
        $this->boardInfo = $boardModel->getBoardList($boardInfo);

        // 사용한 모델 파기
        $boardModel->destroy();

        return "view/list.php";
    }
}