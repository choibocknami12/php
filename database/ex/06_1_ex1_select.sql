-- SELECT [컬럼명] FROM [테이블명];
SELECT * FROM employees;
SELECT * FROM dept_emp;

-- 
SELECT first_name, last_name FROM employees;
SELECT emp_no, title FROM titles;

-- SELECT [컬럼명] FROM [테이블명] where [쿼리조건];
-- [쿼리조건]:컬럼명[><=] 조건값
SELECT * FROM employees WHERE emp_no = 10009;

SELECT * FROM employees WHERE first_name = 'Mary';
SELECT * FROM employees WHERE birth_date >= 19500101;

-- and 연산자
SELECT * 
FROM employees 
WHERE birth_date <= 19700101 
  AND birth_date >= 19650101;
  
SELECT *
FROM employees
WHERE first_name = 'mary'
	AND last_name = 'piazza';
	
SELECT *
FROM employees
WHERE first_name = 'mary'
	or last_name = 'piazza';

-- between 연산자는 속도가 느림. where () 부등호 값 and () 부등호 값 이거보다
SELECT *
FROM employees
WHERE emp_no BETWEEN 10005 AND 10010;

SELECT *
FROM employees
WHERE emp_no = 10005
   OR emp_no = 10010;
-- in()연산자. 데이터 조회시 이것도 느림   
WHERE emp_no IN (10005, 10010);  

-- 문자열 검색하는 방법. 
-- %는 무엇이든 허용한다는 의미가 됨.
-- like 도 느림
SELECT *
FROM employees
WHERE first_name LIKE('Ge%');
WHERE first_name LIKE('%ge');

SELECT *
FROM titles
WHERE title LIKE('staff%');

-- 부분 검색? _ 로 글자수 지정함.
SELECT *
FROM employees
WHERE first_name LIKE('___ge');

-- 정렬하는 방법
SELECT * FROM employees ORDER BY birth_date DESC;
-- birthdate값 오른차순으로 정렬되고 앞의 값에 따라 firstname 정렬되고 firstname에 따라 lastname이 정렬됨.
SELECT * FROM employees ORDER BY birth_date, FIRST_name;
SELECT * FROM employees ORDER BY last_name DESC, first_name, birth_date;

-- distinct 로 중복되는 레코드 없이 조회하는 방법.
SELECT * FROM salaries;
SELECT DISTINCT emp_no FROM salaries;
-- ex
SELECT emp_no FROM salaries WHERE emp_no = 10001;
SELECT DISTINCT emp_no FROM salasries WHERE emp_no = 10001;

INSERT INTO salaries VALUES (10001, 60117, 19860627, 19870626);
COMMIT;

-- <집계함수>
SELECT sum(salary) FROM salaries;
-- 현재 받고 있는 급여만 조회
SELECT * FROM salaries WHERE to_date >= 99990101;
-- 현재 받고 있는 총 급여의 합
SELECT SUM(salary) FROM salaries WHERE to_date >= 99990101;
-- 지금 받고 있는 가장 높은/낮은/평균  급여
SELECT MAX(salary) FROM salaries WHERE to_date >= 99990101;
SELECT min(salary) FROM salaries WHERE to_date >= 99990101;
SELECT AVG(salary) FROM salaries WHERE to_date >= 99990101;
-- 데이터의 총 합
SELECT COUNT(*) FROM employees;
-- 이름이 마리인 사람의 수
SELECT COUNT(*) FROM employees WHERE first_name = 'mary';
SELECT COUNT(emp_no) FROM employees WHERE first_name = 'mary';

-- 그룹으로 묶어서 조회
SELECT title, COUNT(title)
FROM titles
GROUP BY title;
-- 현재 재직중인 직원들의 직급별 수를 구하시오.
SELECT title, COUNT(title)
FROM titles
WHERE to_date >= 20230901
GROUP BY title;

SELECT title, COUNT(title)
FROM titles
WHERE to_date >= 20230901
GROUP BY title HAVING title LIKE('%staff');

-- as >> 임의로 컬럼명을 변경해줌
-- 변경해주고 싶은 컬럼뒤에 붙여주면 됨.
SELECT title, COUNT(title) AS cnt
FROM titles
WHERE to_date >= 20230901
GROUP BY title HAVING title LIKE('%staff');

-- concat() : 문자열을 합쳐주는 함수
SELECT CONCAT(first_name, ' ',last_name) AS full_name
FROM employees;

-- 여자 사원의 사번, 생일, 풀네임을 출력해주세요
SELECT emp_no, birth_date , CONCAT(first_name, ' ',last_name) AS FULL_NAME
FROM employees 
WHERE gender = 'F'
ORDER BY FULL_NAME;

-- limit 출력 갯수 제한
-- limit n offset n : n번째 부터 n개 만큼 출력
SELECT *
FROM employees
ORDER BY emp_no
LIMIT 10 OFFSET 10;

