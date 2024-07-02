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
footer{background:#000;padding: 2vw 17vw;color:#fff;}
footer .footer_container{display: flex;justify-content: space-between;align-items:center;flex-wrap:wrap;}
footer .footer_container .left_wrap img{margin-bottom:1vw;}
footer .footer_container .left_wrap p{font-size: 12px;font-weight: 400;line-height: 18px;letter-spacing: -0.025em;text-align: left;color:#AAAAAA;margin-bottom:30px;}
footer .footer_container .right_wrap a{color:#fff;padding: 10px 23px 10px 23px;border: 1px solid #fff;font-size: 14px;font-weight: 600;line-height: 20px;letter-spacing: -0.025em;}
footer .foot_info{font-size: 10px;font-weight: 400;line-height: 15px;letter-spacing: -0.025em;text-align: left;}
@media screen and (max-width: 1372px) {
	footer .foot_info p{padding-top:20px;}
	footer{padding: 2vw 10vw;}
}
@media screen and (max-width: 768px){
	footer {
		padding: 5vw 10vw;
	}
	}
	footer .footer_container {
		display: flex;
		justify-content: space-between;
		align-items: baseline;
		flex-wrap: wrap;
		margin-top: 0.5rem;
	}
}

</style>

<!-- 하단 시작 { -->
<footer>
	<div class="footer_container">
		<div class="left_wrap">
			<img src="/img/foot_logo.png" alt="">
			<p>BHICOIN</p>
		</div>
		<div class="right_wrap">
			<a href="/bbs/register.php">멀티지갑 생성</a>
		</div>
	</div>

	<div class="foot_info">
		<p>BHIcoin 플랫폼은 암호화폐 거래소가 아니라 P2P 상거래를 위한 플랫폼입니다. 따라서 BHIcoin 플랫폼은 금융 서비스나 상품을 제공하지 않습니다. 플랫폼에서 이루어지는 모든 거래에 대한 책임은 전적으로 고객에게 있습니다.<br>
			BHIcoin 플랫폼은 회원 간의 거래에 사용되는 금융 기관 또는 결제 회사와 제휴하지 않습니다. 결제에 대한 결정과 선택의 자유와 책임은 모두 회원에게 있습니다.</p>
	</div>
</footer>
<!-- } 하단 끝 -->

<script>
$('#modalPin').modal();
		
	$('.box1 .select').change(function(){
		$('#Kind').text($(this).val());
		$('#Kind').addClass('active');
	});

$(function() {
    // 폰트 리사이즈 쿠키있으면 실행
    font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
});
</script>




<?php
include_once(G5_PATH."/tail.sub.php");