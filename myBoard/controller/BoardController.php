<?php

namespace controller;

use model\BoardModel;

class BoardController extends ParentsController {
    public function listGet() {

        return "view/list.php";
    }
}