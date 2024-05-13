<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if(defined('G5_THEME_PATH')) {
    require_once(G5_THEME_PATH.'/index.php');
    return;
}

include_once(G5_MOBILE_PATH.'/head.php');
?>

<!-- 메인화면 최신글 시작 -->
<style>
	#company_wrap{
		max-width: 660px;
		margin: 0 auto;
		padding: 210px 0 130px 0;
		text-align:center;
	}
	#company_wrap .company_tit{
		margin: 0 auto 150px 0;
	}
	#company_wrap .company_sub_tit{
		width: 90%;
		margin:0 auto;
	}
	#company_wrap .company_sub_tit h4{
		font-size: 24px;
		margin-bottom: 50px;
	}
	#company_wrap .company_sub_tit span{
		font-size: 16px;
		line-height:2;
	}
	#company_wrap .company_sub_tit p{
		font-size: 16px;
		line-height:2;
		margin-top: 50px;
		margin-bottom: 80px;
	}
	#company_wrap .company_info{
		display: flex;
		align-items: center;
		justify-content: center;
		gap:20px;
		flex-wrap:wrap;
	}
	#company_wrap .company_info .company_left,
	#company_wrap .company_info .company_right{
		display: flex;
		gap:40px;
	}
	#company_wrap .contact_us{
		margin: 100px 0 50px 0;
	}
	#company_wrap .contact_us span{
		font-size:	42px;
	}
	#company_wrap .contact_us_info{
		width: 90%;
	    display: flex;
		flex-direction: column;
		gap:20px;
		margin: 60px auto;	
	}
	#company_wrap .contact_us_info .addr{
		display: flex;
		justify-content: center;
		align-items: center;
	}
	#company_wrap .contact_us_info .addr span{
		width: 90%;
		text-align:left;
		margin-left: 20px;
		font-size: 16px;
	}
	.company_info{font-size:20px;}
	#company_wrap .company_tit img{width: 70%;}
</style>
<div id="company_wrap">
	<div class="company_tit">
		<img src="/images/blue_logo.png" alt="">
	</div>
	<div class="company_sub_tit">
		<h4>TEAMHOPE는 ‘희망’을 꿈꾸는 사람들이 함께 합니다.</h4>
		<span style="font-size:12px; letter-spacing:-1px;">TEAMHOPE는 배우가 지금 이 순간에 뜨겁게 몰입할 수 있도록 결속하고 <br>지금보다 미래가 더 기대되는 신인 연기자의 열정을 지지하며<br>건강한 콘텐트를 매개로 대중들에게 희망을 전달하고자 하는<br>확신을 지닌 사람들이 함께 합니다. </span>
		<p><!-- 보이지 않는 것들을 희망으로 볼 수 있도록 그리고 보이는 것들을 희망으로 이끌 수 있도록<br>열의와 담대함으로 매 순간 성장하는 <strong>TEAMHOPE</strong>와 함께해 주세요. --></p>
	</div>

	<div class="company_info">
		<div class="company_left">
			<h4>TEAMHOPE</h4>
			<span>SINCE 2024</span>
		</div>
		<div class="company_right">
			<h4>대표이사</h4>
			<span>김상훈</span>
		</div>
	</div>

	<div class="contact_us">
		<span style="font-size:24px;">CONTACT US</span>
	</div>
	<div class="contact_us_map">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12659.124570060572!2d127.01285768715825!3d37.513079700000006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x357ca3007d3cea05%3A0x1abe303b3e7bfb6e!2z7YyA7Zi47ZSE!5e0!3m2!1sko!2skr!4v1708583947686!5m2!1sko!2skr" width="90%" height="680px" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
	</div>
	<div class="contact_us_info">
		<div class="addr">
			<div class="img_wrap">
				<img src="/images/pc_maps.png" alt="">
			</div>
			<span>서울시 강남구 학동로30길 16, 남강빌딩 7층</span>
		</div>
		<div class="addr">
			<div class="img_wrap">
				<img src="/images/phone.png" alt="">
			</div>
			<span>+82 2 547 0815</span>
		</div>
		<div class="addr">
			<div class="img_wrap">
				<img src="/images/mail.png" alt="">
			</div>
			<span>teamhope.ent@gmail.com</span>
		</div>
	</div>

</div>

<!-- 메인화면 최신글 끝 -->

<?php
include_once(G5_MOBILE_PATH.'/tail.php');