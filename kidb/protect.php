 <?php
include_once('./_common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가


include_once(G5_PATH.'/head.php');
?>

<link rel="stylesheet" href="../css/index.css">
<style>
	.protects .protect_wrap{
		padding: 150px 250px;
	}
	.protects .protect_wrap .protect .protect_tit span{
		color: #002e6c;
		font-size: 14px;
		font-weight: bold;
		letter-spacing: 4px;
	}
	.protects .protect_wrap .protect .protect_tit h2{
		font-size: 44px;
		width: 50%;
	}
	.protects .protect_wrap .protect .solid{
		border: solid 1px #ccc;
		margin: 40px 0 40px 0;
	}
	.protects .protect_wrap .protect .sub_wrap{
		width: 50%;
	}
	.protects .protect_wrap .protect .sub_wrap .sub{
		margin-bottom: 60px;
	}
	.protects .protect_wrap .protect .sub_wrap .sub h3{
		font-size: 20px;
	}
	.protects .protect_wrap .protect .sub_wrap .detail{
		margin-bottom: 30px;
	}
	.protects .protect_wrap .protect .sub_wrap .detail h4{
		font-size: 16px;
		margin-bottom: 20px;
	}
	.protects .protect_wrap .protect .sub_wrap .detail p{
		font-size: 16px;
		line-height: 2;
	}
	.protects .protect_wrap .protect .sub_wrap .sub_tit h4{
		font-size: 24px;
		margin-bottom: 70px;
	}
	.who_bg .who_box span{
		font-size: 26px !important;
	}
	@media (max-width: 1680px) {
		.protects .protect_wrap {
			padding: 8.93vw 9.52vw;
		}
	}
	@media (max-width: 1480px) {
		.protects .protect_wrap .protect .protect_tit h2{
			width: 70%;
		}
	}
	@media (max-width: 1080px) {
		.protects .protect_wrap .protect .protect_tit h2{
			width: 90%;
		}
	}
	@media (max-width: 835px) {
		.protects .protect_wrap .protect .protect_tit h2{
			width: 100%;
		}
	}
	@media (max-width: 768px) {
		.protects .protect_wrap .protect .sub_wrap{
			width: 100%;
		}
		.protects .protect_wrap {
			padding: 8.93vw 2.52vw;
		}
	}

</style>

<div class="protects">
	<?php 
		$sv_tit = 'F.C. PROTECTION STANDARDS';
		$sv_links = '/index.php';
		$sv_titles = 'KIDB';
		$sv_link = '/protect.php';
		$sv_title = 'FINANCIAL CONSUMER PROTECTION STANDARDS';
		include_once('./include/sv_01.php');
	
	?>
	<div class="protect_wrap">
		<div class="protect">
			<div class="protect_tit">
				<span>KOREA'S NO.1 BROKERAGE FIRM</span>
				<h2>FINANCIAL CONSUMER PROTECTION STANDARDS</h2>
			</div>

			<div class="solid"></div>

			<div class="sub_wrap">
				<div class="sub_tit">
					<h4>금융소비자 보호기준</h4>
				</div>
				<div class="sub">
					<h3>제 1장 총칙</h3>
				</div>
				<div class="detail">
					<h4>제1조(목적)</h4>
					<p>이 기준은 케이아이디비채권중개주식회사(이하 “회사”라 한다)가 「금융소비자보호에 관한 법률」(이하 “법”이라 한다) 제32조,「금융소비자 보호에 관한 법률 시행령」(이하 “시행령”이라 한다) 제31조, 「금융소비자 보호에 관한 감독규정」(이하 “감독규정”이라 한다) 제29조 및 관련법규(이하 총칭하여 “금융소비자보호법령”이라 한다)에서 정한 바에 따라, 금융소비자의 민원 예방 및 신속한 사후구제를 통하여 금융소비자를 보호하기 위하여 회사의 임직원이 직무를 수행할 때 준수하여야 할 기본적인 절차와 기준을 정함을 목적으로 한다.</p>
				</div>
			</div>

		</div>
	</div>
</div>


<?php
include_once(G5_PATH.'/tail.php');