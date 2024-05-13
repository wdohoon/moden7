<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_PATH.'/tail.php');
    return;
}
?>
<style>
	footer {
		background: #000;
		height: auto;
		padding-bottom: 50px;
	}
	footer .foot_wrap{
		padding: 4.6vw 2.6vw 0 2.6vw;
		margin:0 auto;
	}
	footer .foot_wrap .us{
		margin-top:45px;
	}
	footer .foot_wrap .us span{
		color: #fff;
		font-size: 23px;
		font-weight: 700;
		font-family: 'Montserrat';
	}
	footer .foot_wrap .us_info{
		margin-top: 20px;
	}
	footer .foot_wrap .us_info span{
		color: #808080;
		line-height: 2;
		font-size: 18px;
		letter-spacing: -2px;
		font-weight: 500;
		font-family: 'Noto Sans KR';
	}
	footer .foot_wrap .copyright{
		display: flex;
		margin-top: 55px;
		justify-content: space-between;
	}
	footer .foot_wrap span{
		color: #333333;
		font-size: 18px;
	}
	footer .foot_lg img{width: 40%;}
	footer .foot_wrap .foot_sns{margin: 50px 0 50px 0;}
	footer .foot_wrap .foot_sns img{width: 40px;height: 40px;margin-right: 24px;}
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
		<div class="foot_sns">
			<a href="https://www.youtube.com/@TEAMHOPE_ent" target="_blank"><img src="/images/foot_youtube.png" alt=""></a>
			<a href="https://www.instagram.com/teamhope_ent" target="_blank"><img src="/images/foot_insta.png" alt=""></a>
		</div>
		<span>Copyright ⓒ 2024 TEAMHOPE All rights reserved.</span>	
	</div>
</footer>

<?php
include_once(G5_PATH."/tail.sub.php");