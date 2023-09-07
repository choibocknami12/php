-- view 
-- 가상의 테이블. 보안과 사용자의 편의성을 높이기 위해 사용
-- view 생성
-- create [or replace] view명
-- as
-- 	select 문
-- ;
-- [or replace] 기존의 뷰가 있을 때 덮어쓰기를 합니다.

-- 재직중인 사람들의 정보
SELECT emp.emp_no, CONCAT(emp.first_name, ' ',emp.last_name) AS fullname, emp.birth_date, emp.gender, emp.hire_date, tit.title	
FROM employees emp
	INNER JOIN titles tit
		ON emp.emp_no = tit.emp_no
		AND tit.to_date >= NOW();
		
		
CREATE VIEW view_employed_emp
AS
	SELECT emp.*
		,tit.title
	FROM employees emp
		JOIN titles tit
			ON emp.emp_no = tit.emp_no
			AND tit.to_date >= NOW();

SELECT * FROM view_employed_emp;