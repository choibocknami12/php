CREATE TABLE members (
	mem_no INT PRIMARY KEY AUTO_INCREMENT
	,id VARCHAR(30) UNIQUE NOT NULL 
	,u_name VARCHAR(30) NOT NULL 
	,addr VARCHAR(100) NOT NULL 
);
-- 부여하는 방식이 다른것. UNIQUE 로 붙여도 되지만
-- ,CONSTRAINT Uk_members_id unique KEY(id)
-- 이렇게 지정해줄수 있는것임.

CREATE TABLE points (
	mem_no INT PRIMARY KEY 
	,pt INT NOT NULL DEFAULT(0)
	,CONSTRAINT fk_points_mem_no FOREIGN KEY(mem_no)
		REFERENCES members(mem_no) ON DELETE CASCADE 
);

CREATE TABLE orders (
	order_no INT PRIMARY key
	,mem_no INT NOT NULL 
	,product INT NOT NULL 
	,price INT NOT NULL
	,item_no INT NOT NULL
	,CONSTRAINT fk_orders_mem_no FOREIGN KEY(mem_no)
		REFERENCES members(mem_no) ON DELETE CASCADE 
	,CONSTRAINT fk_orders_item_no FOREIGN KEY(item_no)
		REFERENCES item(item_no) ON DELETE NO ACTION 
);
-- 참조할 테이블을 먼저 만들어야 테이블 생성이 가능함. 여기서는 item테이블이 먼저 만들어져야 orders 테이블이 생성됨.

CREATE TABLE item (
	item_no INT PRIMARY KEY 
	,item_name VARCHAR(100) NOT NULL 
	,item_pri INT NOT NULL 
);

INSERT INTO members(id, u_name, addr)
VALUES ('admin','meerkat','korea deagu');

INSERT INTO points(mem_no)
VALUES (1);

-- delete from members where mem_no = 1; >> 이렇게 하면 1번 회원정보가 삭제되고 cascade 붙여놓은 point도 사라지게 됨.


-- 테이블 변경
ALTER TABLE members ADD COLUMN age INT NOT NULL;

ALTER TABLE members MODIFY COLUMN u_name VARCHAR(50);
-- 줄일 땐 기존에 제한으로 맞춘 값이 있기때문에 줄이기 힘들어짐.
ALTER TABLE members DROP COLUMN age


DELETE FROM members WHERE mem_no = 1;
ROLLBACK;
-- 가능함.
TRUNCATE TABLE members
ROLLBACK 
-- 불가능함. truncate는 DBMS에서 이력을 저장하지 않음. 그래서 ROLLBACK이 안먹힘.
