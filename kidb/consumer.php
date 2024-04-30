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
	}
	.protects .protect_wrap .protect .solid{
		border: solid 1px #ccc;
		margin: 40px 0 40px 0;
	}
	.protects .protect_wrap .protect .btns_wrap .btns{
		display: flex;
		gap: 40px;
	}
	.protects .protect_wrap .protect .btns_wrap .btns a{
		width: 400px;
		height: 70px;
		display: flex;
		justify-content: center;
		align-items: center;
		background: #002e6c;
		color: #fff;
		font-weight: bold;
		font-size: 18px;
	}
	.who_bg .who_box span{
		font-size: 26px ;
	}
	@media (max-width: 1680px) {
		.protects .protect_wrap {
			padding: 8.93vw 9.52vw;
		}
		.protects .protect_wrap .protect .btns_wrap .btns a{
			width: 25.08vw;
		}
	}
	@media (max-width: 1024px) {
		.protects .protect_wrap .protect .btns_wrap .btns a{
			font-size: 16px;
		}
	@media (max-width: 900px) {
		.protects .protect_wrap .protect .btns_wrap .btns a{
			font-size: 15px;
		}
	@media (max-width: 768px) {
		.protects .protect_wrap {
			padding: 8.93vw 2.52vw;
		}
		.protects .protect_wrap .protect .btns_wrap .btns a{
			font-size: 16px;
			width: 100%;
		}
		.protects .protect_wrap .protect .btns_wrap .btns{
			flex-wrap: wrap;
		}
		.protects .protect_wrap .protect .btns_wrap .btns .first_btn,
		.protects .protect_wrap .protect .btns_wrap .btns .second_btn,
		.protects .protect_wrap .protect .btns_wrap .btns .third_btn{
			width: 100%;
		}
	}
</style>

<div class="protects">
	<?php 
		$sv_tit = 'F.C. PROTECTION';
		$sv_links = '/index.php';
		$sv_titles = 'KIDB';
		$sv_link = '/consumer.php';
		$sv_title = 'FINANCIAL CONSUMER PROTECTION';
		include_once('./include/sv_01.php');
	
	?>
	<div class="protect_wrap">
		<div class="protect">
			<div class="protect_tit">
				<span>KOREA'S NO.1 BROKERAGE FIRM</span>
				<h2>F. C. PROTECTION</h2>
			</div>

			<div class="solid"></div>

			<div class="btns_wrap">
				<div class="btns">
					<div class="first_btn">
						<a href="/protect.php">금융소비자보호기준</a>
					</div>
					<div class="second_btn">
						<a href="/internal.php">금융소비자보호 내부통제기준</a>
					</div>
					<div class="third_btn">
						<a href="/bbs/board.php?bo_table=COMPLAINT">민원건수 게시</a>
					</div>
				</div>
			</div>
			
			
		</div>
	</div>
</div>


<?php
include_once(G5_PATH.'/tail.php');