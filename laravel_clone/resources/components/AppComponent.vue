<template>
    <div id="app">
        <ul>
            <li>111</li>
            <li><a href="/coment">댓글</a></li>
        </ul>
        <router-link to="/coment">댓글창</router-link>
        <!-- 라라벨 라우터 찾아가는것 -->
        <router-view></router-view>
        <!-- 뷰의 라우터 찾아가는것 -->
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