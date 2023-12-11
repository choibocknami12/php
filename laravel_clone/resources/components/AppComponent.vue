<template>
    <div class="coment2">
        <TabComponent></TabComponent>
        <!-- 라라벨 라우터 찾아가는것 -->
        <!-- <div><router-view></router-view></div> -->
        <!-- 뷰의 라우터 찾아가는것 -->
    </div>
</template>

<script>
import TabComponent from './TabComponent.vue';
export default {
    name: 'AppComponent',
    components: {
        TabComponent,
    },
}
</script>

<style>
    
</style>