-- 사원의 사원번호, 풀네임, 직책명을 출력해 주세요.
SELECT emp.emp_no, CONCAT(emp.first_name, ' ',emp.last_name) AS fullname, tit.title
FROM employees emp
	INNER JOIN titles tit
	ON emp.emp_no = tit.emp_no;
	
-- 사원의 사원번호, 성별, 현재 월급을 출력해 주세요.	
SELECT emp.emp_no, emp.gender, sal.salary
FROM employees emp
	INNER JOIN salaries sal
	ON emp.emp_no = sal.salary
	AND sal.to_date >= NOW(); 
	
SELECT emp.emp_no, emp.gender, sal.salary
FROM employees emp
	INNER JOIN salaries sal
	ON emp.emp_no = sal.salary
WHERE sal.to_date >= NOW();

-- 사원의 사원번호, 풀네임, 소속부서명을 출력
SELECT emp.emp_no, CONCAT(emp.first_name, ' ',emp.last_name) AS fullname, dep.dept_name
FROM employees emp
	INNER JOIN dept_emp demp
		ON emp.emp_no = demp.emp_no
	INNER JOIN departments dep
		ON demp.dept_no = dep.dept_no
WHERE demp.to_date >= NOW();