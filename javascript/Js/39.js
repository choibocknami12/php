//1. DOM이란_p.677
// 웹 문서를 제어하기 위해 웹 문서를 객체화한 것.

//2. 요소 선택
//2-1. 고유한 id로 요소를 선택
const TITLE = document.getElementById('title');
const SUBTITLE = document.getElementById('subtitle');

//2-2. 태그명으로 요소를 선택(해당 요소들을 컬렉션 객체로 가져온다. 배열같이 옴.)
const H2 = document.getElementsByTagName('h2'); //반복문 사용 불가
H2[0].style.color = 'red';//서브서브만 빨강으로 변함.

//2-3. 클래스명으로 요소 선택
const NONE = document.getElementsByClassName('none-li');


//2-4. css선택자를 이용해 요소를 찾는 메소드
const S_ID = document.querySelector('#subtitle2');
//      querySelector() : 복수일 경우 가장 첫번째 요소만 선택함.
const S_NONE = document.querySelector('.none-li');
//      querySelectorAll() : 복수의 요소는 전부 선택함.
const S_NONE_ALL = document.querySelectorAll('.none-li'); //반복문 사용가능


//3. 요소 조작
//textContent : 순수한 텍스트 데이터를 전달, 이전의 태그들은 모두 제거
TITLE.textContent = '<P>탕수육먹고싶다</p>';

//innerHTML : 태그는 태그로 인식해서 전달, 이전의 태그들은 모두 제거
SUBTITLE.innerHTML = '<p>탕수육먹고싶다</p>';

// setAttribute();
const INPUT = document.getElementById('intxt');

INPUT.setAttribute('placeholder', '우앙');
INPUT.placeholder = '적어주세용'; // 이것도 되는데 안되는 속성이 있어서 위에setAttribute사용하는 것이 좋음.

const A = document.getElementById('a');// 여기선 href속성쓸라면 set저거 써야함

// removeAttribute() : 요소의 속성을 제거(아예 클래스같은 속성 자체를 지우는것)
INPUT.removeAttribute('placeholder');


//4. 요소 스타일링
//style : 인라인으로 스타일 추가
TITLE.style.color = 'blue';

//classList : 클래스로 스타일 추가 또는 삭제
TITLE.classList.add('class1','class2','class3');
TITLE.classList.remove('class1'); // 이건 클래스는 남아있음. 클래스자체를 완전히 삭제하려면 removeAttribute사용해야함.



//5. 새로운 요소 생성
//요소 만들기
//const LI = document.createElement('li'); //li태그 하나 만든거,h1넣으면 h1태그 생성.
//LI.innerHTML = "우앙신기해"; //내용적어줌

//삽입 할 부모 요소 접근
//const UL = document.querySelector('#ul');

// 부모요소의 가장 마지막 위치에 li태그 추가(삽입)됨
//UL.appendChild(LI);

// 요소를 특정위치에 삽입하는 방법
//const SPACE = document.querySelector('li:nth-child(3)');
//UL.insertBefore(LI, SPACE);

// 요소를 삭제하는 방법
//LI.remove();


// 1. 수박게임 위에 장기를 넣어주세요.
const UL = document.querySelector('#ul'); //접근하려는 요소의 부모요소.
const LI = document.createElement('li'); //li태그 하나 만든거
UL.appendChild(LI); //없어도 삽입이 된다..왜??
LI.innerHTML = "장기"; //삽입 할 내용적어줌
const SPACE = document.querySelector('li:nth-child(1)');
UL.insertBefore(LI, SPACE);

//1-1. 사과게임 위에 로스트아크를 넣어주세요.
const LI1 = document.createElement('li');
LI1.innerHTML = "lostark";
const LOST = document.querySelector('li:nth-child(5)');
//UL.insertBefore(LI1, LOST);

//샘풀이
//const LIGANGGI = document.createElement('li');
//LIGANGGI.innerHTML = '장기';
//const LIAPPLE = document.getElementById('apple');
//UL.insertBefore(LIGANGGI, LIAPPLE); //insertBefore(삽입할 요소, 삽입할 요소의 위치);


// 2. 어메이징 브릭에 베이지 배경색을 넣어주세요.
const BRICK = document.querySelector('li:nth-child(10)');
//const BRICK = document.querySelector('ul li:last-child');

BRICK.style.backgroundColor = 'beige';
//BRICK.setAttribute('style', 'background-color', 'beige');

// 3. 리스트에서 짝수는 빨강, 홀수는 파랑으로 만들어주세요.
//const RED = document.querySelectorAll('.none-li');
// RED.style.color = 'red';
// RED = function() {
//     if( RED % 2 === 0) {

//     }
// }

//민경이 풀이
// 변수선언 할때 let이나 const를 사용하지 않으면 디폴트가 let임. 그런데 블록레벨단위가 아닌 전역변수로 선언이 된다.그렇기 때문에 반드시 변수선언해주어야함.
//const LI_ALL = document.getElementsByTagName('li');
//for(let i = 0; i < LI_ALL.length ; i++) { //let으로 변수선언안하면 안댐! 전역변수에 같은 변수이름이 있으면 코드 잘못될 가능성 높음.
//  if( i % 2 === 0) {
//      LI_ALL[i].style.color = 'red';
//} else {
//      LI_ALL[i].style.color = 'blue';
//}
// LI_ALL[i].style.color = i % 2 === 0 ? 'blue' : 'red'; 
//}

//명호 풀이
// const test1 = document.querySelectorAll('ul li:nth-child(even)');
// const test2 = document.querySelectorAll('ul li:nth-child(odd)');