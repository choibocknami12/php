<template>
	<div>
	<Transition name="modalAni">
	<div class="bg_black"  >
    <div class="bg_white">
    <img :src="data.img">
    <h4>{{data.name}}</h4>
    <p>{{data.content}}</p>
    <p>{{data.price}} 원</p>
		<input type="text" 
			v-model="productCnt">
		<p>총 가격 : {{ productCnt * data.price }} 원</p>
    <p>신고수 : {{data.reportCnt}}</p>
    <button @click="$emit('closeModal')">닫기</button>
    </div>
	</div>
	</Transition>
	</div>
</template>
<script>
export default {
	name: 'Modal',
	data() {
		return {
			productCnt: 0,
		}
	},
	// data를 감시하는 함수를 정의하는 영역
	watch: {
		// 함수명은 감시하고 싶은 데이터바인딩명과 동일해야함.
		productCnt(input) {
			if(input > 10) {
				alert('안댐');
				this.productCnt = 10;
			} else if(input < 0) {
				alert('안댐');
				this.productCnt = 0;
			}
		}
	},
	props: {
		data: Object,
	},
}
</script>
<style>
	
</style>