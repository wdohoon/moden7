
<?php
include_once('./_common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_PATH.'/certification.php');
    return;
}

if (G5_IS_MOBILE) {
    include_once(G5_MOBILE_PATH.'/certification.php');
    return;
}

include_once(G5_PATH.'/head.php');
?>

<style>
/*공통*/
.m-only{display:none}
.sc_inner .txt-box{text-align: left;}
.elementore-heading{text-align: left;color: #4C4C4E;font-family: "KoPubWorldDotum", Sans-serif;font-size: 2vw;font-weight: 600;}
.elementore-description{text-align: left;color: #4C4C4E;font-family: "KoPubWorldDotum", Sans-serif;font-size: 1vw;font-weight: 400;line-height: 1.2;}

/*.sc_01*/
.sc_01{background-image: url(/images/certification1.png);background-position: center center;background-repeat: no-repeat;background-size: cover;}
.sc_01 .sc_inner{min-height: 48.25vw;display: flex;flex-direction: column;justify-content: flex-end;align-items: center;}
.sc_01 .sc_inner .box{margin-bottom: 7.81vw;;}
.sc_01 .sc-txt{margin-top: 50px;text-align:center}
.sc_01 .sc-txt .elementore-heading{font-size: 3.9vw;font-weight: 600;line-height: 1.1em;    text-align: center;    margin-bottom: 20px;}
.sc_01 .sc-txt .elementore-description{font-size: 1.5vw;font-weight: 400;line-height: 2em;}

/*.sc_02*/
.sc_02{background-image: url(/images/certification2.png);background-position: center center;background-repeat: no-repeat;background-size: cover;}
.sc_02 .sc_inner{min-height: 43vw;    display: flex;align-items: center;}
.sc_02 .sc_inner .elementore-heading{font-size: 2.6vw;font-weight: 400;line-height: 1.1em;}
.sc_02 .sc_inner .box{padding: 0% 0% 0% 60%;}

/*.sc_03*/
.sc_03{background-image: url(/images/certification3.png);background-position: center center;background-repeat: no-repeat;background-size: cover;}
.sc_03 .sc_inner{min-height: 43vw;display: flex;justify-content: center;flex-direction: column;}
.sc_03 .sc_inner .elementore-heading{font-size: 2.6vw;font-weight: 400;line-height: 1.1em;}
.sc_03 .sc_inner .elementore-heading.right{text-align: right;}
.sc_03 .sc_inner .box{padding: 0% 57% 0% 0%;}

/*.sc_04*/
.sc_04{background-image: url(/images/certification4.png);background-position: center center;background-repeat: no-repeat;background-size: cover;}
.sc_04 .sc_inner{min-height: 43vw;    display: flex;align-items: center;}
.sc_04 .sc_inner .elementore-heading{font-size: 2.6vw;font-weight: 400;line-height: 1.1em;}
.sc_04 .sc_inner .box{padding: 0% 0% 0% 56%;}

/*.sc_05*/
.sc_05{background-image: url(/images/certification5.png);background-position: center center;background-repeat: no-repeat;background-size: cover;}
.sc_05 .sc_inner{min-height: 43vw;display: flex;justify-content: center;flex-direction: column;}
.sc_05 .sc_inner .elementore-heading{font-size: 2.6vw;font-weight: 400;line-height: 1.1em;}
.sc_05 .sc_inner .elementore-heading.right{text-align: right;}
.sc_05 .sc_inner .box{padding: 0% 53% 0% 0%;}

/*.sc_06*/
.sc_06{background-image: url(/images/certification6.png);background-position: center center;background-repeat: no-repeat;background-size: cover;}
.sc_06 .sc_inner{min-height: 60vw;display: flex;justify-content: center;padding: 7% 0% 0% 0%;}
.sc_06 .sc_inner .elementore-heading{font-size: 3.1vw;font-weight: 600;line-height: 1.4em;letter-spacing: -0.5px;margin-bottom: 20px;}
.sc_06 .sc_inner .elementore-description{font-size: 1vw;font-weight: 400;line-height: 1.5em;letter-spacing: 0px;text-align:center}

/*.sc_07*/
.sc_07{position:relative}
.sc_07 h2{color: #4C4C4E;font-size: 3.1vw;font-weight: 600;line-height: 80px;padding-top: 8.59vw;}
.sc_07 .swiper {width: 100%;height: 100%;}
.sc_07 .swiper-slide {text-align: center;font-size: 18px;background: #fff;display: flex;align-items: center;}
.sc_07 .swiper-slide img {display: block;width: 100%;height: 100%;object-fit: cover;}
.sc_07 .swiper-slide .slide-box{min-height: 48vw;width:1243px;background-position: top center; margin-top:50px}
.sc_07 .swiper-slide .box01{background-image: url(/images/ce-slide1.png);background-repeat: no-repeat;background-size: contain;background-position: center center;}
.sc_07 .swiper-slide .box02{background-image: url(/images/ce-slide2.png);background-repeat: no-repeat;background-size: contain;background-position: center center;}
.sc_07 .swiper-slide .box03{background-image: url(/images/ce-slide3.png);background-repeat: no-repeat;background-size: contain;background-position: center center;}
.sc_07 .swiper-slide .box04{background-image: url(/images/ce-slide4.png);background-repeat: no-repeat;background-size: contain;background-position: center center;}
.sc_07 .swiper-slide .slide-box dl{text-align:left;padding: 16.83vw 0% 0% 57%;}
.sc_07 .swiper-slide .slide-box dt{margin-bottom: 20px;color: #27AAE1; font-size: 3vw;font-weight: 600;line-height: 1.2em;letter-spacing: -0.5px;}
.sc_07 .swiper-slide .slide-box dd{font-size: 1vw;font-weight: 400;line-height: 1.5em;letter-spacing: 0px;}
.swiper-pagination-bullet {background: #707070;}
.swiper-pagination-bullet-active {background: #27AAE1;}
.swiper-pagination { bottom: 17.71vw;right: 50%;margin-top: 60px;margin-right: -176px;}
.swiper-pagination-clickable .swiper-pagination-bullet {margin-right: 10px;}

/*.sc_08*/
.sc_08{position:relative;background-image: url(/images/certification8.png);background-position: center center;background-repeat: no-repeat;background-size: cover;}
.sc_08 .sc_inner{min-height: 56.25vw;display: flex;padding:0% 0% 0% 58%;    align-items: center;}
.sc_08 .sc_inner .elementore-heading{color: #27AAE1;font-size: 1.5vw;font-weight: 400;line-height:2em;}
.sc_08 .sc_inner .elementore-description{font-size: 2.6vw;font-weight: 600;line-height: 1.1em;}

/*.sc_09*/
.sc_09{position:relative;background-image: url(/images/certification9.png);background-position: center center;background-repeat: no-repeat;background-size: cover;}
.sc_09 .sc_inner{min-height:60vw;display: flex;align-items: center;text-align: left;padding: 0% 13% 0% 13%;}
.sc_09 .sc_inner .elementore-heading {max-width: 20.83vw;}
.sc_09 .sc_inner .elementore-description{margin-top:2.60vw;;font-size: 1.04vw;font-weight: 400;text-decoration: none;line-height: 30px;}
.sc_09 .sc_inner .go {margin-top:40px}
.sc_09 .sc_inner .go img{width:20px;height:20px;margin-left:10px}

@media only screen and (max-width: 1280px) {
.sc_07 .swiper-slide .slide-box dl { padding: 8.83vw 0% 0% 57%;}
.sc_07 .swiper-slide .slide-box dt { font-size: 4vw;}
.sc_07 .swiper-slide .slide-box dd {font-size: 1.6vw;}
}

@media only screen and (max-width: 1040px) {
.sc_01 .sc-txt .elementore-heading {font-size: 4.9vw;}
.sc_01 .sc-txt .elementore-description {font-size: 1.9vw;}
.sc_02 .sc_inner .elementore-heading ,.sc_03 .sc_inner .elementore-heading, .sc_04 .sc_inner .elementore-heading,.sc_05 .sc_inner .elementore-heading{font-size: 2.8vw;}
.sc_06 .sc_inner .elementore-heading {font-size: 3.6vw;margin-bottom: 10px;}
.sc_06 .sc_inner .elementore-description {font-size: 1.6vw;}
.sc_07 h2 { font-size: 3.6vw;}
.sc_09 .sc_inner .elementore-description {font-size: 1.5vw;}
}

@media only screen and (max-width: 768px) {
.m-only{display:block}
.m-none{display:none}

.sc_02,.sc_03,.sc_04,.sc_05{margin-top:50px}
.sc_01 {background-image: url(/images/m-certification1.png);height: 161.5vw;}
.sc_01 .sc_inner { justify-content: flex-start;justify-content: center;padding-top:50px}
.sc_01 .sc-txt .elementore-heading {font-size: 8.9vw;}
.sc_01 .sc-txt .elementore-description {text-align: center;font-size: 3.9vw;}

.sc_02 .sc_inner .box ,.sc_03 .sc_inner .box,.sc_04 .sc_inner .box,.sc_05 .sc_inner .box{padding: 0;}

.sc_02 .sc_inner,.sc_04 .sc_inner { align-items: flex-start;justify-content: center;}
.sc_02 {background-image: url(/images/m-certification2.png);background-size: contain;}
.sc_03 {background-image: url(/images/m-certification3.png);background-size: contain;}
.sc_04 {background-image: url(/images/m-certification4.png);background-size: contain;}
.sc_05 {background-image: url(/images/m-certification5.png);background-size: contain;}
.sc_02 .sc_inner .elementore-heading, .sc_03 .sc_inner .elementore-heading, .sc_04 .sc_inner .elementore-heading, .sc_05 .sc_inner .elementore-heading {font-size: 7.8vw;margin-top: 100vw;}
.sc_03 .sc_inner .elementore-heading{ margin-top: 110vw;}
.sc_03 .sc_inner .elementore-heading.right,.sc_04 .sc_inner .elementore-heading,.sc_05 .sc_inner .elementore-heading.right {text-align: center;}

.sc_06 {background-image: url(/images/m-certification6.png); margin-top: 190px;height:166.78vw}
.sc_06 .sc_inner { padding: 20.42vw 0% 0% 0%;}
.sc_06 .sc_inner .elementore-heading{text-align: center;font-size: 7.8vw;}
.sc_06 .sc_inner .elementore-heading span{font-size: 6.7vw !important;}
.sc_06 .sc_inner .elementore-description{font-size:4.17vw}

.sc_07 h2{font-size: 7.8vw;padding-top: 21.81vw;}
.sc_07 .swiper-slide {height: 127.25vw;align-items: flex-start;width: 100%;}
.sc_07 .swiper-slide .box01 {background-image: url(/images/m-ce-slide1.png);background-size: contain;}
.sc_07 .swiper-slide .box02 {background-image: url(/images/m-ce-slide2.png);background-size: contain;}
.sc_07 .swiper-slide .box03 {background-image: url(/images/m-ce-slide3.png);background-size: contain;}
.sc_07 .swiper-slide .box04 {background-image: url(/images/m-ce-slide4.png);background-size: contain;}
.sc_07 .swiper-slide .box01,.sc_07 .swiper-slide .box02,.sc_07 .swiper-slide .box03,.sc_07 .swiper-slide .box04{background-position: top center;}
.sc_07 .swiper-slide .slide-box {display: flex;justify-content: center;height: 77.474vw;margin-top:0}
.sc_07 .swiper-slide .slide-box dl {text-align: center;padding: 0;padding-top:83.44vw}
.sc_07 .swiper-slide .slide-box dt{font-size: 8.33vw;}
.sc_07 .swiper-slide .slide-box dd{font-size:4.17vw}
.swiper-pagination {bottom: 6.71vw;right: 50%;margin-top: 0;margin-right: -41px;}

.sc_08 {background-image: url(/images/m-certification8.png);height: 166.67vw;}
.sc_08 .sc_inner { padding: 0;justify-content: center;}
.sc_08 .sc_inner .elementore-description{font-size: 8.33vw;text-align: center;}
.sc_08 .sc_inner .elementore-heading{font-size:4.17vw;text-align: center;}

.sc_09 { background-image: url(/images/m-certification9.png);height:166.6667vw}
.sc_09 .sc_inner {min-height: 100%;align-items: flex-start;    padding: 0% 13% 0% 8%;}
.sc_09 .sc_inner .elementore-heading { max-width: 67.36vw;margin-top: 23.61vw;}
.sc_09 .sc_inner .elementore-description{font-size:4.17vw;margin-top: 8.33vw;line-height: 1.5;}
.sc_09 .sc_inner .go { font-size: 3.9063vw;}
.sc_09 .sc_inner .go img {width: 5%;height: auto;margin-left: 10px;margin-top: -1%;}
}

</style>


<div class="certification">

  <div class="sc_01">
    <div class="sc_inner">
      <div class="box">
        <div class="sc-txt">
          <h2 class="elementore-heading ">정품인증</h2>
           <div class="elementore-description">QR코드로 리팟 정품 트리트먼트 팁<br class="m-only"> 사용을 확인하세요</div>
        </div>
      </div>
    </div>
  </div>

  <div class="sc_02 sc_pe">
    <div class="sc_inner">
      <div class="box">
        <div class="sc-txt">
          <h2 class="elementore-heading "><span style="font-weight:600;">안전하고</span><br class="m-none">건강하게</h2>
        </div>
      </div>
    </div>
  </div>

 <div class="sc_03 sc_pe">
    <div class="sc_inner">
      <div class="box">
        <div class="sc-txt">
          <h2 class="elementore-heading right"><span style="font-weight:600;">전 세계 어디에서도</span><br class="">믿을 수 있으니까</h2>
        </div>
      </div>
    </div>
  </div>

   <div class="sc_04 sc_pe">
    <div class="sc_inner">
      <div class="box">
        <div class="sc-txt">
          <h2 class="elementore-heading "><span style="font-weight:600;">나를 위한 단 하나의</span><br class="">트리트먼트 팁</h2>
        </div>
      </div>
    </div>
  </div>

   <div class="sc_05 sc_pe">
    <div class="sc_inner">
      <div class="box">
        <div class="sc-txt">
          <h2 class="elementore-heading right"><span style="font-weight:600;">리팟의 정품<br class="m-only"> 트리트먼트 팁</span><br class="m-none">사용을<br class="m-only"> 반드시 확인하세요</h2>
        </div>
      </div>
    </div>
  </div>

 <div class="sc_06">
    <div class="sc_inner">
      <div class="box">
        <div class="sc-txt">
          <h2 class="elementore-heading">정품 리팟 <br class="m-only">트리트먼트 팁<span style="font-size:2vw;">에는</span></h2>
          <p class="elementore-description">리팟 고유의 정품 인증 QR 코드가 부착되어 있습니다.</p>
        </div>
      </div>
    </div>
  </div>

 <div class="sc_07">
   <h2>정품 인증 방법</h2>
   <div class="sc_inner">
     <div class="box">
       <!-- Swiper -->
       <div class="swiper mySwiper">
         <div class="swiper-wrapper">
           <div class="swiper-slide">
             <div class="slide-box box01">
               <dl>
               <dt>STEP 01</dt>
               <dd>제품에 부착된 정품 인증 스티커를 제거하고<br>QR 코드를 스캔해주세요. </dd>
               </dl>
             </div>
           </div>
           <div class="swiper-slide ">
             <div class="slide-box box02">
               <dl>
               <dt>STEP 02</dt>
               <dd>링크를 클릭하여 페이지에 접속 후 <br>정품 인증 아이콘을 눌러주세요.  </dd>
               </dl>
             </div>
           </div>
           <div class="swiper-slide">
             <div class="slide-box box03">
               <dl>
               <dt>STEP 03</dt>
               <dd>정품 인증 코드를 입력하는 창이 화면에 나타나면 <br>스티커에 표기된 고유 번호를 확인하여 입력합니다. </dd>
               </dl>
             </div>
           </div>
           <div class="swiper-slide">
             <div class="slide-box box04">
               <dl>
               <dt>STEP 04 </dt>
               <dd>정품 인증 결과를 <br>화면에서 확인해주세요. </dd>
               </dl>
             </div>
           </div>
         </div>

         <div class="swiper-pagination"></div>
       </div>
     </div>
   </div>
 </div>

 <div class="sc_08">
    <div class="sc_inner">
      <div class="box">
        <div class="sc-txt">
          <h2 class="elementore-heading">정품 인증 후 나타나는 새로운 세상</h2>
          <p class="elementore-description">다양한 리팟 콘텐츠를<br> 만나보세요</p>
        </div>
      </div>
    </div>
  </div>

<div class="sc_09">
    <div class="sc_inner">
      <div class="box">
        <div class="sc-txt">
          <h2 class="elementore-heading"><img src="/images/ce-center-logo-tablet.png" alt=""></h2>
          <div class="elementore-description">
            <ul>
              <li>SOS 긴급요청 : 010-4669-2882</li>
              <li>평일 09:00 ~ 18:00</li>
              <li>토요일, 일요일, 공휴일 휴무</li>
            </ul>
          </div>
          <div class="go">
            <a href="https://ilooda.com/contact/">문의하기<img src="/images/arrow-right-b.png" alt=""></a>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
  <!-- Swiper JS -->
       <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

       <!-- Initialize Swiper -->
       <script>
       var swiper = new Swiper(".mySwiper", {
       spaceBetween: 30,
       centeredSlides: true,
       //autoplay: {
       //delay: 2500,
       //disableOnInteraction: false,
       //},
       pagination: {
       el: ".swiper-pagination",
       clickable: true,
       },
       navigation: {
       nextEl: ".swiper-button-next",
       prevEl: ".swiper-button-prev",
       },
       });
       </script>
<?php
include_once(G5_PATH.'/tail.php');