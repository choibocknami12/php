-- Delet 매우 조심해서 사용! select로 내가 삭제하고자 하는 데이터가 맞는지 확인 후 실행하면 좋다.
-- where절 부터 쓰는 연습하자.


INSERT INTO departments (
	dept_no
	,dept_name
)
VALUES (
	'd099'
	,'NEW'
);


-- DELETE FROM 테이블명
-- where 조건

DELETE FROM departments
WHERE dept_no = 'd099';