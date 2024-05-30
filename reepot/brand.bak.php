

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

  <!-- Demo styles -->
<style>
html,body {position: relative;height: 100%;}
body {background: #eee;font-family: Helvetica Neue, Helvetica, Arial, sans-serif;font-size: 14px;color: #000;margin: 0;padding: 0;}
.swiper {width: 100%;height: 100%;}
.swiper-slide {text-align: center;font-size: 18px;background: #fff;display: flex;justify-content: center;align-items: center;}
.swiper-slide img {display: block;width: 100%;height: 100%;object-fit: cover;}
.swiper-slide:nth-of-type(1){background:url(/images/sc02_img01.png)}
.swiper-slide:nth-of-type(2){background:url(/images/sc02_img02.png)}
.swiper-slide:nth-of-type(3){background:url(/images/sc02_img03.png)}
.swiper-slide:nth-of-type(4){background:url(/images/sc02_img04.png)}
.swiper-slide:nth-of-type(5){background:url(/images/sc02_img05.png)}
.swiper-slide:nth-of-type(6){background:url(/images/sc02_img06.png)}
.swiper-slide:nth-of-type(7){background:url(/images/sc02_img07.png)}
.swiper-slide:nth-of-type(8){background:url(/images/sc02_img08.png)}
.swiper-slide:nth-of-type(9){background:url(/images/sc02_img09.png)}

</style>
<div class="sub">

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
<!-- Swiper -->
  <div class="swiper mySwiper">
    <div class="swiper-wrapper">
    <!--   <div class="swiper-slide"><img src="/images/sc02_img01.png" alt=""></div>
      <div class="swiper-slide"><img src="/images/sc02_img02.png" alt=""></div>
      <div class="swiper-slide"><img src="/images/sc02_img03.png" alt=""></div>
      <div class="swiper-slide"><img src="/images/sc02_img04.png" alt=""></div>
      <div class="swiper-slide"><img src="/images/sc02_img05.png" alt=""></div>
      <div class="swiper-slide"><img src="/images/sc02_img06.png" alt=""></div>
      <div class="swiper-slide"><img src="/images/sc02_img07.png" alt=""></div>
      <div class="swiper-slide"><img src="/images/sc02_img08.png" alt=""></div>
      <div class="swiper-slide"><img src="/images/sc02_img09.png" alt=""></div> -->
        <div class="swiper-slide"></div>
        <div class="swiper-slide"></div>
        <div class="swiper-slide"></div>
        <div class="swiper-slide"></div>
        <div class="swiper-slide"></div>
        <div class="swiper-slide"></div>
        <div class="swiper-slide"></div>
        <div class="swiper-slide"></div>
        <div class="swiper-slide"></div>
    </div>
  </div>
<div class="s_con con09">
    <div class="s_con-inner">
      <div class="box">
        <div class="text">
        <h2 class="heading-title ">가까운 병·의원 원장님과 상담하세요</span></h2>
        <p class="widget-container2">엔디야그레이저수술기<br>
          " 이 제품은 의료기기이며, 사용 전 사용상의 주의사항과 사용방법을 반드시 읽고 사용하십시오."<br>
          광고심의필 심의번호 : 조합-2022-35-011<br>
          (유효기간 2025-09-29)
        ​</p>
        </div>
      </div>
    </div>
	</div>

  <div class="s_con con10">
    <div class="s_con-inner">
      <div class="box">
       <ul>
          <li><a href="/technology.php">리팟 핵심 기술 VSLS® 탐구하기</a></li>
          <li><a href="/hospitals.php">병원찾기</a></li>
          <li><a href="/service-center.php">자주 묻는 질문</a></li>
       </ul>
      </div>
    </div>
	</div>
  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper(".mySwiper", {
      direction: "vertical",
      slidesPerView: 1,
      spaceBetween: 0,
      mousewheel: true,
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });
  </script>

<?php
include_once(G5_PATH.'/tail.php');
?>
</div>
