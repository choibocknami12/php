//1. 버튼을 클릭시 아래 내용의 알러트가 나옵니다.
//  안녕하세요, 숨어있는 div를 찾아보세요

const BTN = document.querySelector('#btn');
BTN.addEventListener('click', () => alert(':)'+'\n'+'숨어있는 div를 찾아보세요!'));

//2-1. 특정영역에 마우스 포인터가 진입하면 아래 내용의 알러트가 나옵니다. 
//  두근두근

const DIV1 = document.querySelector('#div1');
DIV1.addEventListener('mouseenter', () => alert('두근두근'));


//2-2. 들킨 상태에서는 알러트가 안나옵니다.(젤 마지막)

//3. 2의 영역을 클릭하면 아래의 알러트를 출력하고 배경이 베이지색으로 바뀌어 나타납니다.
//  들켰다

//const DIV1 = document.querySelector('#div1');
DIV1.addEventListener('click', () => {
    alert('들켰다!');
    DIV1.style.backgroundColor = 'beige';
})

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

