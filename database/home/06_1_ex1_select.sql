-- 1. 직책테이블의 모든 정보 조회.o

SELECT *
FROM titles ;

-- 2. 급여가 60,000이하인 사원의 사번 조회.o

SELECT emp_no
FROM salaries
WHERE salary <= '60000';
-- 문자만 '' 홑따옴표 사용함.

-- 3. 급여가 60,000에서 70,000인 사원의 사번 조회.o

SELECT emp_no
FROM salaries
WHERE salary BETWEEN '60000' AND '70000';

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
-- 값이 틀렸음. 왜냐면 엔지니어만 나올것
	
SELECT emp_no, title
FROM titles
WHERE title LIKE ('%engineer%');
	
-- 6. 사원의 이름을 오름차순으로 정렬해서 조회.o
SELECT *
FROM employees
ORDER BY first_name ASC ;	
-- 이것도 틀림!
SELECT first_name
FROM employees
order by first_name ASC;

-- 7. 사원별 급여의 평균을 조회.o

SELECT emp_no, AVG(salary)
FROM salaries 
GROUP by emp_no ;

-- 8. 사원별 급여의 평균이 30,000~50,000인 사원번호와 평균급여 조회.o

SELECT emp_no, AVG(salary) AS sal_avg
FROM salaries 
GROUP by emp_no
HAVING sal_avg >= '30000' AND sal_avg <= '50000';

-- 9. 사원별 급여 평균이 70,000이상인 사원의 사번.이름.성.성별을 조회.


-- 10.현재 직책이 senior engineer 인 사원의 사원 번호와 성 조회.
SELECT emp_no, last_name
FROM employees
WHERE last_name
IN ( SELECT emp_no
		FROM titles
		WHERE title = 'senior engineer');