const BTN_API = document.querySelector('#btn-api');
BTN_API.addEventListener('click', my_fetch);


function my_fetch() {
    const INPUT_URL = document.querySelector('#input-url');

    fetch(INPUT_URL.value.trim())
    .then( response => response.json() )
    .then( data => makeImg(data) )
    .catch( error => console.log(error) )
}

function makeImg(data) {
    data.forEach( item => {
        // 아티클 요소 생성
        const ARTICLE = document.createElement('article');
        const ARTICLE_ID = document.createElement('div');
        const ARTICLE_IMG = document.createElement('img');

        // 아티클의 요소의 속성 및 컨텐츠 셋팅
        ARTICLE_ID.className = 'article-id';
        ARTICLE_ID.innerHTML = item.id;
        ARTICLE_IMG.className = 'article-img';
        ARTICLE_IMG.setAttribute('src', item.download_url);

        // 아티클 요소들 삽입
        ARTICLE.appendChild(ARTICLE_ID);
        ARTICLE.appendChild(ARTICLE_IMG);

        const SECTION_CON = document.querySelector('.sectionContent');
        SECTION_CON.appendChild(ARTICLE);
    });
}


const BTN_RE = document.querySelector('#btn-remove');
BTN_RE.addEventListener('click', my_remove);

function my_remove() {
    const SECTION_CON = document.querySelector('.sectionContent');
    SECTION_CON.innerHTML = '';
}