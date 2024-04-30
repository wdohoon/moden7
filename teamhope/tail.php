<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_PATH.'/tail.php');
    return;
}

if (G5_IS_MOBILE) {
    include_once(G5_MOBILE_PATH.'/tail.php');
    return;

}
?>
<style>
	footer {
		background: #000;
		height: auto;
	}
	footer .foot_wrap{
		padding: 2.6vw 16.7vw 0 16.7vw;
		margin:0 auto;
	}
	footer .foot_wrap .us{
		margin-top:45px;
	}
	footer .foot_wrap .us span{
		color: #fff;
		font-size: 18px;
	}
	footer .foot_wrap .us_info{
		margin-top: 20px;
	}
	footer .foot_wrap .us_info span{
		color: #5e5e5e;
		line-height: 2;
		font-size: 14px;
	}
	footer .foot_wrap .copyright{
		display: flex;
		padding: 55px 0 20px 0;
		justify-content: space-between;
	}
	footer .foot_wrap .copyright span{
		color: #2c2c2c;
		font-size: 14px;
	}
	footer .foot_sns{display: flex; gap:10px;}
	footer .foot_wrap .foot_lg img{width: 15%;}
</style>

<footer>
	<div class="foot_wrap">
		<div class="foot_lg">
			<img src="/images/foot_lg.png" alt="">
		</div>
		<div class="us">
			<span>CONTACT US</span>
		</div>
		<div class="us_info">
			<span>서울시 강남구 학동로 30길 16, 남강빌딩 7층 <br>+82 2 547 0815 <br> teamhope.ent@gmail.com</span>
		</div>
		<div class="copyright">
			<span>Copyright ⓒ 2024 TEAMHOPE All rights reserved</span>
			<div class="foot_sns">
				<a href="https://www.youtube.com/@TEAMHOPE_ent" target="_blank"><img src="/images/foot_youtube.png" alt=""></a>
				<a href="https://www.instagram.com/teamhope_ent" target="_blank"><img src="/images/foot_insta.png" alt=""></a>
			</div>
		</div>
	</div>
</footer>



<?php
include_once(G5_PATH."/tail.sub.php");