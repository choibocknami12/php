// 1. HTTP란(s가 붙으면 보안이란 뜻이 붙어서 보안이 좀더 강화됬다는거)
// 어떻게 Hypertext를 주고받을지 규약한 프로토콜(통신하는데 정해진 규칙)로 
// 클라이언트가 서버에 데이터를 request(요청)하고,
// 서버가 해당 request에 따라 response(응답)을 클라이언트에 보내주는 방식
// hypertext는 웹사이트에서 이용되는 하이퍼링크나 리소스,문서,이미지등을 모두 포함한다.

// 2. AJAX (Asynchronous javascript and XML)란?****
// 웹페이지에서 비동기 방식으로 서버에게 데이터를 request하고 
// 서버의 respones 를 받아 동적으로 웹페이지를 갱신하는 프로그래밍 방식이다.
// 웹페이지 전체를 다시 로드하지 않고도 일부분만 갱신할 수 있다.
// 대표적으로 XMLHttpRequest 방식과 Fetch Api 방식이 있습니다.


// 3. JSON 이란
// JavaSctipt의 Object에 큰 영감을 받아 만들어진 서버 간의 HTTP 통신을 위한 텍스트 데이터 포맷(틀, 양식)입니다.
// 장점은 다음과 같습니다.
//     - 데이터를 주고 받을 때 쓸 수 있는 가장 간단한 파일 포맷
//     - 가벼운 텍스트를 기반
//     - 가독성이 좋음
//     - Key와 Value가 짝을 이루고 있음
//     - 데이터를 서버와 주고 받을 때 직렬화(Serialization)[*1 참조]하기 위해 사용
//     - 프로그래밍 언어나 플랫폼에 상관없이 사용 가능

// JSON.stringify( obj ) : Object를 JSON 포맷의 String으로 변환(Serializing)해주는 메소드
// JSON.parse( json ) : JSON 포맷의 String을 Object로 변환(Deserializing)해주는 메소드

// XML
/* <xml>
    <data>
        <id>333</id>
        <name>홍길동</name>
    </data>
</xml> */

// JSON
// {
//     data: {
//         id: 333
//         ,name: '홍길동'
//     }
// } 

//예제 사이트 
// http://picsum.photos/

//const MY_URL = "http://picsum.photos/v2/list?page=2&limit=5";
const BTN_API = document.querySelector('#btn-api');
BTN_API.addEventListener('click', my_fetch);

const BTN_RE = document.querySelector('#btn-remove');
BTN_RE.addEventListener('click', my_remove);

//호출 지우기 버튼 함수
function my_remove() {
    const INPUT_URL = document.querySelector('#div-img');
    INPUT_URL.replaceChildren();
}

//샘함수
// function my_remove() {
//     const IMG = document.querySelectorAll('img');

//     for(let i = 0; i < IMG.length; i++) {
//         IMG[i].remove();
//     }
// }

//function my_remove() {
//    const INPUT_URL = document.querySelector('#div-img');
//    INPUT_URL.innerHTML = "";
//}

//fetch(url, 해당데이터)
function my_fetch() {
    const INPUT_URL = document.querySelector('#input-url');

    fetch(INPUT_URL.value.trim())
    .then( response => response.json() )
    .then( data => makeImg(data) )
    .catch( error => console.log(error) )
}

// 예외처리한거.
// function my_fetch() {
//     const INPUT_URL = document.querySelector('#input-url');

//     fetch(INPUT_URL.value.trim())
//     .then( response => {
//          if( response.status >= 200 && response.status < 300 ){
//              return response.json();   
//          } else {
//              throw new Error('에러에러');    
//          }
//      } )
//     .then( data => makeImg(data) )
//     .catch( error => console.log(error) )
// }


// Response
// body >>받아올 데이터가 있는 곳.
// : 
// (...)
// bodyUsed
// : 
// false
// headers
// : 
// Headers {}
// ok
// : 
// true
// redirected
// : 
// true
// status (http status)  
// : 
// 200  >> 200~299 -> 정상 / 300~399 -> 서버에서 예외처리 / 400~499 -> 통신이 안됬을때
// statusText
// : 
// ""
// type
// : 
// "cors"
// url
// : 
// "https://picsum.photos/v2/list?page=2&limit=5"
// [[Prototype]]
// : 
// Response

function makeImg(data) {
    data.forEach( item => {
        const NEW_IMG = document.createElement('img');
        const DIV_IMG = document.querySelector('#div-img');

        NEW_IMG.setAttribute('src', item.download_url);
        NEW_IMG.style.width = '200px'; 
        NEW_IMG.style.height = '200px'; 
        DIV_IMG.appendChild(NEW_IMG);
    });
}