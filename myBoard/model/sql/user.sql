CREATE DATABASE myboard;
USE myBoard;

CREATE TABLE USER(
	id INT PRIMARY KEY AUTO_INCREMENT
	,user_id VARCHAR(20) NOT NULL
	,user_pw VARCHAR(256) NOT NULL
	,user_name VARCHAR(50) NOT NULL
	,create_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,deleted_at DATETIME
);

INSERT INTO USER(user_id, user_pw, user_name)
VALUES('admin', 'djemals1!', '관리자')
,('user1', 'djemals1!', '유저1');