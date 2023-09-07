-- 1. 사원 정보테이블에 각자의 정보를 적절하게 넣어주세요.

INSERT INTO employees (
	emp_no
	, birth_date
	, first_name
	, last_name
	, gender
	, hire_date
)
VALUES (
	500001
	,19930624
	,'Hyunhee'
	,'Choi'
	,'F'
	,NOW()
);
-- 최대 사원번호 모를땐 >> values (
						-- 				(SELECT MAX(emp_no) +1 FROM employees)
-- 											)

-- 2. 월급,직책,소속부서 테이블에 각자의 정보를 적절하게 넣어주세요.

INSERT INTO salaries (
	emp_no
	, salary
	, from_date
	, to_date
)
VALUES (
	500001
	, 100000
	, NOW()
	, 99990101
);

INSERT INTO titles (
	emp_no
	, title
	, from_date
	, to_date
)
VALUES (
	500001
	, 'staff'
	, NOW()
	, 99990101
);

INSERT INTO dept_emp (
	emp_no
	, dept_no
	, from_date
	, to_date
)
VALUES (
	500001
	, 'd007'
	, NOW()
	, 99990101
);


-- 3. 짝의 것도 넣어주세요

INSERT INTO employees (
	emp_no
	, birth_date
	, first_name
	, last_name
	, gender
	, hire_date
)
VALUES (
	500002
	,19990521
	,'Hwiya'
	,'kang'
	,'F'
	,NOW()
);

INSERT INTO salaries (
	emp_no
	, salary
	, from_date
	, to_date
)
VALUES (
	500002
	, 2000000
	, NOW()
	, 99990101
);

INSERT INTO titles (
	emp_no
	, title
	, from_date
	, to_date
)
VALUES (
	500002
	, 'ceo'
	, NOW()
	, 99990101
);


INSERT INTO dept_emp (
	emp_no
	, dept_no
	, from_date
	, to_date
)
VALUES (
	500002
	, 'd007'
	, NOW()
	, 99990101
);


-- 4.나와 짝의 소속부서를 d009로 변경
-- 이전 데이터를 꼭 남겨두어야함. update로 오늘날짜 변경하고 새로운 부서삽입(insert into)
-- UPDATE dept_emp
-- SET dept_no = 'd009'
-- WHERE emp_no = 500002 ;
-- 
-- UPDATE dept_emp
-- SET dept_no = 'd009'
-- WHERE emp_no = 500001 ;
UPDATE dept_emp
SET to_date = NOW()
WHERE emp_no = 500002 AND dept_no = 'd002'

INSERT INTO dept_emp(
	emp_no
	,dept_no
	,from_date
	,to_date
)
VALUES (
	500002
	,'d0009'
	,NOW()
	,99990101
);

-- 5. 짝의 모든 정보를 삭제해주세요.
DELETE FROM dept_emp
WHERE emp_no = 500002;

DELETE FROM salaries
WHERE emp_no = 500002;

DELETE FROM titles
WHERE emp_no = 500002;

DELETE FROM employees
WHERE emp_no = 500002;
-- 왜 * <<이게 안되지?


-- 6. d009 부서의 관리자를 나로 변경해주세요.>> 왜 안바뀔까

UPDATE dept_manager
SET dept_no = 'd009'
WHERE emp_no = 500001;
-- 4번문제와 같음


-- 7. 오늘 날짜부로 나의 직책을 'senior engineer'로 변경해주세요.
UPDATE titles
SET title = 'senior engineer'
WHERE emp_no = 500001;
-- 4번 문제와 갔다

-- 8. 최고 연봉 사원과 최저연봉사원의 사번과 이름을 출력
-- SELECT emp.emp_no, CONCAT(emp.first_name, ' ',emp.last_name) AS fullname
-- FROM employees emp
-- 	JOIN salaries sal
-- 		ON emp.emp_no = sal.emp_no
-- 		and sal.to_date >= NOW()
-- 
-- SELECT MAX(sal.salary), emp.emp_no, CONCAT(emp.first_name, ' ',emp.last_name) AS fullname
-- FROM employees emp
-- 	JOIN salaries sal
-- 	ON emp.emp_no = sal.emp_no
-- WHERE sal.to_date >= NOW();
-- 
-- SELECT MAX(salary), emp_no, first_name
-- FROM salaries
-- WHERE to_date >= NOW();

SELECT emp.emp_no, CONCAT(emp.first_name, ' ',emp.last_name) AS fullname, salary
FROM employees emp
	JOIN salaries sal
		ON emp.emp_no = sal.emp_no
	WHERE salary = (SELECT MAX(salary) FROM salaries)
		OR salary = (SELECT Min(salary) FROM salaries);


SELECT emp.emp_no, emp.first_name, sal.salary
FROM employees emp
	JOIN salaries sal
		ON emp.emp_no = sal.emp_no
		AND (
			sal.salary = (SELECT salary FROM salaries ORDER BY salary LIMIT 1)
			or
			sal.salary = (SELECT salary FROM salaries ORDER BY salary DESC LIMIT 1)
		);
-- 		둘다 만족해야해서 and뒤에 괄호사용.
-- 속도 개선을 위해 index가 생성됨
CREATE INDEX idx_test ON salaries(salary);

-- 9. 전체 사원의 평균 연봉을 출력

SELECT AVG(sal.salary)
FROM salaries sal
	JOIN employees emp
	ON sal.emp_no = emp.emp_no;
-- WHERE to_date >= NOW();


-- 10. 사번이 499,975인 사원의 지금까지 평균 연봉 출력.

SELECT AVG(sal.salary)
FROM salaries sal
	JOIN employees emp
		ON sal.emp_no = emp.emp_no
WHERE emp.emp_no = 499975;