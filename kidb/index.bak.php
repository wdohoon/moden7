<?php
include_once('./_common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가


include_once(G5_PATH.'/head.php');
?>

<link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

<script type="module"> import Swiper from 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.mjs' const swiper = new Swiper(...)</script>
<link rel="stylesheet" href="../css/index.css">

<div class="body">
	<div id="connecting">
		<img src="../img/connecting.png" alt="">
	</div>

<section>
	<div class="swiper-container finance-slider">
		<div class="swiper-wrapper">
			<!-- 자금시장 슬라이드 -->
			<div class="swiper-slide">
				<div class="main_box">
					<div class="white_box">
						<h1>자금시장 · 파생시장</h1>
						<p class="no1">KOREA’S NO.1 BROKERAGE FIRM</p>
						<br>
						<p>KIDB는 국내 다양한 기관 투자자들에게</p>
						<p>자금시장과 파생시장의 중개서비스를 제공합니다.</p>
						<div class="white_boxs">
							<div class="white_box_btn">
								<a href="#" class="jageum"><span>자금시장</span></a>
								<a href="#" class="pasang"><span>파생시장</span></a>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- 채권시장 슬라이드 -->
			<div class="swiper-slide">
				<div class="main_box">
					<div class="white_box">
						<h1>채권시장</h1>
						<p class="no1">KOREA’S NO.1 BROKERAGE FIRM</p>
						<br>
						<p>KIDB는 국내 다양한 기관 투자자들에게</p>
						<p>원화채권,외화 채권의 중개,인수매매 서비스를 제공합니다.</p>
						<div class="white_boxs">
							<div class="white_box_btn">
								<a href="#" class="jageum"><span>자금시장</span></a>
								<a href="#" class="pasang"><span>파생시장</span></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Add pagination -->
		<div class="swiper-pagination"></div>
	</div>
</section>
	<div>
		<img src="../img/working.png" alt="">
	</div>

<swiper-container class="mySwiper" navigation="true">
  <swiper-slide>
    <div class="building">
		  <div class="arrow">
			<button><img src="../img/left.png" alt=""></button>
			<button><img src="../img/right.png" alt=""></button>
		  </div>
		<div class="buildings_img">
			<img src="../img/buildings2.png" alt="">
		</div>
    </div>
  </swiper-slide>
  <swiper-slide>
    <div class="building">
		<div class="arrow">
			<button><img src="../img/left.png" alt=""></button>
			<button><img src="../img/right.png" alt=""></button>
		</div>
		<div class="buildings_img">
			<img src="../img/buildings.png" alt="">
		</div>
    </div>
  </swiper-slide>
</swiper-container>

<script>
	const mySwiper = new Swiper('.finance-slider', {
	  direction: 'horizontal'
	});
</script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-element-bundle.min.js"></script>

<?php
include_once(G5_PATH.'/tail.php');