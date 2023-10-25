
//date
let now = new Date(); // 오늘
let sDate = new Date('2023-09-30 19:20:10');


// getFullYear() : 연도만 가져오는 메소드
console.log(now.getFullYear());

// getMonth() : 월만 가져오는 메소드(+1을 해줘야지 현재월과 같습니다.)
console.log(now.getMonth() + 1);

// getDate() : 일만 가져오는 메소드
console.log(now.getDate());

let month = now.getMonth() + 1;
let date = now.getDate();
let day = now.getDay();

switch(day) {
    case 1:
        day = '월요일';
        break;
    case 2:
        day = '화요일';
        break;
    case 3:
        day = '수요일';
        break;
    case 4:
        day = '목요일';
        break;
    case 5:
        day = '금요일';
        break;
    case 6:
        day = '토요일';
        break;          
    default:
        day = '일요일'
        break;
}
let today =  month + '월'+ date + '일 ' + day ;


// getDay() : 요일만 가져오는 메소드(0(일)~6(토))
console.log(now.getDay());

// getHours() : 시

// getMinutes() : 분

// getSeconds() : 초

// getMilliseconds() : 밀리초


// getTime() : 1970/01/01(리눅스시간) 기준으로 얼마나 지났는지 밀리초단위로 가져옴.


// 기준일 : 2023-09-30 19:20:10
// 오늘로부터 몇일 전인지 구해보자
now = new Date(); // 오늘
sDate = new Date('2023-09-30 19:20:10');
now2 = new Date(year, month-1, date, 0, 0, 0, 0); // 오늘날짜 0시 0분 0초 0밀리초 가져오는 방법.

// const getDateDiff = (now, sDate) => {
//     const DATE1 = new Date(now);
//     const DATE2 = new Date(sDate);
    
//     const DIFFDATE = DATE1.getTime() - DATE2.getTime();
    
//     return Math.abs(DIFFDATE / (1000 * 60 * 60 * 24)); // 밀리세컨 * 초 * 분 * 시 = 일
//   };
// let resday =  Math.ceil(getDateDiff(now, sDate));

// Math.abs() : 절대값을 보여주는 메소드.


//민경이 풀이
let resday = now - sDate;
let res = Math.ceil(resday / (1000 * 60 * 60 * 24));