<?php

namespace model;

class BoardNameModel extends ParentsModel {
    public function getBoardNameList() {
        $sql = 
            " SELECT "
            ." b_type, b_name "
            ." FROM "
            ." boardname"
            ." ORDER BY b_type ASC "; // order by 꼭 해주어야함. db가 가장 최신순서로 표시하기 때문
    
        try {
            $stmt = $this->conn->query($sql);
            $result = $stmt->fetchAll();

            return $result;
        } catch(Exception $e) {
            echo "BoardNameModel->getBoardNameList Error : ".$e->getMessage();
            exit();
        }
    }


}