<?php

namespace model;

class BoardModel extends ParentsModel {

    public function getBoardList($boardInfo) {
        $sql =
            " SELECT "
            ." id, u_pk, b_title, b_img, b_content, create_at, updated_at "
            ." FROM board "
            ." WHERE "
            ." b_type = :b_type "
            ." AND "
            ." deleted_at IS NULL ";

        $prepare = [
            ":b_type" => $boardInfo["b_type"]
        ];

        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($prepare);
            $result = $stmt->fetchAll();
            
            return $result;

        } catch(Exception $e) {
            echo "BoardModel->getboardList Error : ".$e->getMessage();
            exit();
        }

    }
}