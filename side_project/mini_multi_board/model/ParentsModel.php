<?php

namespace model;

use PDO; // php의 기본 라이브러리에서 갖고옴
use Exception;

class ParentsModel {
    protected $conn;

    // 생성자
    public function __construct() {
        $db_dns = "mysql:host="._DB_HOST.";dbname="._DB_NAME.";charset="._DB_CHARSET;
        // 설정파일에 상수 호출해서 가져오는 것.
        
        try {
            $db_options = [
                PDO::ATTR_EMULATE_PREPARES => false
                ,PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // 에러가 뜨더라도 맞는건 처리하게 하는거?
                ,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC // 연상배열로 패치하도록 함.
            ];

            //PDO Class로 DB연동
            $this->conn = new PDO($db_dns, _DB_USER, _DB_PW, $db_options);    
        
        
        }   catch (Exception $e) {
            echo "DB Connect Error : ".$e->getMessage();
            exit();
        }
    }

    // DB 파기
    public function destroy() {
        $this->conn = null;        
    }

    // beginTransaction
    public function beginTransaction() {
        $this->conn->beginTransaction();
    }

    // commit
    public function commit() {
        $this->conn->commit();
    }

    // rollBack
    public function rollBack() {
        $this->conn->rollBack();
    }
}