-- 재직중인 사원들 중 급여가 상위 5위 까지 출력해 주세요
SELECT *
FROM salaries
WHERE to_date = 99990101
ORDER BY salary desc
LIMIT 5 ;


-- 서브쿼리 : 쿼리 안에 또다른 쿼리가 있는 형태
SELECT *
FROM employees
WHERE emp_no = 110114;
-- d002 부서의 현재 매니저의 정보를 가져오고 싶다.
SELECT *
FROM employees
WHERE emp_no = (
	SELECT emp_no 
	FROM dept_manager 
	WHERE to_date >= 20230901 
	AND dept_no = 'd002'
	);

-- 현재 급여가 가장 높은 사원의 사번과 풀네임을 출력해주세요
SELECT emp_no, CONCAT(first_name, ' ',last_name) AS FULL_NAME
FROM employees
WHERE emp_no = (
	SELECT emp_no
	FROM salaries
	WHERE to_date >= 20230901
	ORDER BY salary DESC
	LIMIT 1
);

-- d001 매니저를 한번이라도 해본사람
-- 서브쿼리의 결과가 복수일 때 사용방법
SELECT emp_no, CONCAT(first_name, ' ',last_name) AS full_name
FROM employees
WHERE emp_no IN (
	SELECT emp_no
	FROM dept_manager
	WHERE dept_no = 'd001'
);

-- 현재 직책이 senior engineer인 사원의 사번과 생일을 출력해주세요	
SELECT emp_no, birth_date
FROM employees
WHERE emp_no
in (
	SELECT emp_no
	FROM titles
	WHERE title = 'senior engineer' AND to_date >= 20230901
);

-- 다중열 서브쿼리(여러개 칼럼(조건)이 적용되는 것을 가지고 올떄. 서브쿼리는 조건한가지를 집어낼때)
-- 현재 부서장
SELECT *
FROM dept_emp
WHERE (dept_no, emp_no) IN (
	SELECT dept_no, emp_no
	FROM dept_manager
	WHERE to_date >= NOW()
);


-- select 절에 사용하는 서브쿼리
-- 사원의 현재 급여, 현재 급여를 받기시작한 일자,풀네임을 출력해주세요.
SELECT
	sal.salary
	, sal.from_date
	,(
		SELECT CONCAT(emp.first_name, ' ',emp.last_name)
		FROM employees AS emp
		WHERE sal.emp_no = emp.emp_no
	) AS full_name
FROM salaries AS sal
WHERE sal.to_date >= NOW();	

-- from절에 오는 서브쿼리
SELECT emp.*
FROM (
	SELECT *
	FROM employees
	WHERE gender = 'm'
) AS emp;


-- 0904tng

-- 1. 직책테이블의 모든 정보 조회.o

SELECT *
FROM titles ;

-- 2. 급여가 60,000이하인 사원의 사번 조회.o

SELECT emp_no
FROM salaries
WHERE salary <= '60000';

-- 3. 급여가 60,000에서 70,000인 사원의 사번 조회.o

SELECT emp_no
FROM salaries
WHERE salary BETWEEN 60000 AND 70000;

-- 4. 사원 번호가 10001, 10005인 사원의 모든 정보 조회 o

SELECT *
FROM employees
WHERE emp_no = '10001'
	or emp_no = '10005';
	
SELECT *
FROM employees
WHERE emp_no IN ('10001','10005');
	
-- 5. 직급명에 engineer 가 포함된 사원의 사번과 직급을 조회.o

-- SELECT emp_no, title
-- FROM titles
-- WHERE emp_no
-- IN (
-- 	SELECT emp_no
-- 	FROM titles
-- 	WHERE title = 'engineer' );
	
SELECT emp_no, title
FROM titles
WHERE title LIKE ('%engineer%');
	
-- 6. 사원의 이름을 오름차순으로 정렬해서 조회.o
SELECT *
FROM employees
ORDER BY first_name ASC ;	

-- 7. 사원별 급여의 평균을 조회.o

SELECT emp_no, AVG(salary)
FROM salaries 
GROUP by emp_no ;

-- 8. 사원별 급여의 평균이 30,000~50,000인 사원번호와 평균급여 조회.o

SELECT emp_no, AVG(salary) AS sal_avg
FROM salaries 
GROUP by emp_no
HAVING sal_avg >= 30000 AND sal_avg <= 50000;

-- 9. 사원별 급여 평균이 70,000이상인 사원의 사번.이름.성.성별을 조회.


-- 10.현재 직책이 senior engineer 인 사원의 사원 번호와 성 조회.
SELECT emp_no, last_name
FROM employees
WHERE last_name
IN ( SELECT emp_no
		FROM titles
		WHERE title = 'senior engineer');
		
		
		
		