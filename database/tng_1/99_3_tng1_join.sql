UPDATE user
SET u_name='갑갑이'
WHERE id=2;

DELETE FROM user
WHERE id=2;


SELECT *
FROM user
WHERE birth >= 20200101;


-- 이름에 '홍'이 포함되는 회원을 출력
SELECT *
FROM user
WHERE NAME LIKE '%갑';

-- 생일이 1950~2000 사람들을 검색
SELECT *
FROM user
WHERE birth BETWEEN 19500101 AND 20000101;

SELECT *
FROM user
WHERE birth >= 19500101 AND birth < 20010101;

-- 홍길동 회원의 주문이력을 출력해주세요
SELECT 
	usr.id
	,usr.name
	,dev.*
FROM user usr
	JOIN delivery dev
	ON usr.id = dev.u_id
WHERE NAME='홍길동';


-- 모든 주문 목록의 정보와 상품명과 가격을 함께 출력
SELECT 
	dev.id
	,dev.delivery_flg
	,dev.u_id 
	,dev.p_id 
	,pro.p_name 
	,pro.p_price 
	,usr.name
FROM delivery dev
	JOIN product pro
		ON dev.p_id = pro.id
	JOIN user usr
		ON usr.id = dev.u_id;
	
-- 가장 많이 주문된 상품의 이름과 가격을 출력해주세요, 가장 많이 사용됨
-- 통계같은거 내야할땐 group을 사용하는 경우가 많음.
SELECT p_id, COUNT(p_id)
FROM delivery
GROUP BY p_id;

SELECT pro.p_name
		,pro.p_price
		,g_dev.p_id
		,g_dev.cnt
FROM product pro
	JOIN (SELECT p_id, COUNT(p_id) cnt
			FROM delivery
			GROUP BY p_id
			ORDER BY con DESC 
			LIMIT 1
			) g_dev
	ON pro.id = g_dev.p_id;

-- '홍길동'유저가 가장 많이 주문한 상품은?