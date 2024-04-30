 <?php
include_once('./_common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가


include_once(G5_PATH.'/head.php');
?>

<link rel="stylesheet" href="../css/index.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../js/index.js"></script>



<style>
	.derivatives .banner_wrap .banner ul{
		display: flex;
		align-items: center;
		font-size: 20px;
		background: #002e6c;
		color: #fff;
		height: 80px;
		padding-left: 260px;
	}
	.derivatives .banner_wrap .banner ul li{
		height: 80px;
		width: 350px;
		border-left: solid 1px #335889;
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.derivatives .banner_wrap .banner ul .second{
		background: #a0935e;
		font-weight: bold;
	}
	.derivatives .banner_wrap .banner ul .fourth{
		border-right: solid 1px #335889;
	}
	.derivatives .banner_wrap .banner ul li button{
		border:none;
		background-color: transparent;
		text-decoration: none;
		outline: none;
		color: #fff;
		width: 360px;
		height: 80px;
	}
	.derivatives .banner_wrap .banner ul li a{
		color: #fff;
	}

	/* mos */
	.derivatives .banner_mos {
		position: relative;
		width: 100%;
	}

	.derivatives .banner_mo ul {
		list-style: none;
		padding: 0;
		margin: 0;
		display: flex;
	}

	.derivatives .banner_mo li {
		margin-right: 20px;
		width: 100%;
	}

	.derivatives .banner_mo a {
		text-decoration: none;
		color: #fff;
		padding: 30px;
		font-size: 20px;
		width: 100%;
		display: flex;
		justify-content: space-between;
		align-items: center;
	}

	.derivatives .all-dropdowns {
		display: none;
		background: #002e6c;
		position: absolute;
		width: 100%;
		top: 100%; /* 바로 아래에 나타나도록 설정 */
		left: 0;
		z-index: 2;
	}

	.derivatives .all-dropdowns ul {
		list-style: none;
		padding: 0;
		margin: 0;
	}

	.derivatives .all-dropdowns li {
		padding: 10px;
	}

	.derivatives .all-dropdowns ul {
		border-bottom: solid 2px #fff;
	}

	.derivatives .fixeds_mo{
		position: absolute;
		width: 90%;
		display: flex;
		align-items: center;
		margin: 0 30px 0 30px;
		background: #002e6c;
		height: 80px;
		top: 26.04vw;
	}
	.derivatives .fixeds_mo img{
		width: 10px;
		height: 10px;
	}

	.derivatives .info_wrapper{
		height: 100%;
		padding: 150px 260px 150px 260px;
	}
	.derivatives .info_wrapper .title span{
		font-size: 14px;
		font-weight: bold;
		color: #002e6c;
		letter-spacing: 4.5px;
	}
	.derivatives .info_wrapper .title h2{
		font-size: 44px;
		font-weight: bold;
		margin-bottom: 40px;
	}
	.derivatives .info_wrapper .title{
		border-bottom: solid 1px #e3e3e3;
	}
	.derivatives .info_wrapper .info{
		display: flex;
		margin-top: 40px;
		gap: 40px;
	}
	.derivatives .info_wrapper .info .left,
	.derivatives .info_wrapper .info .right{
		width: 50%;
	}

	.derivatives .info_wrapper .info .right span{
		font-size: 24px;
		font-weight: bold;
	}
	.derivatives .info_wrapper .info .right p{
		font-size: 16px;
		line-height: 2;
	}
	.derivatives .info_wrapper .info .left span{
		font-size: 24px;
		font-weight: bold;
	}
	.derivatives .info_wrapper .info .left p{
		font-size: 16px;
		line-height: 2;
	}
	.derivatives .info_wrapper .diagram_wrap{
		padding-top: 120px;
	}
	.derivatives .info_wrapper .diagram_wrap .kidb_img{
		position: absolute;
		left: 0;
		top: 76.32vw;
		opacity: 0.5;
		z-index: -1;
	}
	.derivatives .info_wrapper .sub_wrap{
		margin-top: 60px;
	}
	.derivatives .info_wrapper .sub_wrap .sub_tit{
		font-size: 16px;
		font-weight: bold;
		display: flex;
		justify-content: center;
		padding: 40px 0 40px 0;
	}
	.derivatives .info_wrapper .sub_wrap ul{
		display: flex;
		font-size: 16px;
	}
	.derivatives .info_wrapper .sub_wrap ul li{
		cursor: pointer;
		width: 175px;
		border: solid 1px #ccc;
		height: 60px;
		display: flex;
		justify-content: center;
		align-items: center;
	}
    .derivatives .info_wrapper .sub_wrap ul li:first-child.active {
		color: #fff;
        background-color: #a0935e;
        font-weight: bold;
    }
    .derivatives .info_wrapper .sub_wrap ul li.active {
		color: #fff;
        background-color: #a0935e;
        font-weight: bold;
    }
	.derivatives .info_wrapper .sub_wrap .sub_details .sub_detail{
		display: flex;
		padding-top: 60px;
	}
	.derivatives .info_wrapper .sub_wrap .sub_details .sub_detail .detail_tit span{
		font-size: 28px;
		font-weight: bold;
	}
	.derivatives .info_wrapper .sub_wrap .sub_details .sub_detail .detail_tit p{
		font-size: 14px;
		color: #777;
	}
	.derivatives .info_wrapper .sub_wrap .sub_details .sub_detail .detail_tit{
		width: 40%;
	}
	.derivatives .info_wrapper .sub_wrap .sub_details .sub_detail .detail_ko{
		width: 100%;
		margin-right: 30px;
		font-size: 16px;
	}
	.derivatives .info_wrapper .sub_wrap .sub_details .sub_detail .detail_en{
		width: 100%;
		font-size: 16px;
	}
	.derivatives .der_imgs{
		padding: 60px 0 150px 0;
	}
	.derivatives .der_imgs .der_img{
		width: 100%;
	}
	.derivatives .der_imgs .der_img img{
		width: 100%;
		border: solid 1px #ccc;
	}
	.derivatives .krw_imgs{
		padding: 60px 0 150px 0;
	}
	.derivatives .krw_imgs .krw_img{
		width: 100%;
	}
	.derivatives .krw_imgs .krw_img img{
		width: 100%;
	}
	.derivatives .repo_imgs{
		padding: 60px 0 150px 0;
	}
	.derivatives .repo_imgs .repo_img{
		width: 100%;
	}
	.derivatives .repo_imgs .repo_img img{
		width: 100%;
	}
	.who_bg .who_box span{
		font-size: 26px !important;
	}
	.info img{
		z-index: -1;
		position: absolute;
		left:0;
		top: 1500px;
	}
	.derivatives .banner_wrap .banner ul li:last-child{
			border-right: solid 1px #335889;
		}

	@media (max-width: 1400px) {
		.derivatives .banner_wrap .banner ul{
			font-size: 1.54vw;
			height: 5.17vw;
			padding-left: 8.6vw;
		}
		.derivatives .banner_wrap .banner ul li{
			height: 5.17vw;
			border-left: solid 0.05vw #335889;
		}
		.derivatives .banner_wrap .banner ul .fourth{
			border-right: solid 0.05vw #335889;
		}
		.derivatives .banner_wrap .banner ul li button{
			width: 18.75vw;
			height: 4.17vw;
		}
		.derivatives .info_wrapper .info .left,
		.derivatives .info_wrapper .info .right{
			width: 100%;
		}
		.derivatives .info_wrapper{
			padding: 10.7vw 8.6vw 10.7vw 8.6vw;
		}
	}
	@media (max-width: 768px) {
		.derivatives .info_wrapper .info{
			flex-wrap: wrap;
		}
		.derivatives .info_wrapper .sub_wrap .sub_details .sub_detail{
			flex-wrap: wrap;
			gap: 40px;
		}
		.derivatives .info_wrapper .sub_wrap ul{
			flex-wrap: wrap;
		}
		.derivatives .info_wrapper{
			padding: 20.42vw 2.6vw 10vw 2.6vw;
		}
	}

	@media (max-width: 767px) {
		.derivatives .banner_wrap{
			display: none;
		}
	}
	@media (min-width: 768px) {
		.derivatives .fixeds_mo{
			display: none;
		}
	}
</style>

<div class="derivatives">
	<?php 
		$sv_tit = 'DERIVATIVES';
		$sv_links = '/moneymarket.php';
		$sv_titles = 'MONEY MARKET';
		$sv_link = '/derivatives.php';
		$sv_title = 'DERIVATIVES';
		include_once('./include/sv_06.php');
	
	?>
	<div class="banner_wrap">
		<div class="banner">
			<ul>
				<!-- <li class="first"><a href="moneymarket.php">MONEY MARKET</a></li> -->
				<li class="second"><a href="derivatives.php">DERIVATIVES</a></li>
				<li class="third"><a href="bbs/board.php?bo_table=resources">RESOURCES</a></li>
			</ul>
		</div>
	</div>

	<div class="fixeds_mo">
		<div class="banner_mos">
			<div class="banner_mo">
				<ul>                            
					<li>
						<a href="moneymarket.php" id="fixedIncomeBtn">MONEY MARKET<img src="../img/drop.png" alt=""></a>
						<div class="all-dropdowns">
							<ul class="dropdown">
								<li><a href="derivatives.php" style="padding: 20px;">DERIVATIVES</a></li>
							</ul>
							<ul class="dropdown2">
								<li><a href="bbs/board.php?bo_table=resources" style="padding: 20px;">RESOURCES</a></li>
							</ul>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>

<!-- der -->
	<div class="info">
		<img src="../img/who_kidb.png" alt="">
	</div>
	<div class="contact">
		<div class="info_wrapper">
			<div class="title">
				<span>CONNECTING THE WORLD</span>
				<h2>DERIVATIVES</h2>
			</div>

			<div class="info">
				<div class="left">
					<span>파생시장</span><br>
					<p>KIDB는 국내외 다양한 기관 투자자들에게 IRS, CRS, FX swap, FRA, MAR 등 다양한 파생상품에 대하여 중개서비스를 제공합니다.</p>
				</div>
				<div class="right">
					<span>DERIVATIVES</span><br>
					<p>KIDB mediates various derivatives such as IRS, CRS, FX swap, FRA and MAR to investors of various institutions at home and abroad We provide services. </p>
				</div>
			</div>

			<div class="sub_wrap">
				<ul>
					<li>IRS</li>
					<li>CRS</li>
					<li>FX Swap</li>
					<li>FPA</li>
					<li>MAR</li>
				</ul>

				<div class="sub_details">
					<div class="sub_detail">
						<div class="detail_tit">
							<span>IRS</span>
							<p>이자율스왑</p>
						</div>
						<div class="detail_ko">
							<p>IRS(Interest Rate Swap)는 두 계약상대방이 계약기간동안 동일통화의 명목원금에 대한 고정금리와 변동금리를 교환하는 거래로써, 계약내용에 따라 원금교환없이 주기적으로 거래금액의 금리차에 해당하는 이자 차액을 지급하는 거래입니다. IRS는 주로 고정금리 또는 변동금리의 금리 리스크를 조절하는 수단으로 이용됩니다.</p>
						</div>
						<div class="detail_en">
							<p>KIRS is an agreement between two counterparties in which one stream of future interest payments is exchanged for another based on a specified principal amount. IRS involves the exchange of a fixed interest rate for a floating rate, or vice versa, where two counterparties periodically pay the difference between the two interest rates. IRS is utilized to reduce or increase exposure to fluctuations in interest rates or to obtain marginally lower interest rates.</p>
						</div>
					</div>
				</div>

				<div class="sub_details">
					<div class="sub_detail">
						<div class="detail_tit">
							<span>CRS</span>
							<p>통화스왑</p>
						</div>
						<div class="detail_ko">
							<p>CRS(Currency Rate Swap )는 두 계약상대방이 계약기간동안 서로 다른 통화의 현금흐름을 교환하는 거래로써, 통화 별로 정해진 이자를 주기적으로 교환하며 만기 시 계약 된 약정 환율로 서로 다른 통화의 원금을 교환하는 거래입니다. CRS는 금리 및 통화위험을 조절하기 위한 수단으로 이용됩니다.</p>
						</div>
						<div class="detail_en">
							<p>CRS is an agreement between two counterparties that involves the exchange of interest and sometimes of principal in one currency for the same in another currency. Interest payments are exchanged at fixed dates through the life of the contract, and is considered to be a foreign exchange transaction. CRS is utilized to reduce or increase exposure of fluctuations in interest rates or currency risks.</p>
						</div>
					</div>
				</div>

				<div class="sub_details">
					<div class="sub_detail">
						<div class="detail_tit">
							<span>FX Swap</span>
							<p>외환스왑</p>
						</div>
						<div class="detail_ko">
							<p>FX Swap(Foreign Exchange Swap)은 외환시장에서 거래의 양 당사자가 서로 다른 통화에 대해 현물환 거래와 선물환 거래를 동시에 체결하는 거래입니다. 즉, 계약시점의 현물환율을 기준으로 특정 통화에 대한 매도(또는 매입) 계약하는 동시에 일정 기간 후 재매입(또는 매도)을 약정함으로써 계약기간 동안의 환율변동 리스크를 막을 수 있습니다. 만기가 1년 이내 단기 거래여서 통화 간 금리차가 선물환율에 반영되기 때문에 이자를 교환하진 않습니다.</p>
						</div>
						<div class="detail_en">
							<p>FX Swap is a simultaneous purchase and sale of identical amounts of one currency for another with two different value dates(normally spot to forward). FX Swap allows sums of a certain currency to be used to fund charges designated in another currency without taking foreign exchange risk.</p>
						</div>
					</div>
				</div>
				
				<div class="sub_details">
					<div class="sub_detail">
						<div class="detail_tit">
							<span>FPA</span>
							<p>선도금리계약</p>
						</div>
						<div class="detail_ko">
							<p>FRA(Forward Rate Agreement)는 두 계약상대방이 일정 시점부터 일정 기일까지 거래될 금리를 계약시점에서 고정하는 장외거래(OTC; Over the Counter)로써, 원금교환 없이 결제일에 계약금리와 시장금리의 차액을 지급하는 거래입니다. 주로 미래의 금리변동 리스크를 조절하기 위한 수단으로 이용됩니다.</p>
						</div>
						<div class="detail_en">
							<p>FRA is an over-the-counter contract between two counterparties that fixes the interest rate to be paid or received on an obligation beginning at a future start date. The FRA determines the rates to be used along with the termination date and notional value. FRAs are cash settled with the payment based on the net difference between the interest rate and the reference rate in the contract. It is utilized to hedge interest rate risk in the future.</p>
						</div>
					</div>
				</div>

				<div class="sub_details">
					<div class="sub_detail">
						<div class="detail_tit">
							<span>MAR</span>
							<p>시장평균환율</p>
						</div>
						<div class="detail_ko">
							<p>MAR란 Market Average Rate의 약자로 현물환 시장에서 거래된 환율의 레벨별 거래량과 환율을 곱하여 가중 평균한 가격으로 미달러화를 사고파는 거래입니다.</p>
						</div>
						<div class="detail_en">
							<p>MAR stands for Market Weighted Moving Average Rate, which is a transaction where won-dollar exchange in done at a market average rate. Market average rate is a the average rate of spot exchange rates multiplied by the trading volume of each level.</p>
						</div>
					</div>

				</div>
			</div>
			<div class="der_imgs">
				<div class="der_img">
					<img src="../img/irs.png" alt="">
					<img src="../img/crs.png" alt="">
					<img src="../img/fx.png" alt="">
					<img src="../img/fra.png" alt="">
				</div>
			</div>

		</div>
	</div>
</div>

<script>
$(document).ready(function () {
    // 초기에 국고채 스타일 적용
    $("ul li:first-child").addClass("active");
});
</script>

<script>
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




    // 나머지 코드는 그대로 유지합니다.
    $(document).ready(function () {
        $("ul li:first-child").addClass("active");
    });

    $(document).ready(function () {
        $(".sub_details").hide();
        $(".sub_details:first").show();
        $("ul li").click(function () {
            $("ul li").removeClass("active");
            $(this).addClass("active");

            $(".sub_details").hide();
            var index = $(this).index();
            $(".sub_details").eq(index).show();
        });
    });

	$(document).ready(function () {
    // 초기에는 모든 이미지를 숨깁니다.
    $(".der_img img").hide();
    // 첫 번째 이미지 (KRW) 만 표시합니다.
    $(".der_img img").eq(0).show();

    $("ul li").click(function () {
        // 모든 탭의 활성 상태를 제거하고 현재 클릭한 탭만 활성화합니다.
        $("ul li").removeClass("active");
        $(this).addClass("active");

        // 모든 이미지를 숨깁니다.
        $(".der_img img").hide();

        // 클릭한 탭에 해당하는 이미지만 표시합니다.
        var index = $(this).index();
        $(".der_img img").eq(index).show();
    });
});

$(document).ready(function() {
    // 이미지 소스 변경 함수
    function updateImageSource() {
        var width = $(window).width();
        if (width <= 768) {
            // 화면 크기가 768픽셀 이하일 때 이미지 변경
            $("img[src='../img/irs.png']").attr('src', '../img/irs_mo.png');
            $("img[src='../img/crs.png']").attr('src', '../img/crs_mo.png');
            $("img[src='../img/fx.png']").attr('src', '../img/fx_mo.png');
			$("img[src='../img/fra.png']").attr('src', '../img/fra_mo.png');
        } else {
            // 화면 크기가 768픽셀 초과일 때 원래 이미지로 변경
            $("img[src='../img/irs_mo.png']").attr('src', '../img/irs.png');
            $("img[src='../img/crs_mo.png']").attr('src', '../img/crs.png');
            $("img[src='../img/fx_mo.png']").attr('src', '../img/fx.png');
			$("img[src='../img/fra_mo.png']").attr('src', '../img/fra.png');
        }
    }

    // 초기 로드 시 이미지 소스 업데이트
    updateImageSource();

    // 화면 크기 변경 시 이미지 소스 업데이트
    $(window).resize(function() {
        updateImageSource();
    });
});

</script>

<script src="../js/index.js"></script>


<?php
include_once(G5_PATH.'/tail.php');