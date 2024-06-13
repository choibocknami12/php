<?php

namespace controller;

use model\BoardModel;

class BoardController extends ParentsController {

    protected $boardInfo;
    protected $boardTitle;

    protected function listGet() {

        return "view/list.php";
    }
}