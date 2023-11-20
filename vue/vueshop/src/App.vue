<template>
  <img alt="Vue logo" src="./assets/logo.png">
  
  <!-- 헤더 -->
  <div class="nav">
    <!-- <a href="#">홈</a>
    <a href="#">상품</a>
    <a href="#">기타</a> -->
    
    <!-- 반복문 -->
    <!-- v-for : 기본문법으로 그대로 적용해야함. -->
    <a v-for="(item, i) in navList" :key="i">{{ i + ':' + item }}</a>
  </div>

  <!-- 모달 -->
  <!-- v-if : 안의 함수가 참일때 함수실행, 거짓일땐 함수실행 안함 -->
  <Transition name="modalAni">
  <div class="bg_black"  v-if="modalFlg" >
    <div class="bg_white">
      <img :src="item.img">
      <h4>{{item.name}}</h4>
      <p>{{item.content}}</p>
      <p>{{item.price}}</p>
      <p>신고수 : {{item.reportCnt}}</p>
      <button @click="modalFlg = false">닫기</button>
    </div>
  </div>
  </Transition>
  

  <!-- 상품 리스트 -->
<div>
  
    <!-- <div>
      <h4 :style="sty_color_red">{{ products[1] }}</h4>
      <p>{{ price1[1] }}</p>
    </div>
    <div>
      <h4>{{ products[0] }}</h4>
      <p>{{ price1[0] }}</p>
    </div>
    <div>
      <h4>{{ products[2] }}</h4>
      <p>{{ price1[2] }}</p>
    </div> -->

    <!-- 한줄로 사용하면 원하는 위치에 사용하는것이 아님! -->
    <div v-for="(item, i) in products" :key="i">
      <h4 @click="modalOpen(item)">{{ item.name }}</h4>
      <p>{{ item.price }}</p>
      <button @click="plusOne(i)">허위 매물 신고</button>
      <span>신고수 : {{ item.reportCnt }}</span>
    </div>

  </div>
</template>

<script>
// 설정파일 불러오기(자바스크립트 문법)
import data from './assets/js/data';

export default {
  name: 'App',
  
  // 데이터 바인딩 : 사용할 데이터 저장하는 공간(변수의 개념.)
  // 뷰는 데이터값이 변화하면 알아서 리랜더링해줌
  // 속성도 데이터 바인딩 가능함. 속성 사용 시 반드시 태그안에서 : 작성필요. h4참고
  data() {
    return {
      navList: ['홈', '상품', '기타', '문의'],
      // price1 : ['3,900', '5,000','10,000'],
      // sty_color_red : 'color : blue',
      // products : ['양말', '티셔츠', '바지'],
      products: data,
      // 리랜더링(뷰의 특징)
      // reportCnt: 0,
      modalFlg: false,
      //modalDetail: false,
      item: {},
    }
  },
  // methods : 함수를 정의하는 영역
  methods: {
    plusOne(i) {
      this.products[i].reportCnt++;
    },
    modalOpen(item) {
      this.item = item;
      this.modalFlg = true;
    },
  },

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

/* css파일로 이관 */
/* .nav {
  background-color: black;
  padding: 15px;
  border-radius: 10px;
}
.nav a {
  color: #fff;
  padding: 10px;
  text-decoration: none;
} */
</style>
