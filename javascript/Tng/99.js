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
    const DIV_IMG = document.querySelector('#div-img');
    DIV_IMG.replaceChildren();
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
        const DIV = document.querySelector('.main');
        const ARTICLE = document.createElement('div');
        const NEW_IMG = document.createElement('img');
        const NEW_ID = document.createElement('div');

        ARTICLE.classList = 'article';
        NEW_ID.classList = 'article-id';
        NEW_IMG.classList = 'article-img';
        NEW_IMG.setAttribute('src', item.download_url);
    
        NEW_ID.innerHTML = item.id;
        
        ARTICLE.appendChild(NEW_ID);
        ARTICLE.appendChild(NEW_IMG);
        DIV.appendChild(ARTICLE);
        
    });
}

