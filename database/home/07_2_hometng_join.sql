-- 현재 월급의 상위10위까지 사원의 사번, 풀네임, 월급 출력
SELECT emp.emp_no, CONCAT(emp.first_name, ' ',emp.last_name) AS fullname, sal.salary
FROM employees emp
	INNER JOIN salaries sal
		ON emp.emp_no = sal.emp_no
WHERE sal.to_date >= NOW()
ORDER BY sal.salary DESC 
LIMIT 10 ;

-- 현재 부서의 부서장의 부서명, 풀네임, 입사일을 출력하세요.
SELECT dep.dept_name, CONCAT(emp.first_name, ' ',emp.last_name) AS fullname, emp.hire_date
FROM employees emp
	INNER JOIN dept_manager dep_m
		ON emp.emp_no = dep_m.emp_no
		AND dep_m.to_date >= NOW()
	INNER JOIN departments dep
		ON dep_m.dept_no = dep.dept_no ;

