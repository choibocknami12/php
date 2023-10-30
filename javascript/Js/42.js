
const NOW = new Date();
let l1 = new Date();

//setTimeOut이 돌아가는 원리?
function my_setTimeout(callback, ms) {
    const NOW = new Date();
    let l1 = new Date();
    
    while(l1 - NOW <= ms){
        l1 = new Date();
    }
    callback();
}

my_setTimeout(()=>console.log('1'), 1000);
my_setTimeout(()=>console.log('2'), 1000);
my_setTimeout(()=>console.log('3'), 1000);

//비동기 처리로 : TIME함수, EVENT함수,
// 비동기처리를 동기처리로 하고싶을 때 
//(콜백 지옥 : 콜백 함수를 이용해 비동기처리를 동기처리 할 때 나타나는 난잡한 현상)
setTimeout(() => {
    console.log('A');
    setTimeout(() => {
        console.log('B');
        setTimeout(() => {
            console.log('C');
        }, 1000);
    }, 2000);
}, 3000) ;



