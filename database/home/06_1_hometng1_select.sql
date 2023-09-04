-- 7. 사원별 급여의 평균을 조회

SELECT emp_no, AVG(salary)
FROM salaries
	GROUP BY emp_no desc;
	
-- 8. 사원별 급여의 평균이 30,000~50,000인 사원번호와 평균급여 조회	

SELECT emp_no, AVG(salary)
FROM salaries
	GROUP BY emp_no
	HAVING emp_no >=30000 AND emp_no <=50000 ;
-- having절 틀림! emp_no가 아니라 salary(급여값)가 들어가야함

SELECT emp_no, AVG(salary) AS avg_sal
FROM salaries
	GROUP BY emp_no
	HAVING avg_sal >= 30000 AND avg_sal <= 50000 ;
	
SELECT emp_no, AVG(salary) AS sal_avg
FROM salaries 
	GROUP by emp_no
	HAVING sal_avg >= '30000' AND sal_avg <= '50000';