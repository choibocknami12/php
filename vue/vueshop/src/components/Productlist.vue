<template >
	<div >
		<h4 @click="$emit('openModal', data)">{{ data.name }}</h4>
    <p>{{ data.price }} 원</p>
    <button @click="$emit('modalPlus', productKey)">허위 매물 신고</button>
    <span>신고수 : {{ data.reportCnt }}</span>
	</div>
</template>
<script>
export default {
	name: 'Productlist',
	props: {
		data: Object,
		productKey: Number,
	}
}
</script>
<style >
	
</style>