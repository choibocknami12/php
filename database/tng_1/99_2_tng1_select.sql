SELECT [DISTINCT] [칼럼명]
FROM [테이블명]
	JOIN [테이블명] ON [조인조건]
WHERE [쿼리조건]
GROUP BY [컬럼명] HAVING [집계함수 조건]
ORDER BY [컬럼명 ASC || 컬럼명 DESC]
LIMIT 출력수 [OFFSET 시작번호]
;
--인덱스: 목차를 만드는 기법--

--직책테이블의 모든 정보를 조회
SELECT *
FROM titles;

--급여가 60,000이하인 사원의 사번 조회
SELECT emp_no
FROM salaries
WHERE salary <= 60000 ;

--급여가 60,000에서 70,000인 사원의 사번 조회
SELECT emp_no
FROM salaries
WHERE salary >= 60000
AND salary <= 70000;

--사원번호가 10001, 10005인 사원의 모든 정보를 조회해 주세요
--얘는 왜 데이터가 안나오징?>> and가 아니라 or를 사용해야함
SELECT *
FROM employees
WHERE emp_no = 10001
or emp_no = 10005;

SELECT
	emp.*
	,tit.title
	,dmp.dept_no
	,sal.salary
FROM employees emp
	JOIN dept_emp dmp
		ON emp.emp_no = dmp.emp_no
		AND dmp.to_date >= NOW()
	JOIN titles tit
		ON emp.emp_no = tit.emp_no
		AND tit.to_date >= NOW()
	JOIN salaries sal
		ON emp.emp_no = sal.emp_no
		AND sal.to_date >= NOW()
WHERE 
	emp.emp_no = 10001
	OR emp.emp_no = 10005;

--직급명에 engineer가 포함된 사원의 사번과 직급을 조회
--여기서 확인 like >>
SELECT emp_no, title
FROM titles
WHERE title LIKE '%engineer%';

SELECT emp.emp_no
		,tit.title
FROM employees emp
	JOIN titles tit
		ON emp.emp_no = tit.emp_no
		AND tit.title LIKE '%engineer%'
		AND tit.to_date >= NOW();

--사원의 이름을 오름차순으로 정렬 조회: 정렬하면 order by떠올리기
SELECT first_name
FROM employees
ORDER BY first_name ASC;

--사원별 급여의 평균을 조회
--왜 group by ? :
SELECT emp_no, AVG(salary)
FROM salaries
GROUP BY emp_no;

--사원별 급여의 평균이 30000~50000인 사원번호와 평균그븝여 조회
SELECT emp_no, AVG(salary)
FROM salaries
GROUP BY emp_no
	HAVING AVG(salary) >= 30000
	AND AVG(salary) <= 50000;

--사원별 급여평균이 70000이상인 사원의 사번 이름 성 성별 조회
SELECT emp.emp_no, emp.first_name, emp.last_name, emp.gender
FROM employees emp
	JOIN salaries sal
	ON emp.emp_no = sal.emp_no
GROUP BY emp_no
HAVING AVG(salary) >= 70000; 

--현재 직책이 senior engineer 인 사원의 사원번호 성 조회
SELECT emp.emp_no, emp.last_name
FROM employees emp
	JOIN titles tit
	ON emp.emp_no = tit.emp_no
WHERE tit.to_date >= NOW() 
	AND tit.title = 'senior engineer';


--계정 만들기?
-- USE mysql;
-- SELECT * FROM USER;
-- CREATE USER 'team2'@'192.168.0.%' IDENTIFIED BY 'team2'
-- GRANT ALL PRIVILEGES ON *.* TO 'team2'@'192.168.0.%' IDENTIFIED BY 'team2';

-- COMMIT;
-- FLUSH PRIVILEGES;
