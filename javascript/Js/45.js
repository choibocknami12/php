//
// 1. promise 객체
// - 비동기 프로그래밍의 근간이 되는 기법 중 하나
// - 프로미스를 사용하면 콜백 함수를 대체하고 비동기 작업의 흐름을 쉽게 제어가능
// - 프로미스객체는 비동기 작업의 최종 완료 또는 실패를 나타내는 독자적인 객체
// - 콜백헬을 좀더 깔끔하게 하기 위해나옴.

// 2. promise 사용법

const PROMISE1 = new Promise( function(resolve, reject) {
    let flg = true;
    if(flg) {
        return resolve('성공'); // 요청 성공시 resolve() 호출
    } else {
        return reject('실패'); // 요청 실패시 reject() 호출
    }
});

PROMISE1
.then( data => console.log(data)) // resolve가 담김
.catch( err => console.log(err)) // reject가 담김
.finally( () => console.log('finally 입니다.')) // 무조건 실행


// 3. promise 함수 등록
// 재사용성, 가독성, 확장성을 이유로 함수를 등록하고 사용많이 함.
function PRO2() {
    return new Promise( function(resolve, reject) {
        let flg = true;
        if(flg) {
            return resolve('성공'); // 요청 성공시 resolve() 호출
        } else {
            return reject('실패'); // 요청 실패시 reject() 호출
        }
    });
}

// setTimeout(() => {
//     console.log('A');
//     setTimeout(() => {
//         console.log('B');
//         setTimeout(() => {
//             console.log('C');
//         }, 1000);
//     }, 2000);
// }, 3000) ;
// 이걸 promise로 표현?

function PRO3(str, ms) {
    return new Promise( function(resolve) {
        setTimeout(() => {
            console.log(str);
            resolve();
        }, ms);
    });
}

PRO3('A', 3000)
.then( () => PRO3('B', 2000) )
.then( () => PRO3('C', 1000) );
// then~catch~finally 이건 굳이 전부 사용하지 않아도댐.

// 아래와 같이 사용
// PRO2
// .then()
// .catch()
// .finally()