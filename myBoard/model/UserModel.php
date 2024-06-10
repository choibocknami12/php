<?php

namespace model;

class UserModel extends ParentsModel {
	// 특정 유저 조회하는 메소드
	public function getUserInfo($arrUserInfo, $pwFlg = false) { // pw를 안받으면 false로 세팅
		$sql =
			" SELECT "
			."		* "
			." FROM user "
			." WHERE "
			." user_id = :user_id ";

		$prepare = [
			":user_id" => $arrUserInfo["user_id"]
		];

		// PW 추가처리
		if($pwFlg) {
			$sql .= " AND u_pw = :u_pw ";
			$prepare[":user_pw"] = $arrUserInfo["user_pw"];
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
}