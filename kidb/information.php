 <?php
include_once('./_common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가


include_once(G5_PATH.'/head.php');
?>

<link rel="stylesheet" href="../css/index.css">
<style>
	.informations .information_wrap{
		padding: 150px 250px;
	}
	.informations .information_wrap .information .information_tit span{
		color: #002e6c;
		font-size: 14px;
		font-weight: bold;
		letter-spacing: 4px;
	}
	.informations .information_wrap .information .information_tit h2{
		font-size: 44px;
	}
	.informations .information_wrap .information .solid{
		border: solid 1px #ccc;
		margin: 40px 0 40px 0;
	}
	.privacy h2{
		font-size: 24px;
	}
	.privacy p{
		font-size: 16px;
	}
	.privacy{
		width: 60%;
	}
	.who_bg .who_box span{
		font-size: 26px ;
	}

	@media (max-width: 1680px) {
		.informations .information_wrap {
			padding: 8.93vw 9.52vw;
		}
	}
	@media (max-width: 768px) {
		.informations .privacy{
			width: 100%;
		}
		.informations .privacy .bar{
			width: auto;
			height: auto;
		}
		.informations .information_wrap {
			padding: 8.93vw 2.52vw;
		}
	}

</style>
<div class="informations">
	<?php 
		$sv_tit = 'CREDIT INFORMATION';
		$sv_links = 'index.php';
		$sv_titles = 'KIDB';
		$sv_link = 'information.php';
		$sv_title = 'CREDIT INFORMATION';
		include_once('./include/sv_01.php');
	
	?>
	
	<div class="information_wrap">
		<div class="information">
			<div class="information_tit">
				<span>KOREA'S NO.1 BROKERAGE FIRM</span>
				<h2>CREDIT INFORMATION</h2>
			</div>
				<div class="solid"></div>
 		<?php
			$co_id = 'privacy';
			$co = get_content_db($co_id);
			$str = conv_content($co['co_content'], $co['co_html'], $co['co_tag_filter_use']);
			echo $str;
		?>
		</div>
	</div>
</div>


<?php
include_once(G5_PATH.'/tail.php');