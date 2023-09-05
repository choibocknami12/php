-- 1. 사원의 사원번호, 풀네임, 직책명을 출력해 주세요.
SELECT emp.emp_no, concat(emp.first_name,' ' ,emp.last_name) AS full_name, tit.title
FROM employees emp
	INNER JOIN titles tit
		ON emp.emp_no = tit.emp_no;

-- 2. 사원의 사원번호, 성별, 현재 월급을 출력해 주세요.
-- SELECT emp.emp_no, emp.gender, sal.salary
-- FROM employees emp
-- 	INNER JOIN salaries sal
-- 		ON emp.emp_no = sal.emp_no 
-- WHERE sal.to_date >= NOW();
-- 
SELECT emp.emp_no, emp.gender, sal.salary
FROM employees emp
 	INNER JOIN salaries sal
 		ON emp.emp_no = sal.emp_no 
 		AND sal.to_date >= NOW();
-- and가 왜 안댐? 조건이 왜 안되지? : = now()하면 안대고 >= now() 해야나옴. 데이터 값이 99990101 이기때문에.
-- where는 쿼리 전체의 조건이기때문에 join에 현재 월급값을 주어야하기 때문에 and를 주어야함.
-- 검수
SELECT * FROM employees WHERE emp_no IN (10001, 10002);
SELECT * FROM salaries WHERE to_date IN (10001, 10002) AND to_date >= NOW(); 		


-- 3. 10010 사원의 풀네임, 과거부터 현재까지 월급 이력 출력
SELECT concat(emp.first_name,' ' ,emp.last_name) AS full_name, sal.from_date, sal.to_date
FROM employees emp
	INNER JOIN salaries sal
	ON emp.emp_no = sal.emp_no
WHERE emp.emp_no = 10010;
-- 월급 이력을 출력해야하므로 salary를 넣어주어야함.
SELECT concat(emp.first_name,' ' ,emp.last_name) AS full_name, sal.salary
FROM employees emp
	INNER JOIN salaries sal
	ON emp.emp_no = sal.emp_no
WHERE emp.emp_no = 10010;

-- 4.사원의 사원번호, 풀네임, 소속부서명을 출력(employees, dept_manager = emp_no), (dept_manager, departmenet = dept_no)
SELECT emp.emp_no, concat(emp.first_name,' ' ,emp.last_name) AS full_name, dp2.dept_name
FROM employees emp
	INNER JOIN dept_manager dp
		ON emp.emp_no = dp.emp_no
	INNER JOIN departments dp2
		ON dp.dept_no = dp2.dept_no;
-- 중복값을 없애기 위해 where절을 넣어주면됨
WHERE dp.to_date >= NOW();

-- 5. 현재 월급의 상위10위까지 사원의 사번, 풀네임, 월급 출력
SELECT emp.emp_no, concat(emp.first_name,' ' ,emp.last_name) AS full_name, sal.salary
FROM employees emp
	INNER JOIN salaries sal
	ON emp.emp_no = sal.emp_no
WHERE sal.to_date = 99990101
ORDER BY salary desc
LIMIT 10;
-- limit옆에 desc붙이면 안댐. desc를 주기 위해 월급(salary)을 order by 해주는거임
-- rank로 사용하는법은 meerkat git에 업로드 확인..

-- 6. 현재 부서의 부서장의 부서명, 풀네임, 입사일 출력(employees, dept_emp = emp_no), (dept_emp, departmenet = dept_no)

-- SELECT dm.dept_name, concat(emp.first_name,' ' ,emp.last_name) AS full_name, dp.from_date
-- FROM employees emp
-- 	INNER JOIN dept_emp dp
-- 	ON emp.emp_no = dp.emp_no
-- 	INNER JOIN departments dm
-- 	ON dm.dept_no = dp.dept_no;
-- WHERE 
-- 잘못한거임. 블로그용

SELECT dn.dept_name, CONCAT(emp.first_name,' ',emp.last_name) AS full_name, dm.from_date
FROM employees emp
	INNER JOIN dept_manager dm
		ON emp.emp_no = dm.emp_no
		AND dm.to_date >= NOW()
	INNER JOIN departments dn
		ON dn.dept_no = dm.dept_no;
-- from_date = 매니저가 된 날짜. hire_date를 사용해야함.
-- 다틀렸어 ㅅㅂ

-- 7. 현재 직책 "staff"인 사원 현재 전체 평균 월급 출력
SELECT tit.title, AVG(salary)
FROM salaries sal
	INNER JOIN titles tit
		ON sal.emp_no = tit.emp_no
		AND sal.to_date >= NOW()
WHERE tit.title = 'staff' AND tit.to_date >= NOW();
-- 테이블마다 말하는 to_date의 값이 다름. 때문에 각 테이블의 to_date값을 현재로 맞춰줘야함.
SELECT tit.title, AVG(salary)
FROM titles tit
	INNER JOIN salaries sal
		ON sal.emp_no = tit.emp_no
WHERE tit.to_date >= NOW()
		AND sal.to_date >= NOW()
		AND tit.title = 'staff'
GROUP BY tit.title;

SELECT * FROM titles WHERE title = 'staff' ;

-- 8. 부서장직 역임했던 모든 사원의 풀네임과 입사일, 사번, 부서번호 출력
SELECT CONCAT(emp.first_name,' ',emp.last_name) AS full_name, dm.from_date, emp.emp_no, dm.dept_no
FROM employees emp
	INNER JOIN dept_manager dm
	ON emp.emp_no = dm.emp_no
		AND dm.to_date <= NOW();
-- 샘 풀이
SELECT
	CONCAT(emp.first_name,' ',emp.last_name) fullname
	,emp.hire_date
	,emp.emp_no
	,dept_m.dept_no
FROM employees emp
	JOIN dept_manager dept_m
		ON emp.emp_no = dept_m.emp_no;
		
-- 9. 현재 각 직급별 평균월급 중 60,000이상인 직급의 직급명, 평균월급(정수)를 내림차순으로 출력
SELECT AVG(salary) DESC, dept_name 
FROM 
-- 풀이
-- 직급별=group by절, 평균값=having절, 내림차순 order by 마지막에 넣음.
-- 현재 = tit과 sal에 각각 현재값을 넣어줌 (현재값은 7번 문제랑 비슷) 
SELECT tit.title, FLOOR(AVG(sal.salary)) avg_sal
FROM titles tit
	JOIN salaries sal
		ON tit.emp_no = sal.emp_no
WHERE tit.to_date >= NOW()
	AND sal.to_date >= NOW()
GROUP BY tit.title HAVING avg_sal >= 60000
ORDER BY svg_sal DESC;

-- 10. 성별이 여자인 사원의 직급별 사원수를 출력
SELECT tit.title, COUNT(title)
FROM employees emp
	INNER JOIN titles tit
		ON emp.emp_no = tit.emp_no 
		AND emp.gender = 'F'
		-- AND tit.to_date >= NOW() 이걸 넣어야 현재 여자사원값이 나옴.
GROUP BY tit.title ;
-- select의 값을 안 넣으면 count값 밖에 안나오게됨. title명과 함께 나와야하기때문에 select에 ,와 합계 공식count()을 넣어주어야하는 것.

-- >= 크거나 같다
-- <= 작거나 같다
-- != 같지 않다







