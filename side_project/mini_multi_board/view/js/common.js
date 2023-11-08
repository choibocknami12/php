
// const BTN_DETAIL = document.querySelector('#btn_detail');
// const BTN_DETAIL_CLOSE = document.querySelector('#btnModalClose');

// BTN_DETAIL.addEventListener('click', () => {
//     const MODAL = document.querySelector('#modal');
//     MODAL.classList.remove('displayNone'); //상세버튼 눌렀을 때 모달이 나와야해서 remove로 
// });

// BTN_DETAIL_CLOSE.addEventListener('click', () => {
//     const MODAL = document.querySelector('#modal');
//     MODAL.classList.add('displayNone'); //닫기 버튼 누르면 모달이 숨어야하니까 displaynone더해줘야함
// });

let test;

// 상세 모달 제어

function openDetail(id) {
    const URL = '/board/detail?id='+id;
    console.log(URL);
    fetch(URL)
    .then( response => response.json() )
    .then( data => {
        // console.log(data);
        // 요소의 데이터 셋팅
        const TITLE = document.querySelector('#b_title');
        const CONTENT = document.querySelector('#b_content');
        const IMG = document.querySelector('#b_img');
        const CREATENOW = document.querySelector('#created_at');
        const UPDATENOW = document.querySelector('#updated_at');

        TITLE.innerHTML = data.data.b_title;
        CONTENT.innerHTML = data.data.b_content;
        IMG.setAttribute('src', data.data.b_img);
        CREATENOW.innerHTML = data.data.created_at;
        UPDATENOW.innerHTML = data.data.updated_at;
        
        // 모달 오픈
        openModal();
    } )
    .catch( error => console.log(error) )
}

// 모달 오픈 함수
function openModal() {
    const MODAL = document.querySelector('#modalDetail');

    MODAL.classList.add('show');
    MODAL.style = 'display: block; background-color: rgba(0, 0, 0, 0.7);';
}

// 모달 닫기 함수
function closeDetailModal() {
    const MODAL = document.querySelector('#modalDetail');

    MODAL.classList.remove('show');
    MODAL.style = 'display: none;';
}

// regist.php에서 onclick을 주었기에 함수로 간단하게 사용하기 위해 만듬?
function userIdChk() {
    const SPAN = document.querySelector('#id_chk_span');
    SPAN.innerHTML = "";
    const IDCHK = document.querySelector('#u_id').value;
    const URL = '/user/idchk?u_id='+IDCHK; // get으로 보낼경우 이렇게!
    
    fetch(URL)
    .then( response => response.json() )
    .then( data => {
        if(data.data.cnt === 0) {
            SPAN.innerHTML = "사용가능한 아이디 입니다.";
            SPAN.classList = 'text-success';
        } else {
            SPAN.innerHTML = "이미 존재하는 아이디 입니다.";
            SPAN.classList = 'text-danger';
        }
    })
    .catch( error => console.log(error) );
}    

// function idChkBtn() {
//     const IDCHK = document.querySelector('#u_id_chk');
//     IDCHK.addEventListener('click', idChkBtn);
// }

// const IDCHK = document.querySelector('#u_id_chk');

// id 중복 체크(post)
//function idChk() {
//      const INPUT_ID = document.getElementById('u_id')   ;
//      const URL = '/user/idchk';
//
//      const formData = new FormData();
//      FormData.append("u_id", INPUT_ID)
// }