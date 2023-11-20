
// ajax : 통신하는데 필요한 기술, 화면을 동적으로 표현하고 싶을 때 서버와 통신하기 위해 만들어짐.
// api : 통신하는데 필요한 도구(정해져있는 틀)
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

// 게시글 작성
function addItem() {

	fetch('http://localhost:8000/api/item', {
		method: 'POST',
		headers: {
			'Content-Type': 'application/json'
		},
		body: JSON.stringify({
			"data":{
				"content" : "안녕, 안녕하세요, 반갑습니다, 반가워용, 하위"
			}
		})
	})
	.then(response => response.json())
	.then(data => console.log(data))
	.catch(error => console.log(error))
}

// 게시글 수정
function updateItem() {
	fetch('http://localhost:8000/api/item/3', {
		method: 'PUT',
		headers: {
			'Content-Type': 'application/json'
		},
		body: JSON.stringify({
			"data" : {
				"completed":"1"
			}
		})
	})
	.then(response => response.json())
	.then(data => console.log(data))
	.catch(error => console.log(error))
}

// 게시글 삭제
function destroyItem() {
	fetch('http://localhost:8000/api/item/3', {
		method: 'DELETE',
		headers: {
			'Content-Type': 'application/json'
		},
		body: JSON.stringify()
	})
	.then(response => response.json())
	.then(data => console.log(data))
	.catch(error => console.log(error))
}




