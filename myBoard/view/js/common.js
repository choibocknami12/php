// 모달 테스트
const BTN_DETAIL = document.querySelector('#btnDetail');

BTN_DETAIL.addEventListener('click', () => {
	const MODAL = document.querySelector('#modalDetail');
	MODAL.classList.remove('displayNone');
});
