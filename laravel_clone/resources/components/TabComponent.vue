<template>
	<div class="detailImg">
		<img :src="`${data.p_img}`" alt="" width="500px" height="500px">
		<p>{{ data.p_img }}</p>
		<p>{{ pathImg }}</p>
		<div 
			:style="{backgroundImage : `url('${pathImg}')`}"></div>
	</div>

	<div class="detailInfo">
		<h1>{{data.p_name}}</h1>
		<p>{{data.p_content}}</p>
		<h3>\{{data.p_price}}</h3>
		
		<form action="#">
			<label>옵션선택</label>
			<select name="options" id="options">
				<option value="">{{data.p_name}} 6kg</option>
				<option value="">{{data.p_name}} 6kg*2</option>
				<option value="">{{data.p_name}} 14kg</option>
			</select>
			<button type="submit">장바구니</button>
		</form>
	</div>    

	<!-- 인증 체크를 왜 controller에서 하죠? >> 라라벨에서 인증했으니까..? -->
   	<div>
		<p @click="FlgTab = 0;">후기</p>
		<p @click="FlgTab = 1;">댓글</p>
		<p @click="FlgTab = 2;">별점</p>
   	</div>
   	<div v-if="FlgTab === 0" style="margin-bottom: 50px;">
		<div v-if="flgUser === 1">
			<p>후기 작성</p>
		</div>
		<p>후기 목록1</p>
		<p>후기 목록2</p>
		<p>후기 목록3</p>
   	</div>
   	<div v-if="FlgTab === 1" style="margin-bottom: 50px;">
		<p>댓글 목록1</p>
		<p>댓글 목록2</p>
		<p>댓글 목록3</p>
   	</div>
   	<div v-if="FlgTab === 2" style="margin-bottom: 50px;">
		<p>5점</p>
   	</div>
</template>

<script>
export default {
	name: 'TabComponent',
	props: {
		// ProductController에서 데이터값을 number로 가져옴
		flgUser: Number,
		// ProductController에서 json data를 배열로 가져오는데 왜 객체로 정해놓았을까요
		// component에서 객체로 받아서 그런가요..?
		data: Object,
	},
	data() {
		return {
			FlgTab: 0,
			pathImg: this.data.p_img,
		}
	},
}
</script>

<style>

</style>

