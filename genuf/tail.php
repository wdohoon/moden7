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
footer{background:#F8F8F8;width: 1919px;overflow:hidden;}
.footer_wrap{width: 1280px;margin:0 auto;height: 266px;display: flex;}
.footer_wrap .footer{display: flex;}
.footer_wrap .footer img{width: 125px;height: 26px;margin: 120px 80px;}
.footer_wrap .footer .footer_info{padding: 113px 110px 79px 0;font-size: 14px;font-weight: 300;line-height: 14px;}
.footer_wrap .footer .footer_info p:nth-child(2),.footer_wrap .footer .footer_info p:nth-child(3){padding-top: 16px;}
.footer_wrap .footer .footer_ask{display: flex;}
.footer_wrap .footer .footer_ask {padding: 111px 36px 109px 0;}
.footer_wrap .footer .footer_ask p{font-size: 14px;font-weight: 300;line-height: 14px;display: flex;flex-direction: column;gap: 12px;}
.footer_wrap .footer .footer_ask span{font-size: 24px;font-weight: 700;line-height: 20px;}
.footer_wrap .footer .footer_ask .sns p{font-size: 14px;font-weight: 400;line-height: 32px;}
.footer_wrap .footer .footer_ask .sns .sns_img{display: flex;justify-content: flex-end;gap:12px;}
.footer_wrap .footer .footer_ask .sns .sns_img img{width: 20px;height: 20px;margin:0;}
.footer_wrap .footer .footer_ask .line img{width: 1px;height: 61px;margin: 0 20px 0 36px;}
</style>
<footer>

	<div class="footer_wrap">
		<div class="footer">
			<img src="/img/hd_logo.png" alt="">
			<div class="footer_info">
				<p>비오엠코스메틱(주) ㅣ대표 신용철, 최지애 l 사업자등록번호.108-86-07183</p>
				<p> 주소. 서울특별시 구로구 디지털로33길12 우림이비지센터 2차 1111호</p>
				<p>Tel.  02-584-8200 ㅣ e-mail. genuf584@naver.com </p>
			</div>
			<div class="footer_ask">
				<p>고객 문의 <span>070-4349-4723</span></p>
				<div class="line">
					<img src="/img/footer_line.png" alt="">
				</div>
				<div class="sns">
					<p> 평일(월~금) 10:00 - 17:00</p>
					<p>  주말/공휴일 OFF</p>
					<div class="sns_img">
						<a href=""><img src="/img/footer_instar.png" alt=""></a>
						<a href=""><img src="/img/footer_kakao.png" alt=""></a>
					</div>
				</div>	
			</div>
		</div>
	</div>
</footer>



</div>
		</div>
	</div>


<?php
include_once(G5_PATH."/tail.sub.php");