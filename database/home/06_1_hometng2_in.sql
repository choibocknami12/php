-- 9. 사원별 급여 평균이 70,000이상인 사원의 사번.이름.성.성별을 조회.

SELECT emp_no, gender, CONCAT(first_name, '_',last_name) AS full_name
FROM employees
WHERE salary >= 70000
GROUP BY emp_no
	HAVING emp_no AVG(salary) AS avg_sal;
	
SELECT emp_no, first_name, last_name, gender
--사원의 사번,이름,성,성별 조회하겠다--
FROM employees
--조회할 정보가 있는 테이블--
WHERE emp_no 
--급여테이블과 중복되어 알 수 있는 칼럼명--
IN 
--이제 사원별 급여 평균 70,000이상인 사원을 찾기위한 조건문--
--인(in)왜 썼는지 다시 확인 후 다른곳에 적용시키기--
(
	SELECT emp_no
	FROM salaries
	GROUP BY emp_no
	HAVING AVG(salary) >= 70000
);	
	
--해답

SELECT emp.emp_no
	,emp.first_name
	,emp.last_name
	,emp.gender
FROM employees AS emp
WHERE emp_no IN (
	SELECT sal.emp_no
	FROM salaries AS sal
	GROUP BY sal.emp_no
	HAVING AVG(sal.salary) >= 70000
);
	
	

	
		