1. laravel + vue 함께 설치
    * 생성하고자 하는 프로젝트 디렉토리에서 실행할 것.
    * 커멘드 활용시 반드시 관리자 모드로 실행할 것.

- composer create-project laravel/laravel="9" 파일명
    ** Git 푸시 후 다른 환경에서 작업시 **
        - 깃에서 소스코드 내려받기
        - 커멘드 > vendor를 내려받을 위치까지 들어가기 > composer install > vendor다운로드 확인
        - .env 파일생성 >> .env.example 복사해서 바꿔주기
        - 커멘드 실행 : php artisan key:generate >> .env파일에 APPKEY 생성
        - env파일 설정 확인하기(DB설정 다름.)
    ** laravel serve 실행 : php artisan serve **
    ** laravel controller 생성 : php artisan make:controller 파일명 **
    ** laravel model 생성 : php artisan make:model 파일명 **
    ** laravel model 실행 : php artisan migrate **
        - model,factory,seed 함께 생성 : php artisan make:model 파일명 -mfs
        - 기존 테이블에 칼럼 추가 : php artisan make:migration 파일명 --table=칼럼 추가할 테이블명
        - maigration 관리 : 구글검색이나 slack확인할 것.

- npm install  
    ** 컴파일 시도 : npm run dev **

- npm install --save-dev vue
    ** package.json 파일의 "devDependencies"에 "vue" 추가되었는지 확인 **

- resources/components에 Component 생성
    ** 파일명 2단어 이상의 조합으로 할 것. ex: AppComponent.. **

- resources/js/app.js 수정
    ** 코드 추가 **
        import { createApp } from 'vue'; 
        import AppComponent from '../components/AppComponent.vue';
        createApp({
            components: {
                AppComponent,
            }
        }).mount('#app');

- webpack.mix.js 수정
    ** mix 아래 코드 추가 **
        .vue({ version: 3, })

- 컴파일 확인하기
    ** npm run dev **
    ** 에러 >> npm install --``save-dev vue-loader >> 실행 후 다시 컴파일 시도**

- resources/views/welcome.blade.php 수정
    <!-- <script src="{{ asset('js/app.js')}}" defer></script> -->

- npm vuex@next --save
    ** vuex 설치 **

2. 현재 프로젝트는 laravel만 사용하다 vue 추가로 연동하여 작업 중.
    - detailBoard에서 탭UI 시도.