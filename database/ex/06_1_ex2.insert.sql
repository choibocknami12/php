-- INSERT
-- INSERT INTO 테이블명 [(속성1, 속성2)]
-- VALUES (속성값1, 속성값2)
-- insert into 테이블명 뒤에 속성값은 생략가능하나 다 쓰는것을 추천.
-- 500000 신규회원
INSERT INTO employees (
	emp_no
	, birth_date
	, first_name
	, last_name
	, gender
	, hire_date
)
VALUES (
	500000
	,NOW()
	,'Bocknami'
	,'Choi'
	,'M'
	,NOW()
);

SELECT * FROM employees WHERE emp_no = 500000;

-- 500000번 사원의 급여 데이터를 삽입해 주세요/
INSERT INTO salaries (
	emp_no
	,salary
	,from_date
	,to_date
)
VALUES (
	500000
	,100000
	,NOW()
	,99990101
);

-- 500000사원의 소속 부서 데이터를 삽입해 주세요.
INSERT INTO dept_emp (
	emp_no
	,dept_no
	,from_date
	,to_date
)
VALUES (
	500000
	,'d005'
	,NOW()
	,99990101
);

-- 500000사원의 직책 데이터 삽입.
INSERT INTO titles (
	emp_no
	,title
	,from_date
	,to_date
)
VALUES (
	500000
	,'Engineer'
	,NOW()
	,99990101
);

SELECT *
FROM dept_emp
WHERE emp_no = 500000;