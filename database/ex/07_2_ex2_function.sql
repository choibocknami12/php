-- case~when~else~end : 다중 분기를 위해 사용
-- 	case 체크하려는 수식1
-- 		when 분기수식1 then 결과1
-- 		when 분기수식2 then 결과2
-- 		when 분기수식3 then 결과3
-- 		else 결과4
-- 	end
-- 이건 사용많이 함. 알아두기.

SELECT e.emp_no
	,e.gender
	,case e.gender
		when 'M' then '남자'
		ELSE '여자'
	END AS ko_gender
FROM employees AS e;

UPDATE titles 
SET to_date = NULL
WHERE emp_no = 500000;
-- null은 문자열로 취급하면 안댐
-- 직책 테이블의 모든 정보를 출력해 주세요.
-- 단, to_date가 null // 9999-01-01인 경우는 '현재직책'
-- 그 외는 '지금은아님'

SELECT 
	*
	,case DATE(IFNULL(to_date, 99990101))
		when 99990101 then '현재직책'
		ELSE '지금은아님'
-- 		when에 부합하지 않는 조건을 else에 작성하면댐
	END AS ko_to_date
FROM titles
ORDER BY emp_no desc;

SELECT *
FROM titles
WHERE to_date IS NULL;
-- null은 일반 부등호는 안먹힘. is / is not 으로 찾아내야함.

-- 문자열 함수
SELECT CONCAT('안녕','하세요.');
-- 문자열 이어주기
SELECT CONCAT_WS('/','딸기','바나나','토마토','수박');
-- 문자열 사이에 구분자를 넣어주기
SELECT FORMAT(123456, 2);
-- format(숫자,소숫점 자릿수)

SELECT LEFT('123456',3);
-- left(문자열,길이) : 문자열을 왼쪽부터 길이만큼 잘라 반환.
SELECT RIGHT('123456',2);
-- right(문자열,길이) : 문자열을 오른쪽부터 길이만큼 잘라 반환.

SELECT UPPER('abcd');
-- upper(문자열) : 소문자를 대문자로 변경
SELECT LOWER('ABCD');
-- lower(문자열) : 대문자를 소문자로 변경

SELECT LPAD('123456',10,'0')
-- lpad(문자열,길이,채울문자열) : 문자열포함해 길이만큼 채울 문자를 왼쪽에 넣
SELECT RPAD('123456',10,'0')
-- rpad(문자열,길이,채울문자열) : 문자열포함 길이만큼 채울 문자 오른쪽에 넣
-- 보통 사원번호같은데 많이 사용

SELECT TRIM(' 1234 ');
-- trim(문자열) : 좌우공백제거.
-- ltrim(문자열): 왼쪽공백제거.
-- rtrim(문자열):	오른쪽공백제거.

SELECT SUBSTRING('abcdef',3,2);
-- substring(문자열,시작위치,길이) : 문자열을 시작위치에서 길이만큼 잘라서 반환
SELECT SUBSTRING_INDEX('ad.cd.ef.gh','.',1);
-- substring_index(문자열,구분자,횟수) : 왼쪽부터 구분자 횟수n번째가 나오면 그이후 삭제해서 반환.

-- 4. 수학함수
-- ceiling(숫자) : 올림
SELECT CEILING(1.4);
SELECT CEIL(1.4);
-- floor(숫자) : 내림
SELECT FLOOR(1.4);
-- round(숫자) : 반올림
SELECT ROUND(1.5), ROUND(1.4);
-- truncate(숫자,정수) : 소수점 기준 정수위치가지 구하고 나머지 버림.(데이터 삭제우려가 있으니 되도록 쓰지말것)

-- 5. 날짜 및 시간 함수
--  now() : 현재 날짜/시간을 구합니다. (YYYY-MM-DD)
SELECT NOW(), DATE(NOW()), DATE(99990101);
-- adddate(날짜1,interval 날짜2) : 날짜1에서 날짜2를 더한 날짜를 구합니다.
SELECT ADDDATE(99990101, INTERVAL 1 DAY);
-- addtime(날짜/시간,시간) : 날짜/시간에서 시간을 더한 날짜/시간을 구합니다.
SELECT ADDTIME(20230101000000, '-01:00:00');
-- 지금으로부터 1년 전 시간을 구하시오
SELECT ADDDATE(NOW(), INTERVAL -1 YEAR);

-- 6. 순위 함수
-- rank() over(order by 속성명 desc/asc) : 순위매김
SELECT emp_no, salary, RANK() OVER(ORDER BY salary DESC) AS RANK
FROM salaries
LIMIT 5;
-- 위에 처럼 하면 완전 느림 : salaries 전체를 가지고 와서 rank를 매기는 거라 더 오래걸림.
-- rank랑 low랑 차이첨이 있음. 확인해둘것 : rank(같은 값일때 공동순위가 됨) low_number(같은 값이라도 차례로 순위를 매김-기준이머임)

-- row_number() over(order by 속성명 desc/asc) : 레코드 순위매김
-- 예약어 중복되면 as에 사용할수없음. ex: 함수명같은 select, from이런것들은 as로 사용불가. rank는 왜 되는지 모르겠음.