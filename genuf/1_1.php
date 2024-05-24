<?php
include_once('./_common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_PATH.'/1_1.php');
    return;
}

if (G5_IS_MOBILE) {
    include_once(G5_MOBILE_PATH.'/1_1.php');
    return;
}

include_once(G5_PATH.'/head.php');
?>


	<style>
		#brand-sty .br-sty1 img {width:100%;}
		#brand-sty .br-sty2 img {width:100%;}
		#brand-sty .br-sty3 img {width:100%;}
		#brand-sty .br-sty4 img {width:100%;}
		#brand-sty .br-sty5	{padding-bottom:200px;}
		#brand-sty .br-sty5 img {width:100%;}
	</style>


	<div id="brand-sty">
		<div class="br-sty1">
			<img src="/img/brand1.png" alt="">
		</div>
		<div class="br-sty2">
			<img src="/img/brand2.png" alt="">
		</div>
		<div class="br-sty3">
			<img src="/img/brand3.png" alt="">
		</div>
		<div class="br-sty4">
			<img src="/img/brand4.png" alt="">
		</div>
		<div class="br-sty5">
			<img src="/img/brand5.png" alt="">
		</div>
	</div>



<?php
include_once(G5_PATH.'/tail.php');