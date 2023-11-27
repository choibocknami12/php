<template>
	<div>
		App VUE 컴포넌트
		<h2>{{ $store.state.testStr }}</h2>
		<h2>라라벨 데이터 name: {{ laravelData.name }}</h2>
		<h2>라라벨 데이터 id: {{ laravelData.id }}</h2>
		<ul>
			<li><a href="/">루트</a></li>
			<li><a href="/login">로그인</a></li>
			<li><a href="/board">게시판</a></li>
		</ul>
		<router-link to="/login">라우터 로그인</router-link>
		<!-- 라라벨의 라우터를 찾아감. 사용시 주의. 서버로 통신을 보내는게 아님!-->
		<router-view></router-view>
		<!-- 뷰의 라우터를 찾아감 -->
	</div>
</template>
<script>
export default {
	name: 'AppComponent',
	props: {
		laravelData: Object,
	},
	beforeCreate() {
		this.$store.commit('setLaravelData', this.laravelData);
	},
}
</script>
<style>
	
</style>