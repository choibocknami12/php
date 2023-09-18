SELECT
emp.emp_no
,emp.birth_date
,sal.salary
FROM employees emp
INNER JOIN salaries sal
ON emp.emp_no = sal.emp_no
AND sal.to_date >= NOW()
WHERE sal.emp_no = 10001
OR sal.emp_no = 10002;

SELECT
emp.emp_no
,emp.birth_date
,sal.salary
FROM employees emp
INNER JOIN salaries sal
ON emp.emp_no = sal.emp_no
AND sal.to_date >= NOW()
WHERE sal.emp_no 
IN (10001,10002);


INSERT INTO departments (
	dept_no
	,dept_name
)
VALUES (
	'd010'
	,'php504'
);

FLUSH PRIVILEGES;

SELECT * FROM departments;

DELETE FROM departments
WHERE dept_no = 'd010';


