
// 1. async & await
// 비동기처리를 좀 더 가독성 좋고 편안하게 쓰기위해 promise를 사용했으나
// promise 또한 체이닝이 계속 될 경우 코드가 난잡해 질 수 있어 async & await가 도입되었다.
// async & await는 promise를 기반으로 동작함.

function PRO3(str, ms) {
    return new Promise( function(resolve) {
        setTimeout(() => {
            console.log(str);
            resolve();
        }, ms);
    });
}

async function test() {
    await PRO3('A', 3000);
    await PRO3('B', 2000);
    await PRO3('C', 1000);
}


// 병렬처리 하는 방법 : promise.all() 이용. 병렬처리는 여러가지 처리를 동시에 실행하는 것.

function PRO4() {
    return new Promise( function(resolve) {
        setTimeout(()=>{
            resolve(str);
        }, ms);
    });
}

async function test2() {
    return Promise.all([PRO3('A', 3000),('B', 1000)])
            .then( data => console.log('처리완료'));
}

test2()
.then(()=>console.log('test2')); 
