
// ajax : 통신하는데 필요한 기술, 화면을 동적으로 표현하고 싶을 때 서버와 통신하기 위해 만들어짐.

// json

const BTN1 = document.getElementById('btn');
BTN1.addEventListener('click', getItem);

function getItem() {
	fetch('http://localhost:8000/api/item')
	.then(response => response.json())
	.then(data => {
		let content = data.data[0].content; // 
		let cp = document.createElement('p');
		cp.innerHTML = content;
		document.body.appendChild(cp);
	})
	.catch(error => console.log(error));
}





// api : 통신하는데 필요한 도구(정해져있는 틀)

