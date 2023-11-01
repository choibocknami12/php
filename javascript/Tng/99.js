const BTN_API = document.querySelector('#btn-api');
BTN_API.addEventListener('click', my_fetch);

const BTN_RE = document.querySelector('#btn-remove');
BTN_RE.addEventListener('click', my_remove);

// const DIV = document.getElementsByClassName('.main');
// const IN_DIV = document.getElementsByClassName('.inner_main');
// const SPACE = document.querySelector('#div-img2');
// DIV.insertBefore(IN_DIV, SPACE);



//호출 지우기 버튼 함수
function my_remove() {
    const DIV = document.querySelector('#article-img');
    DIV.replaceChildren();
}

function my_fetch() {
    const INPUT_URL = document.querySelector('#input-url');

    fetch(INPUT_URL.value.trim())
    .then( response => response.json() )
    .then( data => makeImg(data) )
    .catch( error => console.log(error) )
}

function makeImg(data) {
    data.forEach( item => {
        const DIV = document.querySelector('.main'); // div main에 접근
        const ARTICLE = document.createElement('div');// 회색배경 생성
        const NEW_IMG = document.createElement('img');// 불러올 이미지 삽입공간 생성
        const NEW_ID = document.createElement('div');// 불러올 id 삽입공간 생성
// 요소들을 만들기만 함. 이제 넣어주는 작업이 필요함.
        ARTICLE.classList = 'article'; // 만든 요소들 클래스로 넣어주기
        NEW_ID.classList = 'article-id'; // 이하동문
        NEW_IMG.classList = 'article-img'; // 이하동문
        NEW_IMG.setAttribute('src', item.download_url); // 만든 클래스의 속성값 지정
        NEW_ID.innerHTML = item.id; // id삽입공간의 클래스에 id값을 넣어줌 
//자식요소의 마지막 위치에 삽입됨.        
        ARTICLE.appendChild(NEW_ID);
        ARTICLE.appendChild(NEW_IMG);
        DIV.appendChild(ARTICLE);
        
    });
}

//main >> section >> article