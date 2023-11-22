<template>
  <div class="header">
    <ul>
      <!-- v가 포함된 명령어에서는 this사용안해도 가능. -->
      <li 
        v-if="$store.state.flgTapUI !== 0"
        class="header-button header-button-left"
        @click="$store.commit('setFlgTapUI', 0);">취소</li>
      <li><img class="logo" alt="Vue logo" src="./assets/logo.png"></li>
      <li
        v-if="$store.state.flgTapUI === 1"
        @click="addBoard()"
        class="header-button header-button-right">작성</li>
    </ul>
  </div>
  <!-- vuex에서 데이터 가지고 올때 사용 -->
  <!-- <p>{{ $store.state.phptest }}</p> -->

  <!-- 컨테이너 -->
  <ContainerComponent></ContainerComponent>

  <!-- 더보기 버튼 -->
  <button
    @click="showBoardList()">더보기</button>
  
  <!-- 푸터 -->
  <div class="footer">
    <div class="footer-button-store">
      <label for="file" class="label-store">+</label>
      <input @change="updateImg" accept="image/*" type="file" id="file" class="input-file">
    </div>
  </div>
</template>

<script>
import ContainerComponent from './components/ContainerComponent.vue';
// 


export default {
  name: 'App',
  created() {
    // store의 action 호출. store접근을 위해 this사용
    // action을 호출하는 메소드 dispatch 사용
    this.$store.dispatch('actionGetBoardList');
  },
  methods: {
    // 작성페이지 이동 및 이미지 관리
    updateImg(e) { // event의 e 약자
      // 파일 업로드 기능을 다룰 때 사용 : 선택한 파일 가져오기
      const file = e.target.files; 
      // 여기까지 브라우저에 이미지를 임시저장함.
      const imgURL = URL.createObjectURL(file[0]);
      // 작성 영역에 이미지를 표시하기 위한 데이터 저장
      this.$store.commit('setImgURL', imgURL);
      // 작성처리시 보낼 파일 데이터 저장
      this.$store.commit('setPostFileData', file[0]);
      // 작성 ui 변경을 위한 플래그 수정
      this.$store.commit('setFlgTapUI', 1);

      // 이벤트타겟 초기화
      // 선택한 파일 처리 후 남는 데이터 없애는 것.
      e.target.value = '';
    },

    // 글 작성 처리
    addBoard() {
      this.$store.dispatch('actionPostBoardAdd');
    },

    // 더보기 버튼 클릭시
    showBoardList() {
      this.$store.dispatch('actionGetBoardShow');
    },
  },

  components: {
    ContainerComponent,
  }
}
</script>

<style>
@import url('./assets/css/common.css');

#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
