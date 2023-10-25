//1. DOM이란_p.677
// 웹 문서를 제어하기 위해 웹 문서를 객체화한 것.

//2. 요소 선택
//2-1. 고유한 id로 요소를 선택
const TITLE = document.getElementById('title');
const SUBTITLE = document.getElementById('subtitle');

//2-2. 태그명으로 요소를 선택(해당 요소들을 컬렉션 객체로 가져온다. 배열같이 옴.)
const H2 = document.getElementsByTagName('h2');
H2[0].style.color = 'red';//서브서브만 빨강으로 변함.

//2-3. 클래스명으로 요소 선택
const NONE = document.getElementsByClassName('none-li');


//2-4. css선택자를 이용해 요소를 찾는 메소드
const S_ID = document.querySelector('#subtitle2');
//      querySelector() : 복수일 경우 가장 첫번째 요소만 선택함.
const S_NONE = document.querySelector('.none-li');
//      querySelectorAll() : 복수의 요소는 전부 선택함.
const S_NONE_ALL = document.querySelectorAll('.none-li');


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

// removeAttribute() : 요소의 속성을 제거
INPUT.removeAttribute('placeholder');



//4. 요소 스타일링
//style : 인라인으로 스타일 추가
TITLE.style.color = 'blue';

//classList : 클래스로 스타일 추가 또는 삭제
TITLE.classList.add('class1','class2','class3');
TITLE.classList.remove('class1');
