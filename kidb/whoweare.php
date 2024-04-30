<?php
include_once('./_common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가


include_once(G5_PATH.'/head.php');
?>
<link rel="stylesheet" href="../css/index.css">
<style>
	.who .banner_wrap .banner ul{
		display: flex;
		justify-content: center;
		align-items: center;
		font-size: 20px;
		background: #002e6c;
		color: #fff;
		height: 80px;
	}
	.who .banner_wrap .banner ul li{
		height: 80px;
		width: 350px;
		border-left: solid 1px #335889;
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.who .banner_wrap .banner ul .first{
		background: #a0935e;
		font-weight: bold;
	}
	.who .banner_wrap .banner ul .fourth{
		border-right: solid 1px #335889;
	}
	.who .banner_wrap .banner ul li button{
		border:none;
		background-color: transparent;
		text-decoration: none;
		outline: none;
		color: #fff;
		width: 360px;
		height: 80px;
	}
	.who .banner_wrap .banner ul li a{
		color: #fff;
	}
	.who .info_wrap{
		height: 100%;
		padding: 150px 260px 150px 260px;
	}
	.who .info_wrap .title{
		border-bottom: solid 1px #e3e3e3;
	}
	.who .info_wrap .title span{
		font-size: 14px;
		font-weight: bold;
		color: #002e6c;
		letter-spacing: 4.5px;
	}
	.who .info_wrap .title h2{
		font-size: 44px;
		font-weight: bold;
		margin-bottom: 40px;
	}
	.who .info_wrap .info{
		display: flex;
		margin-top: 40px;
		gap: 40px;
	}
	.who .info_wrap .info .left{
		width: 50%;
	}
	.who .info_wrap .info .right{
		width: 50%;
	}
	.who .info_wrap .info .right h4{
		font-size: 24px;
		font-weight: bold;
	}
	.who .info_wrap .info .right p{
		font-size: 16px;
		word-break: keep-all;
		line-height: 2;
		margin-bottom:40px;
	}
	.who .info_wrap .info .left h4{
		font-size: 24px;
		font-weight: bold;
	}
	.who .info_wrap .info .left p{
		font-size: 16px;		
		line-height: 2;
		margin-bottom:40px;
	}
	.who .info_wrap .info img{
		position: absolute;
		z-index: -1;
		bottom: 320px;
		left: 0;
	}

	.who .banner_mos {
		position: relative;
		width: 100%;
	}

	.who .banner_mo ul {
		list-style: none;
		padding: 0;
		margin: 0;
		display: flex;
		border-bottom: solid 2px #fff;
	}

	.who .banner_mo li {
		width: 100%;
	}

	.who .banner_mo a {
		text-decoration: none;
		color: #fff;
		padding: 30px;
		font-size: 20px;
		width: 100%;
		display: flex;
		justify-content: space-between;
		align-items: center;
	}

	.who .all-dropdowns {
		display: none;
		background: #002e6c;
		position: absolute;
		width: 100%;
		top: 100%; /* 바로 아래에 나타나도록 설정 */
		left: 0;
		z-index: 2;
	}

	.who .all-dropdowns ul {
		list-style: none;
		padding: 0;
		margin: 0;
	}

	.who .all-dropdowns li {
		padding: 10px;
	}

	.who .all-dropdowns ul {
		border-bottom: solid 2px #fff;
	}

	.who .fixeds_mo{
		position: absolute;
		width: 90%;
		display: flex;
		align-items: center;
		margin: 0 30px 0 30px;
		background: #002e6c;
		height: 80px;
		top: 26.04vw;
	}
	.who .fixeds_mo img{
		width: 10px;
		height: 10px;
	}
	@media (max-width: 1400px) {
		.who .info_wrap{
			padding: 10.7vw 8.6vw 10.7vw 8.6vw;
		}
	}
	@media (max-width: 1024px) {
		.who .info_wrap .info{
			flex-wrap: wrap;
		}
		.who .info_wrap .info .left{
			width: 100%
		}
		.who .info_wrap .info .right{
			width: 100%
		}
		.who .info_wrap .info img{
			bottom: 90.67vw;
			left: 0;
		}
		.who .banner_wrap .banner ul{
			font-size: 16px;
		}
		.who .banner_wrap .banner ul{
			height: 5.17vw;
		}
		.who .banner_wrap .banner ul li{
			height: 5.17vw;
			border-left: solid 0.05vw #335889;
		}
		.who .banner_wrap .banner ul .fourth{
			border-right: solid 0.05vw #335889;
		}
		.who .banner_wrap .banner ul li button{
			width: 18.75vw;
			height: 4.17vw;
		}
	}
	@media (max-width: 768px) {
		.who .banner_wrap{
			display: none;
		}
		.who .banner_mo a{
			font-size: 16px;
		}
		.who .info_wrap{
			padding: 20.42vw 2.6vw 10vw 2.6vw;
		}
	}
	@media (min-width: 767px) {
		.who .fixeds_mo{
			display: none;
		}
	}
	@media (max-width: 540px) {

		.who .fixeds_mo{
			margin: 0 20px 0 20px;
		}
	}

</style>
<div class="who">
	<?php 
		$sv_tit = 'KIDB';
		$sv_links = '/index.php';
		$sv_titles = 'KIDB';
		$sv_link = '/whoweare.php';
		$sv_title = 'WHO WE ARE';
		include_once('./include/sv_01.php');
	?>

	<div class="banner_wrap">
		<div class="banner">
			<ul>
				<li class="first"><a href="/whoweare.php">WHO WE ARE</a></li>
				<li><a href="/dates.php">DATES TO REMEMBER</a></li>
				<li><a href="/leadership.php">LEADERSHIP</a></li>
				<li class="fourth"><a href="/workingatkidb.php">WORKING AT KIDB</a></li>
			</ul>
		</div>
	</div>

	<div class="fixeds_mo">
		<div class="banner_mos">
			<div class="banner_mo">
				<ul>                            
					<li>
						<a href="/whoweare.php" id="fixedIncomeBtn">WHO WE ARE<img src="../img/drop.png" alt=""></a>
						<div class="all-dropdowns">
							<ul class="dropdown">
								<li><a href="/dates.php" style="padding: 20px;">DATES TO REMEMBER</a></li>
							</ul>
							<ul class="dropdown2">
								<li><a href="/leadership.php" style="padding: 20px;">LEADERSHIP</a></li>
							</ul>
							<ul class="dropdown3">
								<li><a href="/workingatkidb.php" style="padding: 20px;">WORKING AT KIDB</a></li>
							</ul>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="info_wrap">
		<div class="title">
			<span>KOREA'S NO.1 BROKERAGE FIRM</span>
			<h2>WHO WE ARE</h2>
		</div>
		<div class="info">
			<img src="../img/who_kidb.png" alt="">
			<div class="left">
				<h4>업계 1위의 종합금융중개회사</h4><br>
				<p>KIDB는 외환위기 후 IMF의 권고사항으로 2000년 채권유통시장의 선진화를 도모하고자,  5개의 대형 증권사
					(현 미래에셋대우증권, 삼성증권, NH투자증권, 대신증권, 유안타증권)들이 소시엄을 구성, 채권중개전문
					금융회사로 설립되었습니다. 당사는 그 이후 해외채 중개, 국공채·특수채 및 회사채 중개·매매·인수업무
					등으로 업무 영역을 확장하여명실상부한 업계 1위의 채권중개전문회사로 성장하였습니다. </p>
				<p>2006년 당사가 전액 출자한 KIDB자금중개를 자회사로 설립하여 원화콜 중개업무를 기반으로 2007년
					업계최초 REPO 거래를 중개하였고, 이자율스왑과 외환시장 파생상품 중개업무 등을 추가하여 금융기관 간
					중개시장을 선도하는 종합 금융 중개회사로서의 면모를 갖추게 되었습니다.</p>
				<p>KIDB는 금융시장에 대한 빠르고 정확한 정보 제공 및 고객들의 트레이딩 수요를 파악하고　그 과정에서 시장의
					투명성과 유동성을 제고하며 원활한 가격 결정기능을 수행합니다.  신뢰를 바탕으로 하는 금융 중개기관으로서
					고객, 주주, 임직원, 그리고 사회에 대한 책임을 충실히 이행하여 기업의 가치를 증대해 나가고자 합니다.</p>
			</div>
			<div class="right">
				<h4>Korea’s No.1 brokerage firm</h4><br>
				<p>KIDB Fixed Income Brokerage Corp. has been established through a consortium of five	
					main securities houses (currently Mirae Asset Daewoo, Samsung, Daeshin, 
					currently NH, and currently Yuanta Securities) in May 2000 in order to help advance 
					Korea’s secondary fixed income market. Since then, we have expanded 
					our business scope to dealing and underwriting of government, 
					public finance, and corporate bonds, and also servicing non-domestic currency bonds, 
					which has made KIDB Fixed Income Corp. Korea’s top fixed income brokerage firm.</p>
				<p>In March 2006, KIDB Money Brokerage Corp. was established as a subsidiary wholly 
					owned by KIDB. Starting with the call money market, KIDB initiated 
					Korea’s first REPO trade in 2007 and expanded its product base to foreign 
					exchange derivatives and interest rate swaps, which has led KIDB to become a 
					Korea’s leading brokerage firm.</p>
				<p>We service our clients with cutting edge expertise in facilitaing trading. Built upon good faith and trust, as well as exceptional talent, KIDB will continue to dedicate to creating the most ideal working environment for our employees and creating the most ideal working environment for our employees and adding value to our clients, shareholders, and to the economy as well.</p>	
			</div>
		</div>
	</div>


</div>

<script>
	var bannerWrap = document.querySelector('.banner_wrap');
	var buttons = bannerWrap.querySelectorAll('button');

	var backgroundColor = window.getComputedStyle(bannerWrap).backgroundColor;

	buttons.forEach(function(button) {
		button.style.backgroundColor = backgroundColor;
	});

	$(document).ready(function () {
        var fixedIncomeBtn = $("#fixedIncomeBtn");
        var resourcesDropdown = $("#resourcesDropdown");

        // 초기에는 RESOURCES를 숨깁니다.
        resourcesDropdown.hide();

        fixedIncomeBtn.click(function (e) {
            e.preventDefault();
            resourcesDropdown.toggle(); // FIXED INCOME 버튼 클릭 시 RESOURCES를 토글하여 표시/숨깁니다.
        });
    });

	$(document).ready(function () {
		// 모든 드롭다운을 숨깁니다.
		$(".all-dropdowns").hide();

		// fixedIncomeBtn 클릭 이벤트 핸들러
		$("#fixedIncomeBtn").click(function (e) {
			e.preventDefault();
			// all-dropdowns 클래스를 가진 요소를 토글합니다.
			$(".all-dropdowns").toggle();
		});
	});
</script>



<?php
include_once(G5_PATH.'/tail.php');