
<?php
include_once('./_common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_PATH.'/reepot.php');
    return;
}

if (G5_IS_MOBILE) {
    include_once(G5_MOBILE_PATH.'/reepot.php');
    return;
}

include_once(G5_PATH.'/head.php');
?>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

<style>
.m-only{display:none}
.s_con{width: 100%;position:relative}
.s_con-inner {height: 56vw;display: flex;align-items: center;}
.s_con-inner .box{text-align: left;margin: 0% 0% 0% 15%;}
.s_con-inner .box .text h2{color: #4C4C4E;font-family: "KoPubWorldDotum", Sans-serif;font-size: 2.6vw;font-weight: 600;line-height: 1.4em;}
.s_con-inner .box .text h2{margin-top: 15px;}

.con01{background-image: url(/images/rp-desk.png);background-position: center center;background-repeat: no-repeat;background-size: cover;}
.con01 .s_con-inner .s_con-topimg{width: 20vw;}

.con02{background-image: url(/images/rp-desk2.png);background-position: center center;background-repeat: no-repeat;background-size: cover;}
.con02 .s_con-inner .box { margin: 0% 0% 0% 50%;}
.con02 .s_con-inner .s_con-topimg{width: 9.6vw;height: 5vw;}
.con02 .s_con-inner .box .text{ display: flex;}
.con02 .s_con-inner .box .text h2{margin-top: 2.7em;margin-left: 36px;font-size: 1.3vw;color:#4C4C4E;font-weight: 400;}

.con03{background-image: url(/images/rp-main03.png);background-position: center center;background-repeat: no-repeat;background-size: cover;}
.con03 .s_con-inner .box .text h2.heading-title{font-size: 3.1vw;font-weight: 600;line-height: 1.3em;}
.con03 .s_con-inner .box .text h2.heading-title span{font-size:2vw;}
.con03 .s_con-inner .box .text h2.heading-title2{font-size: 1.3vw;font-weight:400}

.con04{background-image: url(/images/rp-main04.png);background-position: center center;background-repeat: no-repeat;background-size: cover;}
.con04 .s_con-inner{justify-content: center;}
.con04 .s_con-inner .box{margin:0; text-align: center;}
.con04 .widget-container{}
.con04 .widget-container span{display:block;background-color: rgba(255, 255, 255, 0.4);
border-radius: 100px;text-align: center;color: #4C4C4E;font-size: 0.9vw;font-weight: bold;padding-left: 2vw;padding-right: 2vw;padding-top: 3px;padding-bottom: 3px;display: inline-block;}
.con04 .widget-container2{ margin-top:20px; text-align:center;  font-weight: 400;line-height: 1.4em;}
.con04 .widget-container2 .wi-bo{border-left: 1px solid #4C4C4E;font-size: 1.3vw;opacity: 40%;}

.con05{background-image: url(/images/rp-desk03.png);background-position: center center;background-repeat: no-repeat;background-size: cover;}
.con05 .s_con-inner{justify-content: center;}
.con05 .s_con-inner .box{margin:0;text-align: center;}

.con05 .widget-container2{ margin-top:20px; text-align:center;  font-weight: 400;line-height: 1.4em;}
.con05 .widget-container2 .wi-bo{    border-left: 1px solid #4C4C4E;font-size: 1.3vw;opacity: 40%;}
.con05 .note{ padding: 0% 0% 0% 15%;color: #CCCCCC;font-size: 1vw;    text-align: left;font-weight: 400;    position: relative;bottom: 100px;line-height: 30px;}
.con05 .note img{width:1vw}

.con06{background-image: url(/images/rp-main06-1.png);background-position: center center;background-repeat: no-repeat;background-size: cover;}
.con06 .s_con-inner{height: 50vw;}
.con06 .s_con-inner .box{margin: 5% 0% 0% 20%;}
.con06 .s_con-inner .box .text h2, .con07 .s_con-inner .box .text h2{font-size:3.1vw}
.con06 .s_con-inner .box .text p, .con07 .s_con-inner .box .text p{font-size: 1vw;}
.con06 .s_con-inner .box .text .col, .con07 .s_con-inner .box .text .col{display:block;color: #27aae1; font-size: 1.3vw; font-weight:600;padding:0}

.con07{margin-top: 150px;background-image: url(/images/rp-main07.png);background-position: center center;background-repeat: no-repeat;background-size: cover;}
.con07 .s_con-inner {height: 40vw;padding-top: 230px;   align-items: flex-start;}
.con07 .s_con-inner .box{margin: 0 0% 0% 50%;}
.con07 .btn_tip{font-size: 1vw;font-weight: 400;border-style: solid;border-width: 1px 1px 1px 1px;border-color: #CCCCCC;display:block;width:250px;border-radius: 0.4em;margin-top:15px;padding: 0.8em 2.2em 0.8em 2.2em;}
.con07 .btn_tip:hover {border-style: solid;background:#27AAE1;border-width: 1px 1px 1px 1px;color:#fff;border-color: #27AAE1;border-radius: 8px;}

.con08 {margin-top: 20.04vw;}
.con08 .s_con-inner{height: 54vw;}

.con08 .swiper {width: 100%;height: 100%;}
.con08 .swiper-slide {text-align: center;font-size: 18px;background: #fff;display: flex;justify-content: center;align-items: center;}
.con08 .swiper-slide img {display: block;width: 100%;height: 100%;object-fit: cover;}
.con08 h2{width:100%;font-size: 2vw;font-weight: 400;z-index: 10;position: absolute;left: 0;bottom: 0;}
.con08 h2 .col{color: #27AAE1;display:block;font-family: "KoPubWorldDotum", Sans-serif;font-size: 3.1vw;font-weight: 600;line-height: 80px;}


.con09 .s_con-inner .box .text h2 {font-size: 3.1vw;margin-top: 130px;}
/*.con09*/
.con09 .s_con-inner { align-items: flex-start;justify-content: center;}
.con09 .s_con-inner .box {margin: 0% ;}

.con09 .s_con-inner .box .text .widget-container2{text-align: center;margin-bottom: 10vw;font-size: 0.9375vw;font-weight: 400;margin-top: 30px;line-height: 1.5em;letter-spacing: 0px;}
.con09 .box-list{display: flex;justify-content: space-between;    margin-top: -48px;}
.con09 .box-list a{display: flex;flex-direction: column;align-items: center;color: #27aae1;font-size: 1.0938vw;}
.con09 .box-list a img{margin-bottom:25px}
.con09 .widget-container3{text-align: center;padding: 25px 0;margin-top: 85px;border: 1px solid #ebebeb;border-radius: 26px;font-size: 0.9375vw;}


.con10 .s_con-inner{height: 100%;display: block;justify-content: center;align-items: center;margin-top: 100px;margin-bottom: 100px;padding: 150px 0px 150px 0px;}
.con10 .s_con-inner .box{margin-left:0}
.con10 .box ul{display:flex; justify-content: space-between;    justify-content: space-evenly;}
.con10 .box ul li{}
.con10 .box a{font-size: 1.25vw;font-weight: 400;position: relative;line-height: 40px;fill: #4C4C4E;    transition: all 0.1s;color: #4C4C4E;}
.con10 .box a:hover {font-weight: 600;}
.con10 .box a:after{content: "";position: absolute;left: 0;bottom: -10px;width: 0px;height: 2px;margin: 5px 0 0;transition: all 0.2s ease-in-out;transition-duration: 0.3s;opacity: 0;background-color: #4C4C4E;}
.con10 .box a:hover:after{width: 100%;opacity: 1;}

@media only screen and (max-width: 1440px) {
.s_con-inner{height:54.9306vw}

}

@media only screen and (max-width: 1280px) {
.con02 .s_con-inner .box .text h2 {margin-top: 1.7em;margin-left: 16px;font-size: 1.7vw;font-weight: 400;}
.con03 .s_con-inner .box .text h2.heading-title2 {font-size: 1.7vw;font-weight: 400;}
.con04 .widget-container span { font-size: 1.2vw;}

.con09 .box-list a { font-size: 1.6vw;}
.con09 .widget-container3 { font-size: 1.375vw;}

}

@media only screen and (max-width: 1040px) {
.con02 .s_con-inner .box .text h2{font-size: 1.5vw;}
.con03 .s_con-inner .box .text h2.heading-title2 {font-size: 1.5vw;}
.con05 .note {font-size: 1.3vw; bottom: 50px;}
.con06 .s_con-inner .box .text .col, .con07 .s_con-inner .box .text .col { font-size: 2.3vw;}
.con06 .s_con-inner .box .text p, .con07 .s_con-inner .box .text p {font-size: 1.4vw;}
.con07 .btn_tip {font-size: 1.3vw;}
.con08 h2 { font-size:4vw;}.con08 h2 .col {  font-size: 4.1vw;}
.con09 .s_con-inner {height: 75vw;    padding-top: 150px;}
.con09 .s_con-inner .box .text h2 {font-size: 4.1vw;margin-top: 90px;}
.con09 .s_con-inner .box .text .widget-container2 {font-size: 1.3vw;}
.con09 .s_con-inner .box .text h2 {margin-top:0}

.con10 .box a {font-size: 2.25vw;}
}

@media only screen and (max-width: 768px) {
.con08 .s_con-inner { height: 146.6042vw;}
.con08 .swiper-slide img { width: auto;height: auto;}
}
@media only screen and (max-width: 720px) {
.m-only{display:block}
.m-none{display:none}
.con01 .s_con-inner {    height: 151.25vw;}
.con01 .s_con-inner .s_con-topimg {width: 55vw;}
.con01 {background-image:none;}
.con01 .s_con-inner .box {text-align: left;margin: 18.23vw 0% 50px 0;text-align:center}
.con01 .s_con-inner .box .text h2 {font-size: 7vw;}
.con01  .s_con-inner {flex-direction: column;}
/* .con01 .m-img{ background-image: url(/images/m-rp-desk.png);    background-position: center center;height: 620px;width: 100%;background-size: auto 620px;} */

.con02 {background-image: url(/images/m-rp-desk2.png);}
.con02 .s_con-inner {height: 156.25vw;align-items: flex-start;justify-content: center;}
.con02 .s_con-inner .box .text {margin-top:19.53vw;flex-direction: column;justify-content: center;    align-items: center;}
.con02 .s_con-inner .box {margin: 0% 0% 0% 0%;}
.con02 .s_con-inner .s_con-topimg {width: auto;height: 13vw;}
.con02 .s_con-inner .box .text h2 {font-size: 4vw;text-align: center;margin:5.86vw 0 0 0;}

.con03 {background-image: url(/images/m-rp-main03.png);}
.con03 .s_con-inner {height: 156.25vw;align-items: flex-start;justify-content: center;}
.s_con-inner .box {  margin: 0;}
.con03 .s_con-inner .box .text{margin-top:22.14vw}
.con03 .s_con-inner .box .text h2.heading-title{font-size: 8.1vw;}
.con03 .s_con-inner .box .text h2.heading-title span {font-size: 6vw;}
.con03 .s_con-inner .box .text h2.heading-title2 {font-size: 4vw;margin-top: 25px;text-align: center;}

.con04 {background-image: url(/images/m-rp-main04.png);}
.con04 .s_con-inner {height: 156.25vw;align-items: flex-start;justify-content: center;}
.con04 .s_con-inner .box { text-align: center;}
.con04 .s_con-inner .box .text{margin-top:22.14vw}
.con04 .widget-container span {font-size: 3.5vw;}
.con04 .s_con-inner .box .text h2 { font-size: 7.6vw;}
.con04 .widget-container2{font-size: 3.9vw;    margin-top: 30px;}
.con04 .widget-container2 .wi-bo{display:none}

.con05 {background-image: url(/images/m-rp-desk03.png);}
.con05 .s_con-inner {height: 156.25vw;align-items: flex-start;justify-content: center;}
.con05 .s_con-inner .box .text{margin-top: 54.95vw}
.con05 .s_con-inner .box .text h2{    font-size: 5.6vw;}
.con05 .widget-container2 .wi-bo{display:none}
.con05 .widget-container2{font-size: 3.9vw;margin-top: 30px;}
.con05 .note{font-size: 3vw;bottom: 57px; padding:0 0 0 5.73vw}
.con05 .note img{width:auto ;vertical-align: text-top;}

.con06 {background-image: none;}
.con06 .s_con-inner {display: block;margin-top: 22.14vw;    height: 142.5781vw;}
.con06 .s_con-inner .box {margin: 0 5.21vw 0 0; text-align: right;}
.con06 .s_con-inner .box .text h2, .con07 .s_con-inner .box .text h2 {font-size: 7.1vw;margin-top: 0;}
.con06 .s_con-inner .box .text p, .con07 .s_con-inner .box .text p {font-size: 3.5vw;}
.con06 .s_con-inner .box .text .col, .con07 .s_con-inner .box .text .col {font-size: 4.3vw;}

.con07 {background-image:none}
.con07 .s_con-inner {display: block;padding: 0;    height: 142.5781vw;}
.con07 .s_con-inner .box{margin: 0 0 0 5.21vw;}
.con07 .s_con-inner .box .text h2{margin-top: 30px;}
.con07 .btn_tip {font-size: 3vw;width: 45vw;padding: 0.8em 2.2em 0.8em 1em;}

.con08{margin-top: 26.04vw}
.con08 h2 {bottom: 175px;font-size: 7.1vw;}
.con08 h2 .col{font-size: 8.1vw;}
.con08 .swiper-slide img { width: auto;height: auto;}

.con09 .s_con-inner {height: auto;}
.con09 .s_con-inner .box .text h2 { text-align: center;font-size: 7.8vw;}
.con09 .fp-tableCell {height: 300px !important;}
.con09 .s_con-inner .box .text .widget-container2 {text-align: center;font-size: 3.1256vw;padding: 0 2%;}
.con09 {margin-top: 0; background-image: none}
.con09 .box-list { flex-direction: column;align-items: center;}
.con09 .box-list a{ font-size:4.00vw;  margin: 20px 0;}
.con09 .widget-container3 {font-size: 3.1256vw;margin: 50px 4%;}

.con10 .s_con-inner { margin-top: 0;margin-bottom: 0;}
.con10 .box ul{display: flex;justify-content: space-evenly;flex-direction: column;align-items: center;}
.con10 .box ul li {margin: 30px 0;}
.con10 .box a {font-size: 4.25vw;}
}

</style>



<div class="reepot">
	<div class="s_con con01">
    <div class="s_con-inner">
      <div class="box">
        <div class="text">
        <img src="/images/logo-03.png" alt="" class="s_con-topimg">

        <h2 class="heading-title ">리팟의<br>안전하고 섬세한 에너지<span style="font-weight:400">를<br> 경험해보세요</span></h2>
        </div>
      </div>
      <span class="m-img m-only"><img src="/images/m-rp-desk.png" alt=""></span>
    </div>
	</div>

  	<div class="s_con con02">
    <div class="s_con-inner">
      <div class="box">
        <div class="text">
        <img src="/images/rp-desk4.png" alt="" class="s_con-topimg">
        <h2 class="heading-title " >VSLS® 기술이 접목된 핸드피스를 사용하여<br>조직에 에너지를 전달하는 방식으로<br>식품의약품안전처에 허가받은 의료기기입니다.</h2>
        </div>
      </div>
    </div>
	</div>


	<div class="s_con con03">
    <div class="s_con-inner">
      <div class="box">
        <div class="text">
          <h2 class="heading-title ">리팟<span>의 </span><br class="m-none"> 과냉각 기술<span>은</span></h2>
          <h2 class="heading-title2 ">통증이 적고 안전한 시술을 선사합니다. <br>빠른 시술 속도로 시간에 대한 부담이 적어 <br>빠른 일상 복귀를 기대할 수 있습니다.</h2>
        </div>
      </div>
    </div>
	</div>

	<div class="s_con con04">
    <div class="s_con-inner">
      <div class="box">
        <div class="text">
          <div class="widget-container">
            <span>Single</span>
            <span>AutoDerm</span>
            <span>Semi Auto Derm</span>
          </div>
          <h2 class="heading-title ">3가지 모드로 섬세하게</h2>
          <p class="widget-container2 ">
          <span class="wi-bo"><br><br></span>원하는 타깃에 맞는 모드를 선택할 수 있습니다.</p>
        </div>
      </div>
    </div>
	</div>


	<div class="s_con con05">
    <div class="s_con-inner">
      <div class="box">
        <div class="text">
          <h2 class="heading-title ">스마트글라스(HMD)는</h2>
          <p class="widget-container2 "><span class="wi-bo"><br><br></span>넓은 타깃 부위와 어려운 시술 환경에서도 <br> 몰입감 높은 정확한 시술을 제공합니다.</p>
        </div>
      </div>
    </div>
    <p class="note"><img src="/images/find-icon.png" > 스마트 글라스는 의료기기가 아닙니다.</p>

	</div>


	<div class="s_con con06">
    <div class="s_con-inner">
    <img src="/images/m-rp-main06-1.png" class="m-only" alt="">
      <div class="box">
        <div class="text">
        <h2 class="heading-title ">부드럽고 안전하게</span></h2>
        <p class="widget-container2 "><span class="col">reepot coupling fluid</span>리팟 커플링 플루이드</p>
        </div>
      </div>
    </div>
	</div>


	<div class="s_con con07">
    <div class="s_con-inner">
        <img src="/images/m-rp-main07.png" class="m-only" alt="">

      <div class="box">
        <div class="text">
        <h2 class="heading-title ">오직 나만의 시간</span></h2>
        <p class="widget-container2 "><span class="col">reepot tip</span>리팟 팁</p>
        <a href="" class="btn_tip">정품 팁 인증 알아보기</a>
        </div>
      </div>
    </div>
	</div>

	<div class="s_con con08">
  <div class="s_con-inner">
    <!-- Swiper -->
    <div class="swiper mySwiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide"><img src="/images/rp-slide01.png" alt=""></div>
        <div class="swiper-slide"><img src="/images/rp-slide02.png" alt=""></div>
        <div class="swiper-slide"><img src="/images/rp-slide03.png" alt=""></div>
        <div class="swiper-slide"><img src="/images/rp-slide04.png" alt=""></div>
        <div class="swiper-slide"><img src="/images/rp-slide05.png" alt=""></div>
        <div class="swiper-slide"><img src="/images/rp-slide01.png" alt=""></div>
        <div class="swiper-slide"><img src="/images/rp-slide02.png" alt=""></div>
        <div class="swiper-slide"><img src="/images/rp-slide03.png" alt=""></div>
        <div class="swiper-slide"><img src="/images/rp-slide04.png" alt=""></div>
        <div class="swiper-slide"><img src="/images/rp-slide05.png" alt=""></div>
      </div>
    </div>
  </div>
    <h2>리팟을 누릴 권리는 <span class="col">모두에게</span></h2>
</div>

 <div class="s_con con09 section">
      <div class="s_con-inner">
        <div class="box">
          <div class="text">
          <h2 class="heading-title ">가까운 병·의원 원장님과 상담하세요</span></h2>
          <p class="widget-container2">엔디야그레이저수술기<br>
            " 이 제품은 의료기기이며, 사용 전 사용상의 <br class="m-only">주의사항과 사용방법을 반드시 읽고 사용하십시오."</p>
          </div>
          <ul class="box-list">
            <li><a href="/bbs/board.php?bo_table=p29"><img src="/images/con09_box-list01.png" alt="">병원찾기</a></li>
            <li><a href="/technology.php"><img src="/images/con09_box-list02.png" alt="">리팟 핵심 기술 VSLS® 탐구하기</a></li>
            <li><a href="/service.php"><img src="/images/con09_box-list03.png" alt="">자주 묻는 질문</a></li>
         </ul>
         <p class="widget-container3">  심의 승인 번호 (조합-2022-35-011) / <br class="m-only">유효기간 (2025-09-29)​</p>
        </div>
      </div>
    </div>


  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
<!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper(".mySwiper", {
      centeredSlides: true,
      loop:true,
      slidesPerView: 4,
      autoplay: {
        delay: 2500,
       disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
  breakpoints: { //반응형
 	  	 // 화면의 넓이가 320px 이상일 때

         	769: {
      	slidesPerView: 4,

   		 },
         320: {
      	slidesPerView: 1,

   		 },
        }
    });
  </script>

</div>

<?php
include_once(G5_PATH.'/tail.php');