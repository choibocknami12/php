-- join 이란?
-- 두개 이상의 테이블을 묶어 하나의 결과 집합으로 출력하는 것.

-- 1. inner join 구조 [무조건 알아야함]
--    SELECT 컬럼1, 컬럼2	...
-- 	FROM 테이블1 
-- 		INNER JOIN 테이블2
-- 		ON 조인 조건 (>> on 교집합 컬럼명)
-- 	[WHERE 검색조건]
--  >> 두테이블 중 교집합?인 부분만 가지고 옴

SELECT 
	emp.emp_no
	, emp.first_name
	, emp.last_name
	, dp.dept_no
FROM employees emp
	INNER JOIN dept_emp dp
		ON emp.emp_no = dp.emp_no
		AND dp.to_date >= NOW();
-- 조건절에 따라 값이 달라짐	

-- 2. outer join
--  기준이 되는 테이블의 레코드는 조인의 조건에 만족되지 않아도 출력
-- select 컬럼1, 컬럼2...
-- from 테이블1
--		[left | right] outer join 테이블2
-- 		on 조인 조건
-- where 검색조건

SELECT emp.emp_no, emp.first_name, dm.dept_no
FROM employees emp
	LEFT OUTER JOIN dept_manager dm
		ON emp.emp_no = dm.emp_no
		AND dm.to_date >= NOW()
WHERE emp.emp_no >= 110030
;


SELECT emp.emp_no, emp.first_name, dm.dept_no
FROM employees emp
	right OUTER JOIN dept_manager dm
		ON emp.emp_no = dm.emp_no
		AND dm.to_date >= NOW()
;

-- inner와 outer의 차이는 교집합 부분만 표시가 되며 outer는 기준이 되는 전체값에서 제외된 테이블은 null로 표시됨.

SELECT * FROM titles WHERE emp_no=10005;


-- 3. union

-- 4. self join : 자기 자신을 조인
-- select 컬럼1, 컬럼2 ...
-- from 테이블1
-- 	inner join 테이블1
-- where 검색조건;
SELECT emp.*
FROM employees emp1
	INNER JOIN employees emp2
		ON emp1.sup_no = emp2.emp_no;
		
--위의 쿼리는 슈퍼바이저인 사원의 모든 정보를 출력해 주세요.

ALTER TABLE employees ADD COLUMN sup_no INT(11);
SELECT * FROM employees;		