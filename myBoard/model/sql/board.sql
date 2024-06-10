CREATE TABLE board(
	id INT PRIMARY KEY AUTO_INCREMENT
	,u_pk INT NOT NULL
	,b_type CHAR(1) NOT NULL
	,b_title VARCHAR(30) NOT NULL
	,b_content VARCHAR(1000) NOT NULL
	,b_img VARCHAR(50)	 
	,create_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,deleted_at DATETIME
);

INSERT INTO board(u_pk, b_type, b_title, b_content)
VALUES('1', '0', '관리자가 쓴 제목1', '관리자가 쓴 내용1')
,('1', '0', '관리자가 쓴 제목2', '관리자가 쓴 내용2')
,('2', '1', '유저1이 쓴 제목1', '유저1이 쓴 내용1')
,('2', '1', '유저1이 쓴 제목2', '유저1이 쓴 내용2');
