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

-- 사원 정보 테이블에서 사원번호가 500001이상인 사원의 데이터를 모두 삭제.

DELETE FROM employees
WHERE emp_no >= 500001;

SELECT * FROM employees WHERE emp_no >= 500001;


