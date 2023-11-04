const DIV = document.querySelector('.timeDiv');


// function clock() {
//     const NOW = new Date();
//     let time = NOW.toLocalTimeString();

//     const ARTICLE = document.createElement('article');
//     let nowtime = DIV.innerHTML = ' 현재 시각 ' + ' : ' + time;
//     DIV.appendChild(nowtime);
// }

// clock();
// let interval = setInterval(clock, 1000);




function clock() {
    const NOW = new Date();
    let time = NOW.toLocaleTimeString();
    DIV.innerHTML = ' 현재 시각 ' + ' <br> ' + time;
    // 콘텐츠를 넣을 요소가 이미 html에 있는경우 (timeDiv가 이미 존재)
    // 구지 새로운 요소를 생성할 필요는 없음 (createElement 불필요)

    // html 소스코드상에 필요한 요소가 없을 때만
    // createElement로 새로운 요소를 생성함
}

clock();
let interval = setInterval(clock, 1000);