<?php

namespace model;

class UserModel extends ParentsModel {
    // 특정 유저를 조회하는 메소드
    public function getUserInfo($arrUserInfo, $pwFlg = false) {
        $sql = 
            " SELECT "
            ." * "
            ." FROM user "
            ." WHERE "
            ." u_id = :u_id ";

        $prepare = [
            ":u_id" => $arrUserInfo["u_id"]
        ];

        // pw 추가처리 , 비밀번호도 확인
        if($pwFlg) {
            $sql .= " AND u_pw = :u_pw ";
            $prepare[":u_pw"] = $arrUserInfo["u_pw"];
        }

        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($prepare);
            $result = $stmt->fetchAll();
            
            return $result;

        } catch(Exception $e) {
            echo "UserModel->getUserInfo Error : ".$e->getMessage();
            exit();
        }
    }

    // 유저 정보 인서트
    public function addUserInfo($arrAddUserInfo) {
        
            $sql =
                " INSERT INTO "
                ." user (u_id, u_pw, u_name) "
                ." VALUES "
                ." (:u_id, :u_pw, :u_name) " ;
    
            $prepare = [
                ":u_id" => $arrAddUserInfo["u_id"]
                ,":u_pw" => $arrAddUserInfo["u_pw"]
                ,":u_name" => $arrAddUserInfo["u_name"]
            ];
    
            try {
                $stmt = $this->conn->prepare($sql);
                $result = $stmt->execute($prepare);
                
                return $result;
    
            } catch(Exception $e) {
                echo "UserModel->addUserInfo Error : ".$e->getMessage();
                exit();
            }
        
    }

    // 유저 아이디 중복확인
    public function userChkInfo($u_id) {
        $sql = 
            " SELECT "
            ." count(u_id) as cnt "
            ." FROM user "
            ." WHERE "
            ." u_id = :u_id ";

        $prepare = [
            ":u_id" => $u_id
        ];

        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($prepare);
            $result = $stmt->fetchAll();
            
            return $result;

        } catch(Exception $e) {
            echo "UserModel->userChkInfo Error : ".$e->getMessage();
            exit();
        }
    }
}