//1. 버튼을 클릭시 아래 내용의 알러트가 나옵니다.
//  안녕하세요, 숨어있는 div를 찾아보세요

const BTN = document.querySelector('#btn'); //접근하려는 요소(버튼)
BTN.addEventListener('click', () => alert(':)'+'\n'+'숨어있는 div를 찾아보세요!'));
//이벤트 넣을 때 사용하는거.

//2-1. 특정영역에 마우스 포인터가 진입하면 아래 내용의 알러트가 나옵니다. 
//  두근두근
function dudu() {
    if(i) {
        alert('두근두근');
    } 
} //실행할 이벤트의 함수 만듬

const DIV1 = document.querySelector('#div1'); //접근하려는 요소(div)
DIV1.addEventListener('mouseenter', dudu); //실행할 이벤트

//2-2. 들킨 상태에서는 알러트가 안나옵니다.(젤 마지막)

//3. 2의 영역을 클릭하면 아래의 알러트를 출력하고 배경이 베이지색으로 바뀌어 나타납니다.
//  들켰다

let i = true;
// 전역변수 설정 : true준게 if문 돌려야해서?
// i가 true가 되면 if문이 실행되고
function m_over() {
    if(i) {  
        alert('들켰다!');
        DIV1.style.backgroundColor = 'beige';
    } else {
        alert('다시 숨는당');
        DIV1.style.backgroundColor = 'white';
        // let x = Math.ceil(Math.random() * window.innerWidth);
        // let y = Math.ceil(Math.random() * window.innerHeight);
        // DIV1.style.width = x+'px';
        // DIV1.style.height = y+'px';
    }
    i = !i; //if문 실행 후 전역변수가 flase이 되면서 위의dudu함수가 실행되지 못하고 내려와서 else문 실행됨.
}
// 이 함수는 들켰을 경우, 다시 숨어야해서 if문으로 묶어줌.


//const DIV1 = document.querySelector('#div1');
// DIV1.addEventListener('click', () => {
//     alert('들켰다!');
//     DIV1.style.backgroundColor = 'beige';
// })

DIV1.addEventListener('click', m_over); 
//addEventListener는 하나의 객체(div)에 여러이벤트를 줄 수 있을 때 사용하기때문에 사용함.

    

// const DIV2 = document.querySelector('#div2');
// DIV2.addEventListener('click', () => {
//     alert('들켰다!');
//     DIV2.style.backgroundColor = 'beige';
// })


//4. 3번의 상태에서 다시 한번 더 클릭하면 아래의 알러트를 출력하고 배경색이 흰색으로 바뀌어 안보이게 됩니다.
//  다시 숨는다.
// DIV1.addEventListener('click', () => {
//     alert('다시 숨을게:-)');
//     DIV1.style.backgroundColor = 'white';
// })


