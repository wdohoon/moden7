<?php
include_once('./_common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가


include_once(G5_PATH.'/head.php');
?>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="../js/index.js"></script>



<style>
	
	.pc{display: block;}
	.mo{display: none;}
	.fixeds .banner_wrap .banner ul{
		display: flex;
		align-items: center;
		font-size: 20px;
		background: #002e6c;
		color: #fff;
		height: 80px;
		padding-left: 260px;
	}
	.fixeds .banner_wrap .banner ul li{
		height: 80px;
		width: 350px;
		border-left: solid 1px #335889;
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.fixeds .banner_wrap .banner ul .first{
		background: #a0935e;
		font-weight: bold;
	}
	.fixeds .banner_wrap .banner ul .fourth{
		border-right: solid 1px #335889;
	}
	.fixeds .banner_wrap .banner ul li button{
		border:none;
		background-color: transparent;
		text-decoration: none;
		outline: none;
		color: #fff;
		width: 360px;
		height: 80px;
	}
	.fixeds .banner_wrap .banner ul li a{
		color: #fff;
	}

	/* mos */
	.fixeds .banner_mos {
		position: relative;
		width: 100%;
	}

	.fixeds .banner_mo ul {
		list-style: none;
		padding: 0;
		margin: 0;
		display: flex;
	}

	.fixeds .banner_mo li {
		margin-right: 20px;
		width: 100%;
	}

	.fixeds .banner_mo a {
		text-decoration: none;
		color: #fff;
		padding: 30px;
		font-size: 20px;
		width: 100%;
		display: flex;
		justify-content: space-between;
		align-items: center;
	}

	.fixeds .banner_mo li:hover .dropdown {
		display: block;
	}
	
	.fixeds .dropdown li,
	.fixeds .dropdown2 li{
		padding: 10px;
		width: 100%; 
	}
	.fixeds .fixeds_mo{
		position: absolute;
		width: 90%;
		display: flex;
		align-items: center;
		margin: 0 30px 0 30px;
		background: #002e6c;
		height: 80px;
		top: 26.04vw;
	}

	.fixeds .info_wrapper{
		height: 100%;
		padding: 150px 260px 150px 260px;
	}
	.fixeds .info_wrapper .title span{
		font-size: 14px;
		font-weight: bold;
		color: #002e6c;
		letter-spacing: 4.5px;
	}
	.fixeds .info_wrapper .title h2{
		font-size: 44px;
		font-weight: bold;
		margin-bottom: 40px;
	}
	.fixeds .info_wrapper .title{
		border-bottom: solid 1px #e3e3e3;
	}
	.fixeds .info_wrapper .info{
		display: flex;
		margin-top: 40px;
		gap: 40px;
	}
	.fixeds .info_wrapper .info .left{
		width: 40%;
	}
	.fixeds .info_wrapper .info .right{
		width: 40%;
	}
	.fixeds .info_wrapper .info .right span{
		font-size: 24px;
		font-weight: bold;
	}
	.fixeds .info_wrapper .info .right p{
		font-size: 16px;
	}
	.fixeds .info_wrapper .info .left span{
		font-size: 24px;
		font-weight: bold;
	}
	.fixeds .info_wrapper .info .left p{
		font-size: 16px;
	}
	.fixeds .info_wrapper .diagram_wrap{
		padding-top: 120px;
	}
	.fixeds .info_wrapper .diagram_wrap .kidb_img{
		position: absolute;
		left: 0;
		top: 76.32vw;
		opacity: 0.5;
		z-index: -1;
	}
	.fixeds .info_wrapper .sub_wrap .sub_tit{
		font-size: 16px;
		font-weight: bold;
		display: flex;
		justify-content: center;
		padding: 40px 0 40px 0;
	}
	.fixeds .info_wrapper .sub_wrap ul{
		display: flex;
		font-size: 16px;
		justify-content: center;
		cursor: pointer;
	}
	.fixeds .info_wrapper .sub_wrap ul li{
		width: 100%;
		border: solid 1px #ccc;
		height: 60px;
		display: flex;
		justify-content: center;
		align-items: center;
		text-align: center;
	}
    .fixeds .info_wrapper .sub_wrap ul li:first-child.active {
		color: #fff;
        background-color: #a0935e;
        font-weight: bold;
    }
    .fixeds .info_wrapper .sub_wrap ul li.active {
		color: #fff;
        background-color: #a0935e;
        font-weight: bold;
    }
	.fixeds .info_wrapper .sub_wrap .sub_details .sub_detail{
		display: flex;
		padding-top: 60px;
	}
	.fixeds .info_wrapper .sub_wrap .sub_details .sub_detail .detail_tit span{
		font-size: 28px;
		font-weight: bold;
	}
	.fixeds .info_wrapper .sub_wrap .sub_details .sub_detail .detail_tit p{
		font-size: 14px;
		color: #777;
	}
	.fixeds .info_wrapper .sub_wrap .sub_details .sub_detail .detail_tit{
		width: 40%;
	}
	.fixeds .info_wrapper .sub_wrap .sub_details .sub_detail .detail_ko{
		width: 100%;
		margin-right: 30px;
		font-size: 16px;
	}
	.fixeds .info_wrapper .sub_wrap .sub_details .sub_detail .detail_en{
		width: 100%;
		font-size: 16px;
	}
	.who_bg .who_box span{
		font-size: 26px !important;
	}
	.banner_mo img{
		width: 10px;
		height: 10px;
	}
	.diagram img{
		border: solid 1px #ccc;
	}
	@media (max-width: 1400px) {
		.fixeds .banner_wrap .banner ul{
			padding-left: 8.6vw;
		}
		.fixeds .info_wrapper{
			padding: 10.7vw 8.6vw 10.7vw 8.6vw;
		}
		.fixeds .banner_wrap .banner ul{
			font-size: 1.54vw;
			height: 5.17vw;
		}
		.fixeds .banner_wrap .banner ul li{
			height: 5.17vw;
			border-left: solid 0.05vw #335889;
		}
		.fixeds .banner_wrap .banner ul .fourth{
			border-right: solid 0.05vw #335889;
		}
		.fixeds .banner_wrap .banner ul li button{
			width: 18.75vw;
			height: 4.17vw;
		}
		.fixeds .info_wrapper .info .left,
		.fixeds .info_wrapper .info .right{
			width: 100%;
		}
	}
	@media (max-width: 950px) {
		.fixeds .info_wrapper .sub_wrap ul{
			font-size: 14px;
		}
	}
	@media (max-width: 768px) {
		.pc{display: none !important; }
		.mo{display: block;}	
		.fixeds .info_wrapper .sub_wrap ul{display: block;}
		.fixeds .info_wrapper .sub_wrap ul li{width: 25%;float:left;}
		.fixeds .info_wrapper .info{
			flex-wrap: wrap;
		}
		.fixeds .info_wrapper .sub_wrap .sub_details .sub_detail{
			display: block;
			padding-top: 60px;
		}
		.fixeds .info_wrapper .sub_wrap .sub_details .sub_detail .detail_tit{width: 100%;}
		/* .fixeds .info_wrapper .sub_wrap{
			display: none;
		} */
		.fixeds .info_wrapper{
			padding: 20.42vw 2.6vw 10vw 2.6vw;
		}
		.banner_mo ul{
			border-bottom: solid 2px #fff;
		}
		.banner_mo li{
			width: 100%;
		}
		.all-dropdowns{
		    background: #002e6c;
			position: absolute;
			width: 100%;
			top: 100%;
			left: 0;
			z-index: 2;
		}
		.all-dropdowns ul{
			border-bottom: solid 2px #fff;
		}
	}

	@media (max-width: 767px) {
		.fixeds .banner_wrap{
			display: none;
		}
	}
	@media (min-width: 768px) {
		.fixeds .fixeds_mo{
			display: none;
		}
	}
</style>

<div class="fixeds">
	<?php 
		$sv_tit = 'FIXED INCOME';
		$sv_links = '/index.php';
		$sv_titles = 'KIDB';
		$sv_link = 'fixedincome.php';
		$sv_title = 'FIXED INCOME';
		include_once('./include/sv_07.php');
	?>
	<div class="banner_wrap">
		<div class="banner">
			<ul>
				<li class="first"><a href="/fixedincome.php">FIXED INCOME</a></li>
				<li class="fourth"><a href="/bbs/board.php?bo_table=reousrces_2">RESOURCES</a></li>
			</ul>
		</div>
	</div>

	<div class="fixeds_mo">
		<div class="banner_mos">
			<div class="banner_mo">
				<ul>                            
					<li>
						<a href="/fixedincome.php" id="fixedIncomeBtn">FIXED INCOME <img src="../img/drop.png" alt=""></a>
						<div class="all-dropdowns">
							<ul class="dropdown">
								<li><a href="/bbs/board.php?bo_table=reousrces_2" style="padding: 20px;">RESOURCES</a></li>
							</ul>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="contact">
		<div class="info_wrapper">
			<div class="title">
				<span>CONNECTING THE WORLD</span>
				<h2>FIXED INCOME</h2>
			</div>
			<div class="info">
				<div class="left">
					<span>채권시장</span><br>
					<p>KIDB는 국내외 다양한 금융회사등 전문투자자들에게 원화채권,외화채권의 중개,인수매매 서비스를 제공합니다.</p>
				</div>
				<div class="right">
					<span>FIXED INCOME</span><br>
					<p>KIDB는 국내외 다양한 금융회사등 전문투자자들에게 원호채권,외화채권의 중개,인수매매 서비스를 제공합니다.</p>
				</div>
			</div>
			<div class="sub_wrap">
				<div class="sub_tit">
					<h4>KIDB가 인수,중개하는 채권 상품은 다음과 같습니다.</h4>
				</div>
				<ul class="pc">
					<li>국고채</li>
					<li>통화안정증권</li>
					<li>은행채</li>
					<li>공사채</li>
					<li>회사채</li>
					<li>구조화채권</li>
					<li>FRN</li>
					<li>ABS</li>
				</ul>
				<div class="mo">
					<ul>
						<li class="on">국고채</li>
						<li>통화<br class="mo">안정증권</li>
						<li>은행채</li>
						<li>공사채</li>
						<li>회사채</li>
						<li>구조화채권</li>
						<li>FRN</li>
						<li>ABS</li>
					</ul>
				</div>
				<div class="sub_details">
					<div class="sub_detail">
						<div class="detail_tit">
							<span>국고채</span>
							<p>(Government Bonds)</p>
						</div>
						<div class="detail_ko">
							<p>정부에서 공공목적으로 필요한 자금 확보를 위해 발행하는 채권입니다.  입찰은 국고채 전문 딜러들과 금융기관 수요로 이루어지며 입찰은 월간 단위 정기적으로 3년 ~ 30년물을, 50년물은 시장 수요에 따라 발행합니다.</p>
						</div>
						<div class="detail_en">
							<p>A government bond or "'sovereign bond"' is a debt security issued by a government to support government spending. Korean government bonds with tenors ranging from 3 year to 30 year are issued on a monthly basis, while 50 year tenors are issued irregularly depending on the demand. Bidding participants are limited to primary dealers.</p>
						</div>
					</div>
				</div>
				<div class="sub_details">
					<div class="sub_detail">
						<div class="detail_tit">
							<span>통화안정증권</span>
							<p>(Monetary Stabilization Bonds)</p>
						</div>
						<div class="detail_ko">
							<p>한국은행이 시중 통화량 조절을 위해 금융기관을 상대로 발행하고 매매하는 채권입니다. 통화량 조절은 발행량을 조정하는 방법과 조기환매 등이 있으며 시장 및 자금 상황에 따라 유기적으로 변동됩니다.</p>
						</div>
						<div class="detail_en">
							<p>MSB is issued by the Bank of Korea to help absorb liquidity to support its monetary policy, with tenors ranging from 14 days to 2 years.</p>
						</div>
					</div>
				</div>
				<div class="sub_details">
					<div class="sub_detail">
						<div class="detail_tit">
							<span>은행채</span>
							<p>(Bank Debenture)</p>
						</div>
						<div class="detail_ko">
							<p>은행은 단기자금을 주로 예금을 통해 조달하며, 장기자금은 은행채 발생을 통해 조달합니다. 발행은 해당은행의 상황에 따라 일반적으로 고정금리 상품과 변동금리 상품으로 나뉩니다. 주택담보대출 금리가 주로 은행채 금리와 연동돼 있어 은행채 금리는 실생활에 큰 영향을 미칩니다.</p>
						</div>
						<div class="detail_en">
							<p>Bank debentures or “financial bonds” are a type corporate bond issued by commercial banks, mostly used to raise long-term capital.</p>
						</div>
					</div>
				</div>
				<div class="sub_details">
					<div class="sub_detail">
						<div class="detail_tit">
							<span>공사채</span>
							<p>(Quasi Sovereign Bond)</p>
						</div>
						<div class="detail_ko">
							<p>철도공사, 도로공사 등 법률에 의해 직접 설립된 법인이 발행하는 채권 입니다. 국채에 준하는 채권으로 안정성이 높지만, 공공기관 및 지방자치단체의 재정이 부실해질 경우 해당 공사채의 가격 및 유동성이 떨어질 수 있습니다.</p>
						</div>
						<div class="detail_en">
							<p>Quasi sovereign bonds are bonds issued by companies that are established by a specific law, such as Korea Railroad Co., Korea Expressway Co., and Korea Land & Housing Co.</p>
						</div>
					</div>
				</div>
				<div class="sub_details">
					<div class="sub_detail">
						<div class="detail_tit">
							<span>회사채</span>
							<p>(Corporate bonds)</p>
						</div>
						<div class="detail_ko">
							<p>기업이 자금조달을 위해 직접 발행하는 채권으로 사채라고도 합니다. 회사채의 종류로는 금융기관에서 지급을 보증하는 보증사채, 무보증사채 그리고 담보부사채가 있습니다. 이러한 채권은 상장기업 또는 금융감독원에 등록된 법인이 신용평가회사를 통해 (대표적으로 NICE, KIS 그리고 KAP) 등급을 받아 발행합니다.</p>
						</div>
						<div class="detail_en">
							<p>Corporate bonds are issued by various corporations to raise capital and have historically been the second largest segment in the bond market following government bonds. Corporate bonds consist of guaranteed bonds, non-guaranteed bonds, and collateralized bonds.</p>
						</div>
					</div>
				</div>
				<div class="sub_details">
					<div class="sub_detail">
						<div class="detail_tit">
							<span>구조화채권</span>
							<p>(Structured Note)</p>
						</div>
						<div class="detail_ko">
							<p>채권의 구성요소인 원금, 액면이자, 만기를 투자자들의 성향에 맞게 구조화하여 상품화된 채권을 말합니다. 이는 원금 또는 액면이자가 금리, 환율, 주가, 상품가격 등의 기초자산과 연동하여 결정되도록 설계된 채권. 즉, 채권과 파생상품이 결합되어 만들어진 상품입니다. 종류로는 신용연계, 주식연계, 통화연계, 금리연계 구조화채권 등이 있습니다.</p>
						</div>
						<div class="detail_en">
							<p>Structured note is a debt obligation that also contains embedded derivative component that adjusts the security’s risk-return profile. This type of note is a hybrid security that attempts to change its profile by including additional modifying structures, therefore increasing the bond’s potential returns.</p>
						</div>
					</div>
				</div>
				<div class="sub_details">
					<div class="sub_detail">
						<div class="detail_tit">
							<span>변동금리부채권</span>
							<p>(Floating-rate note)</p>
						</div>
						<div class="detail_ko">
							<p>지급이자율이 시중 실세금리에 따라 변하는 채권입니다. 발행 시 이자율이 고정되어 만기 때까지 유지되는 여타 채권들과는 대조적입니다.</p>
						</div>
						<div class="detail_en">
							<p>Floating-rate note is a debt instrument with a variable interest rate. A floating rate note’s interest rate is tied to a benchmark such as 90day CD(Certificate Deposit) rate. Floaters are mainly issued by financial institutions and governments, and typically have 2year-5year term to maturity.</p>
						</div>
					</div>
				</div>
				<div class="sub_details">
					<div class="sub_detail">
						<div class="detail_tit">
							<span>자산유동화증권</span>
							<p>(Asset-backed securities)</p>
						</div>
						<div class="detail_ko">
							<p>자산유동화증권이란 부동산, 매출채권, 유가증권, 주택저당채권, 기타 재산권 등과 같은 유형ㆍ무형의 유동화 자산을 기초로 하여 발행된 증권을 말합니다.</p>
						</div>
						<div class="detail_en">
							<p>Asset-backed security is a financial security collateralized by a pool of assets such as loans, leases, credit card debt, royalties or receivables. For investors, asset-backed securities are an alternative to investing in corporate debt. Usually, the underlying assets of an ABS are illiquid and can't be sold on their own. But pooling the assets together and creating a financial security, a process called securitization, enables the owner of the assets to make them marketable.</p>
						</div>
					</div>
				</div>
			<div class="diagram_wrap">
				<img src="../img/who_kidb.png" alt="" class="kidb_img">
				<div class="diagram">
					<img src="../img/diagram.png" alt="">
				</div>
			</div>
			

			</div>
		</div>
	</div>

	

</div>


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
        $(".pc li:first-child").addClass("active");
        $(".mo ul li.on").addClass("active");
    });

	// 탭메뉴
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
    // 화면 크기를 체크하는 함수
    function checkWindowSize() {
        var windowWidth = $(window).width();

        if (windowWidth < 768) {
            // 화면 폭이 768px 미만인 경우
            $(".right p").text("KIDB Fixed Income Brokerage Corp. has been established through a consortium of five main securities houses (currently Mirae Asset Daewoo, Samsung, Daeshin, currently NH, and currently Yuanta Securities) in May 2000 in order to help advance Korea’s secondary fixed income market. Since then, we have expanded our business scope to dealing and underwriting of government, public finance, and corporate bonds, and also servicing non-domestic currency bonds, which has made KIDB Fixed Income Corp. Korea’s top fixed income brokerage firm.");
        } else {
            // 화면 폭이 768px 이상인 경우 (기존 내용으로 복원)
            $(".right p").text("KIDB는 국내외 다양한 금융회사등 전문투자자들에게 원호채권,외화채권의 중개,인수매매 서비스를 제공합니다.");
        }
    }

    // 페이지 로딩 시 크기 체크
    checkWindowSize();

    // 창 크기 변경 시 크기 체크
    $(window).resize(function () {
        checkWindowSize();
    });
});

$(document).ready(function () {
    // 화면 크기를 체크하는 함수
    function checkWindowSize() {
        var windowWidth = $(window).width();
        var $diagramImage = $(".diagram img");

        if (windowWidth < 768) {
            // 화면 폭이 768px 미만인 경우
            $diagramImage.attr("src", "../img/diagram_mo.png");
        } else {
            // 화면 폭이 768px 이상인 경우 (기존 이미지로 복원)
            $diagramImage.attr("src", "../img/diagram.png");
        }
    }
    // 페이지 로딩 시 크기 체크
    checkWindowSize();

    // 창 크기 변경 시 크기 체크
    $(window).resize(function () {
        checkWindowSize();
    });
});

</script>


<script src="../js/index.js"></script>


<?php
include_once(G5_PATH.'/tail.php');