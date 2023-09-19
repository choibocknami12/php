INSERT INTO employees
VALUES (
	700000
	,20000101
	,'first'
	,'last'
	,'M'
	,'20230919'
	,null
);
COMMIT;

SELECT emp.emp_no
FROM employees emp
JOIN titles tit
ON emp.emp_no = sal.emp_no

SELECT *
FROM employees emp
LEFT OUTER JOIN titles tit
ON emp.emp_no = tit.emp_no
WHERE tit.emp_no IS NULL;

INSERT INTO titles
VALUES (
	700000
	,Green
	,20230919
	,99990101
);


INSERT INTO titles
(emp_no, title, from_date, to_date)
SELECT *
FROM employees emp
LEFT OUTER JOIN titles tit
ON emp.emp_no = tit.emp_no
WHERE tit.emp_no IS NULL;

