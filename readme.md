#### 2019년 6월 21 금요일
- ### directory & file 설명
  - .env : 외부에 값이 노출되면 안되거나 서비스 마다 달라지는 값을 저장 // .gitignore 등록
  - composer.json : 프로젝트에 필요한 의존성을 정의
  - config : 여러 설정들이 들어있고 일부분은 .env에서 받아서 사용
  - package.json : 프로젝트에 필요한 js 의존성 정의
  - vendor : 의존객체들이 담겨있는 디렉토리

- ### 라라벨 프로젝트 구조
  라라벨 프로젝트는 크게 네 부분으로 나눌 수 있다.
   - 애플리케이션 레이어 : 라라벨 프레임워크에서 제공하는 문법(클래스,메소드)으로 개발하는 부분
   - 라라벨 프레임워크(laravel/laravel) : 핵심컴포넌트와 외부 컴포넌트를 조합하여 웹서비스의 틀을 제공
   - 라라벨 핵심 컴포넌트(laravel/framework)
   - 외부 컴포넌트

- ### 라라벨 작동 원리
    라라벨 부팅
   - 오로로딩 : 자동으로 클래스나 인터페이스를 로딩해 주는것
     
          ㅁ php5 autoloading 사용시
              spl_autoload_register method로 하나하나 다 등록해야함

          ㅁ Composer 사용시
              composer.json에 추가하고 composer update를 실행 시 오토로더 생성

              "require" : {
                "monolog/monolog" : "^1.13",
                "nesbot/carbon" : "^1.19"
              },

              오토로더는 두 가지 방식을 사용
              
                1. classmap : classmap에 지정된 폴더 내 모든 php 읽어서 정적배열 생성 후 오토로딩.
                              정적배열을 사용해 psr-4보다 빠르지만 새로운 내용 업데이트시 컴포저에게
                              오토로딩 정보를 갱신해야 한다고 명령해야함

                              // $composer dump-autoload

                2. psr-4    : 네임스페이스와 이를 매칭시킬 디렉토리만 지정하여 런타임에 요청한 클래스등을 동적으로 로딩

                              ex)
                              'Monolog\\'  => array($vendorDir . '/monolog/monolog/src/Monolog'),
                              ------------------------
                              use Monolog\Logger;

                              네임스페이스 기준으로 use로 지정된 php 파일을 찾음
                              //  vendor/monolog/monolog/src/Monolog/Looger.php
                              새로 composer에게 알려주지 않아도 되지만 속도가 느린 단점.


                개발 환경에서는 psr-4를 사용하고 운영환경은 classmap을 사용하는 것이 좋은방법 
                psr-0,psr-4 방식의 오토로더를 classmap으로 덤프하여 더 빠른 서비스를 제공하도록 할 수있음.
                
                               //  $composer dump-autoload -o
   - 서비스 컨테이너
   - 환경설정 로드
------------
