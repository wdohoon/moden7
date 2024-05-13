 <?php
include_once('./_common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가


include_once(G5_PATH.'/head.php');
?>

<link rel="stylesheet" href="../css/index.css">
<style>
	.inquirys .inquiry_wrap{
		padding: 150px 250px;
	}
	.inquirys .inquiry_wrap .inquiry .inquiry_tit span{
		color: #002e6c;
		font-size: 14px;
		font-weight: bold;
		letter-spacing: 4px;
	}
	.inquirys .inquiry_wrap .inquiry .inquiry_tit h2{
		font-size: 44px;
		width: 50%;
	}
	.inquirys .inquiry_wrap .inquiry .solid{
		border: solid 1px #ccc;
		margin: 40px 0 40px 0;
	}
	@media (max-width: 1680px) {
		.inquirys .inquiry_wrap {
			padding: 8.93vw 9.52vw;
		}
	}
	@media (max-width: 768px) {
		.inquirys .inquiry_wrap {
			padding: 8.93vw 2.52vw;
		}
	}

</style>

<div class="inquirys">
<!-- 	<?php 
		$sv_tit = 'INQUIRY';
		$sv_links = '/moneymarket.php';
		$sv_titles = 'MONEY MARKET';
		$sv_link = '/inquiry.php';
		$sv_title = 'INQUIRY';
		include_once('./include/sv_01.php');
	?> -->

	<div class="inquiry_wrap">
		<div class="inquiry">
			<div class="inquiry_tit">
				<span>KOREA'S NO.1 BROKERAGE FIRM</span>
				<h2>INQUIRY</h2>
			</div>

			<div class="solid"></div>

			<div class="contents">
				<div class="content">
					<div class="wraps">
						<div class="name">
							<ul>
								<li>이름</li>
							</ul>
						</div>
						<div class="name">
							<ul>
								<li>연락처</li>
							</ul>
						</div>
						<div class="name">
							<ul>
								<li>이메일</li>
							</ul>
						</div>

						<div class="category">
							<span>문의 유형</span>
							<ul>
								<li>자금시장</li>
								<li>채권시장</li>
								<li>파생시장</li>
							</ul>
						</div>
						
						<div class="detail">
							<span>문의 내용</span>
							<textarea name="" id="" cols="30" rows="10"></textarea>
						</div>
						
						<div class="files">
							<span>첨부파일</span>
							<div class="file">
								<img src="" alt="">

							</div>
						</div>
						
						<div class="agree_wrap">
							<div class="agree">
								
								<button></button>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<?php
include_once(G5_PATH.'/tail.php');