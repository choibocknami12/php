-- update 기본구조
-- update 테이블명
-- set (컬럼1=값1, 컬럼2=값2)
-- where 조건(필수!!)

UPDATE titles
SET 
	title = 'CEO'
WHERE emp_no = 500000;

COMMIT;

SELECT *
FROM titles WHERE emp_no = 500000;

-- 500000사원의 직급을 'staff' ,연봉을 '25000' 로 변경.

UPDATE titles
SET title = 'staff'
WHERE emp_no = 500000;

UPDATE salaries
SET salary = 25000
WHERE emp_no = 500000;

UPDATE employees
SET hire_date = 99990101
WHERE emp_no = 500000;

SELECT * FROM titles ORDER BY emp_no DESC;
SELECT * FROM salaries ORDER BY emp_no DESC;

UPDATE salaries
SET to_date = 99990101
WHERE emp_no = 500000;

-- 조건절에 다른 조건을 붙이면 함께 변경 시킬수 있음
-- ex ) where emp_no = 500000 or emp_no = 499999 이런식으로 넣으면 함께 변경됨.