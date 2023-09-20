FLUSH PRIVILEGES;

UPDATE employees
SET
	first_name = '호이'
WHERE emp_no = 500001;

FLUSH PRIVILEGES;

SELECT * FROM employees WHERE emp_no = 500001;